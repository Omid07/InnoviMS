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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('clients','ClientController');

Route::resource('invoices', 'InvoiceController');

Route::resource('vinvoices', 'VInvoiceController');
Route::get('/vendorbills/{id}', 'VInvoiceController@listofbills');
Route::get('vinvoice/create/{id}', 'VInvoiceController@createfor');

Route::resource('salaries', 'SalaryController');

Route::resource('records', 'DailyRecordController');

Route::resource('billpayments', 'BillPaymentController');

Route::get('vinvoicepdf/{id}', 'PdfFileExportController@pdfForVinvoice');
Route::get('invoicepdf/{id}', 'PdfFileExportController@pdfForInvoice');
