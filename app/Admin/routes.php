<?php

use App\Http\Sections\Articles;
use App\Http\Sections\Roles;
use App\Http\Sections\Users;
use Illuminate\Support\Facades\Route;

Route::get('information', ['as' => 'admin.information', fn () => AdminSection::view('Admin Panel of Easy CMS | Test Project', 'Information')]);

Route::group([
    'as' => 'admin.articles',
    'controller' => Articles::class
], function () {});

Route::group([
    'as' => 'admin.roles',
    'controller' => Roles::class
], function () {});

Route::group([
    'as' => 'admin.users',
    'controller' => Users::class
], function () {});

