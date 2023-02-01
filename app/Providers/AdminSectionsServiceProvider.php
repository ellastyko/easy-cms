<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $sections = [
        \App\Models\User::class    => 'App\Http\Sections\Users',
        \App\Models\Role::class    => 'App\Http\Sections\Roles',
        \App\Models\Article::class => 'App\Http\Sections\Articles',
    ];

    /**
     * Register sections.
     *
     * @param \SleepingOwl\Admin\Admin $admin
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
        //

        parent::boot($admin);
    }
}
