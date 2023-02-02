<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminColumnFilter;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;
use SleepingOwl\Admin\Section;

/**
 * Class Articles
 *
 * @property \App\Models\Article $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Articles extends Section implements Initializable
{
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $alias;

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()
            ->setPriority(100)
            ->setIcon('fa fa-lightbulb-o');
    }

    /**
     * @param array $payload
     *
     * @return DisplayInterface
     */
    public function onDisplay(array $payload = []): DisplayInterface
    {
        $columns = [
            AdminColumn::text('id', '#')->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::link('title', 'Name', 'created_at')
                ->setSearchCallback(function ($column, $query, $search) {
                    return $query
                        ->orWhere('title', 'like', '%' . $search . '%')
                        ->orWhere('created_at', 'like', '%' . $search . '%')
                    ;
                })
                ->setOrderable(function ($query, $direction) {
                    $query->orderBy('title', $direction);
                }),
            AdminColumn::text('created_at', 'Created / updated', 'updated_at')
                ->setWidth('160px')
                ->setOrderable(function ($query, $direction) {
                    $query->orderBy('created_at', $direction);
                })
                ->setSearchable(false),
        ];

        $display = AdminDisplay::datatables()
            ->setName('firstdatatables')
            ->setOrder([[0, 'asc']])
            ->setDisplaySearch(true)
            ->paginate(25)
            ->setColumns($columns)
            ->setHtmlAttribute('class', 'table-primary table-hover th-center')
        ;

        $display->setColumnFilters([
            AdminColumnFilter::select()
                ->setModelForOptions(\App\Models\Article::class, 'name')
                ->setCallback(function ($element, $query) {
                    return !Auth::user()->isAdmin() ? $query->where('author_id', Auth::id()) : $query;
                })
                ->setDisplay('name')
                ->setColumnName('name')
                ->setPlaceholder('All names'),
        ]);
        $display->getColumnFilters()->setPlacement('card.heading');

        return $display;
    }

    /**
     * @param int|null $id
     * @param array $payload
     *
     * @return FormInterface
     */
    public function onEdit($id = null, $payload = [])
    {
        $form = AdminForm::card()->addBody([
            AdminFormElement::columns()
                ->addColumn([
                    AdminFormElement::text('title', 'Title')->required(),
                    AdminFormElement::textarea('content', 'Article content')->required(),
                    AdminFormElement::hidden('author_id')->setDefaultValue(Auth::id()),
                    AdminFormElement::html('<hr>'),
                ], 'col-xs-12 col-sm-6 col-md-4 col-lg-4')
        ]);

        $form->getButtons()->setButtons([
            'save_and_create' => new SaveAndCreate(),
            'cancel'          => (new Cancel()),
        ]);

        return $form;
    }

    /**
     * @param array $payload
     * @return FormInterface
     */
    public function onCreate($payload = []): FormInterface
    {
        return $this->onEdit(null, $payload);
    }

    /**
     * @param Model $model
     * @return bool
     */
    public function isDeletable(Model $model): bool
    {
        return true;
    }
}
