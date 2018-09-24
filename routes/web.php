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

Route::get('/', 'HomeController@index')->name('home');  

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});


Route::group(
[
'prefix' => 'admin',
'namespace' => 'admin',
'middleware' => 'admin'
], function()
{
Route::resource('admin', 'AdminController');
});




Route::get('/search', 'InvoicesController@search')->name('search');
Route::get('/users', 'AdminController@index')->name('users');  
Route::get('/profile', 'ProfilesController@index')->name('profile');  
Route::get('/invoices', 'InvoicesController@index')->name('invoices');  
Route::get('/adduser', 'InvoicesController@add')->name('adduser');  
Route::get('/export', 'ExportesController@index')->name('export');  
Route::post('/updateprofile', 'ProfilesController@updateProfile')->name('updateprofile'); 
Route::get('/reports',  'AdminController@reports')->name('reports'); 
Route::get('/add/',  'AdminController@add')->name('add');
Route::post('/add-user/',  'AdminController@addUser')->name('add-user');
Route::get('/user-edit/{id}',  'AdminController@edit')->name('user-edit');   
Route::get('/invoice-edit/{id}',  'AdminController@editInvoice')->name('invoice-edit');   
Route::post('/updateuser', 'AdminController@updateUser')->name('updateuser'); 
Route::post('/updateinvoice', 'AdminController@updateInvoice')->name('updateinvoice'); 
Route::delete('/delete/{id}', 'AdminController@delete')->name('delete'); 
Route::get('/export_pdf/{id}', 'AdminController@export_pdf')->name('export_pdf'); 
Route::get('/export_all_pdf', 'AdminController@export_all_pdf')->name('export_all_pdf'); 
