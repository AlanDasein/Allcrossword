<?php

Route::get('/', 'PagesController@home');
Route::get('/crossword/create', function(){return app('PagesController')->callAction('build', [0, false]);});
Route::get('/crossword/{id}', function($id){return app('PagesController')->callAction('display', [$id, false]);});
Route::get('/crossword/wip/{id}/{token}', 'PagesController@display');
Route::get('/crossword/edit/{id}/{token}', 'PagesController@build');
Route::get('/contact', function(){return app('PagesController')->callAction('info', ['contact']);});
Route::get('/help', function(){return app('PagesController')->callAction('info', ['help']);});
Route::get('/about', function(){return app('PagesController')->callAction('info', ['about']);});
Route::get('{id}/embed', 'PagesController@embeed');

Route::post('/contact', 'PagesController@contact');

Route::post('/settings/author', 'SettingsController@author');
Route::post('/settings/nick', 'SettingsController@nick');
Route::post('/settings/validate', 'SettingsController@validate');
Route::post('/settings/save', 'SettingsController@save');
Route::post('/settings/delete', 'SettingsController@delete');
Route::post('/settings/progress', 'SettingsController@progress');
Route::post('/settings/discard', 'SettingsController@discard');
Route::post('/settings/report', 'SettingsController@report');

Route::post('/search', 'SearchController@general');
Route::post('/search/page', 'SearchController@pagination');