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


Route::group(['middleware'=>['auth']], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('licensing', 'SalesController@licensing')->name('licensing.index');
    Route::post('licensing/update/{licensing}', 'SalesController@licensing_update')->name('licensing.update');

    Route::get('clients', 'ClientsController@index')->name('clients.index');
    Route::get('clients/new', 'ClientsController@new')->name('clients.new');
    Route::post('clients/store', 'ClientsController@store')->name('clients.store');
    Route::post('clients/update/{clientModel}', 'ClientsController@update')->name('clients.update');
    Route::get('clients/edit/{client}', 'ClientsController@edit')->name('clients.edit');
    Route::get('clients/remove/{id}', 'ClientsController@destroy')->name('clients.remove');

    Route::get('sales', 'SalesController@index')->name('sales.index');
    Route::get('sales/new', 'SalesController@new')->name('sales.new');
    Route::post('sales/store', 'SalesController@store')->name('sales.store');
    Route::post('sales/update/{saleModel}', 'SalesController@update')->name('sales.update');
    Route::get('sales/edit/{saleModel}', 'SalesController@edit')->name('sales.edit');
    Route::get('sales/remove/{id}', 'SalesController@destroy')->name('sales.remove');

    Route::get('development', 'DevelopmentController@index')->name('development.index');
    Route::get('development/view/{id}', 'DevelopmentController@view')->name('development.view');
    Route::get('development/new', 'DevelopmentController@new')->name('development.new');
    Route::post('development/store', 'DevelopmentController@store')->name('development.store');
    Route::post('development/update/{id}', 'DevelopmentController@update')->name('development.update');
    Route::get('development/edit/{client}', 'DevelopmentController@edit')->name('development.edit');
    Route::get('development/remove/{id}', 'DevelopmentController@destroy')->name('development.remove');
    Route::get('development', 'DevelopmentController@index')->name('development.index');
    Route::get('development/edit/{id}', 'DevelopmentController@edit')->name('development.edit');

    Route::post('activity/store', 'ActivitiesController@store')->name('activity.store');
    Route::get('activity/resolvido/{id}', 'ActivitiesController@resolvido')->name('activity.resolvido');
    Route::get('activity/remover/{id}', 'ActivitiesController@remover')->name('activity.remover');

    Route::post('requirements/store', 'RequirementsController@store')->name('requirements.store');
    Route::get('requirements/resolvido/{id}', 'RequirementsController@resolvido')->name('requirements.resolvido');
    Route::get('requirements/remover/{id}', 'RequirementsController@remover')->name('requirements.remover');

    Route::get('attachments/new/{id}', 'AttachmentsController@new')->name('attachments.new');
    Route::post('attachments/upload', 'AttachmentsController@upload')->name('attachments.upload');
    Route::get('attachments/remove/{id}', 'AttachmentsController@remove')->name('attachments.remove');
    Route::get('downloadAttachments/{id}', 'AttachmentsController@getDownload')->name('attachments.download');

    Route::get('products', 'ProductsController@index')->name('products.index');
    Route::get('products/view/{id}', 'ProductsController@view')->name('products.view');
    Route::get('products/new', 'ProductsController@new')->name('products.new');
    Route::post('products/store', 'ProductsController@store')->name('products.store');
    Route::get('products/remove/{id}', 'ProductsController@destroy')->name('products.remove');

    Route::get('version/new/{id}', 'VersionController@new')->name('version.new');
    Route::post('version/upload', 'VersionController@upload')->name('version.upload');
    Route::get('version/remove/{id}', 'VersionController@remove')->name('version.remove');

    Route::get('sales', 'SalesController@index')->name('sales.index');
    Route::get('utility', 'UtilityController@index')->name('utility.index');
    Route::get('download/{id}', 'VersionController@getDownload')->name('version.download');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/', function () {
        return view('home');
    })->name('index');

    Route::get('register', function () {
        return view('auth.register');
    })->name('register');

    Route::get('user', 'ClientsController@users')->name('user.index');

    Route::get('user/remove/{id}', 'ClientsController@destroy_user')->name('user.remove');

});

Route::get('getLicensing/{licensing}', 'SalesController@getLicensing')->name('licensing.getLicensing');

Auth::routes();


