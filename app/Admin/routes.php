<?php

use Illuminate\Support\Facades\Route;


Route::get('information', ['as' => 'admin.information', function () {
	$content = 'Admin Panel of Easy CMS | Test Project';
	return AdminSection::view($content, 'Information');
}]);
