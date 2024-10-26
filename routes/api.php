<?php

Route::post('v1/login', 'Api\V1\AuthApiController@login');

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
     // Books
     Route::post('books/media', 'BookApiController@storeMedia')->name('books.storeMedia');
     Route::apiResource('books', 'BookApiController');
     Route::get('books/isbn/{isbn}', 'BookApiController@bookByISBN')->name('books.isbn');
     Route::get('authors', 'AuthorApiController@index')->name('author.index');
     Route::get('authors/{author}/books', 'AuthorApiController@booksByAuthor')->name('author.books');
});
