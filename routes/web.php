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

Route::get('/panel', 'DashboardController@index');


Route::get('/panel', function () {
    return view('panel');
});

// Customers
Route::get('/customers', 'Dashboard\CustomerController@index')->name('customers');
Route::get('/customers/create', 'Dashboard\CustomerController@create')->name('customer-create');
Route::get('/customers/edit/{id}', 'Dashboard\CustomerController@edit')->name('customer-edit');
Route::get('/customers/view/{id}', 'Dashboard\CustomerController@view')->name('customer-view');

Route::post('/customers/store', 'Dashboard\CustomerController@store')->name('customer-store');


//Plans
Route::get('/plans', 'Dashboard\PlanController@index')->name('plans');
Route::get('/plans/create', 'Dashboard\PlanController@create')->name('plan-create');
Route::get('/plans/edit/{id}', 'Dashboard\PlanController@edit')->name('plan-edit');
Route::get('/plans/edit/{id}/set-status/{statusId}', 'Dashboard\PlanController@setStatus')->name('plan-set-status');

Route::get('/plans/view/{id}', 'Dashboard\PlanController@view')->name('plan-view');
Route::post('/plans/store', 'Dashboard\PlanController@store')->name('plan-store');


// INVOICES
Route::get('/invoices', 'Dashboard\InvoiceController@index')->name('invoices');
Route::get('/invoices/create/{planId}', 'Dashboard\InvoiceController@create')->name('invoice-create');
Route::get('/invoices/create-pdf/{id}', 'Dashboard\InvoiceController@createPDF')->name('invoice-create-pdf');
Route::get('/invoices/view/{id}', 'Dashboard\InvoiceController@view')->name('invoice-view');
Route::post('/invoices/store/{planId}', 'Dashboard\InvoiceController@store')->name('invoice-store');