<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index')->name('index');

Route::get('/books', 'BooksController@index')->name('books.index');
Route::get('/books/single-book', 'BooksController@show')->name('books.show');


Route::get('/books/categories/{slug}', 'CategoriesController@show')->name('categories.show');



Route::group(['prefix' => 'admin'], function(){
	Route::get('/', 'Backend\PagesController@index')->name('admin.index');

	Route::group(['prefix' => 'books'], function(){
		Route::get('/', 'Backend\BooksController@index')->name('admin.books.index');
		// Route::get('/{id}', 'Backend\BooksController@show')->name('admin.books.show');
		Route::get('/create', 'Backend\BooksController@create')->name('admin.books.create');
        Route::get('/edit/{id}', 'Backend\BooksController@edit')->name('admin.books.edit');
		Route::post('/store', 'Backend\BooksController@store')->name('admin.books.store');
        Route::post('/update/{id}', 'Backend\BooksController@update')->name('admin.books.update');
		Route::post('/delete/{id}', 'Backend\BooksController@destroy')->name('admin.books.delete');

	});

	Route::group(['prefix' => 'authors'], function(){
		Route::get('/', 'Backend\AuthorsController@index')->name('admin.authors.index');
		Route::post('/store', 'Backend\AuthorsController@store')->name('admin.authors.store');
		Route::get('/{id}', 'Backend\AuthorsController@show')->name('admin.authors.show');
		Route::post('/update/{id}', 'Backend\AuthorsController@update')->name('admin.authors.update');
		Route::post('/delete/{id}', 'Backend\AuthorsController@destroy')->name('admin.authors.delete');
	});

	Route::group(['prefix' => 'categories'], function(){
		Route::get('/', 'Backend\CategoriesController@index')->name('admin.categories.index');
		Route::post('/store', 'Backend\CategoriesController@store')->name('admin.categories.store');
		Route::get('/{id}', 'Backend\CategoriesController@show')->name('admin.categories.show');
		Route::post('/update/{id}', 'Backend\CategoriesController@update')->name('admin.categories.update');
		Route::post('/delete/{id}', 'Backend\CategoriesController@destroy')->name('admin.categories.delete');
	});

	Route::group(['prefix' => 'publishers'], function(){
		Route::get('/', 'Backend\PublishersController@index')->name('admin.publishers.index');
		Route::post('/store', 'Backend\PublishersController@store')->name('admin.publishers.store');
		Route::get('/{id}', 'Backend\PublishersController@show')->name('admin.publishers.show');
		Route::post('/update/{id}', 'Backend\PublishersController@update')->name('admin.publishers.update');
		Route::post('/delete/{id}', 'Backend\PublishersController@destroy')->name('admin.publishers.delete');
	});

});
