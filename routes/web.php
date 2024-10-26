<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Book
    Route::delete('books/destroy', 'BookController@massDestroy')->name('books.massDestroy');
    Route::post('books/media', 'BookController@storeMedia')->name('books.storeMedia');
    Route::post('books/ckmedia', 'BookController@storeCKEditorImages')->name('books.storeCKEditorImages');
    Route::post('books/parse-csv-import', 'BookController@parseCsvImport')->name('books.parseCsvImport');
    Route::post('books/process-csv-import', 'BookController@processCsvImport')->name('books.processCsvImport');
    Route::resource('books', 'BookController');

    // Book
    Route::delete('authors/destroy', 'AuthorController@massDestroy')->name('authors.massDestroy');
    Route::post('authors/media', 'AuthorController@storeMedia')->name('authors.storeMedia');
    Route::post('authors/ckmedia', 'AuthorController@storeCKEditorImages')->name('authors.storeCKEditorImages');
    Route::post('authors/parse-csv-import', 'AuthorController@parseCsvImport')->name('authors.parseCsvImport');
    Route::post('authors/process-csv-import', 'AuthorController@processCsvImport')->name('authors.processCsvImport');
    Route::resource('authors', 'AuthorController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
