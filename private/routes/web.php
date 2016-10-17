<?php

// Home
Route::get('/', 'HomeController')->name('home');

// Language
Route::get('language/{lang}', 'LanguageController')
    ->where('lang', implode('|', config('app.languages')));

// Service
Route::get('service', 'ServiceController');
Route::get('service/{serviceCategory}', 'ServiceController');
Route::get('dich-vu', 'ServiceController');
Route::get('dich-vu/{serviceCategory}', 'ServiceController');

// Project
Route::get('project', 'ProjectController@index');
Route::get('du-an', 'ProjectController@index');
Route::get('project/{projectItem}', 'ProjectController@getItem');
Route::get('du-an/{projectItem}', 'ProjectController@getItem');
Route::get('/ajax/project','ProjectAjaxController@partialProjectData');

// News
Route::get('news', 'NewsController@index');
Route::get('tin-tuc', 'NewsController@index');
Route::get('news/{projectItem}', 'NewsController@getItem');
Route::get('tin-tuc/{projectItem}', 'NewsController@getItem');
Route::get('/ajax/news','NewsAjaxController@partialNewsData');

//Contact
Route::get('contact', 'ContactFormController@index');
Route::get('lien-he', 'ContactFormController@index');


Route::get('/ajax/homeProject','ProjectAjaxController@partialHomeData');
Route::get('/ajax/homeNews','NewsAjaxController@partialHomeData');



// Admin
Route::get('admin', 'AdminController')->name('admin');

// Medias
Route::get('medias', 'FilemanagerController')->name('medias');

// Blog 
Route::get('blog/tag', 'BlogFrontController@tag');
Route::get('blog/search', 'BlogFrontController@search');
Route::get('articles', 'BlogFrontController@index');
Route::get('blog/order', 'BlogController@indexOrder')->name('blog.order');
Route::resource('blog', 'BlogController', ['except' => 'show']);
Route::put('postseen/{id}', 'BlogAjaxController@updateSeen');
Route::put('postactive/{id}', 'BlogAjaxController@updateActive');
Route::get('blog/{blog}', 'BlogFrontController@show')->name('blog.show');

// Comment
Route::resource('comment', 'CommentController', [
    'except' => ['create', 'show', 'update']
]);
Route::put('comment/{comment}', 'CommentAjaxController@update')->name('comment.update');
Route::put('commentseen/{id}', 'CommentAjaxController@updateSeen');

// Contact
Route::resource('contact', 'ContactController', ['except' => ['show', 'edit']]);

// Roles
Route::get('roles', 'RoleController@edit');
Route::post('roles', 'RoleController@update');

// Users
Route::get('user/sort/{role?}', 'UserController@index');
Route::get('user/blog-report', 'UserController@blogReport')->name('user.blog.report');
Route::resource('user', 'UserController', ['except' => 'index']);
Route::put('uservalid/{id}', 'UserAjaxController@valid');
Route::put('userseen/{user}', 'UserAjaxController@updateSeen');

// Authentication 
Auth::routes();

// Email confirmation 
Route::get('resend', 'Auth\RegisterController@resend');
Route::get('confirm/{token}', 'Auth\RegisterController@confirm');

// Notifications
Route::get('notifications/{user}', 'NotificationController@index');
Route::put('notifications/{notification}', 'NotificationController@update');