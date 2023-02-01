<?php

namespace App\Repositories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class ArticleRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'title' => 'like',
    ];

    /**
     * @return string
     */
    public function model(): string
    {
        return Article::class;
    }

    /**
     * @throws RepositoryException
     */
    public function filter(): Collection
    {
        $this->pushCriteria(new RequestCriteria(request()));

        return $this->with('author')->all();
    }
}
