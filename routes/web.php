<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/logoutuser', 'UserController@logout');
//resources
Auth::routes();
Route::prefix('/app')->group(function () {
    Route::resource('/dashboard', 'DashboardController');
    Route::resource('/usertype', 'UserTypeController');
    Route::resource('/user', 'UserController');
    Route::resource('/ledgerhead', 'LedgerHeadController');
    Route::resource('/ledger', 'LedgerController');
    Route::resource('/invoice', 'InvoicesController');
    Route::resource('/document', 'BuisnessDocumentController');
    Route::resource('/twyla', 'TwylaResponseController');
    Route::resource('/services', 'ServicesController');
    Route::resource('/ticket', 'TicketController');
    Route::resource('/ticketmessage', 'TicketMessageController');
    Route::resource('/subscription', 'SubscriptionController');
  
     
});



//Invoice
Route::get('/app/getsaleperson/inovice', 'InvoicesController@getSalePerson');
Route::get('/app/getinvoice/inovice/{id}', 'InvoicesController@getInvoice');
Route::post('/app/invoiceupdate', 'InvoicesController@updateInvoice');
Route::get('/displayinvoice/{param1}','InvoicesController@displayInvoice');
Route::get('/renewdisplayinvoice/{id}','InvoicesController@renewdisplayInvoice');
Route::get('/displayinvoicecustomer/{param1}','InvoicesController@displayInvoiceCustomer');
Route::get('/app/downloadinvoice/inovice/{id}', 'InvoicesController@downloadInvoice');
Route::post('/app/paymentinvoice/callback', 'InvoicesController@sadadResponse');
Route::post('/app/getsadadresponse/inovice', 'InvoicesController@getSadadList');
Route::get('/app/getcustomeremail/inovice', 'InvoicesController@getCustomerEmail');
Route::post('/app/sendinvoice/invoice', 'InvoicesController@sendInvoice');
Route::post('/app/getcustomerinvoice/customer', 'InvoicesController@getCustomerInvoiceList');
Route::post('/app/changepayment/invoice', 'InvoicesController@changepayment');


//Ticket
Route::get('/app/getcustomerinvoicedata', 'TicketController@getCustomerInvoiceList');

//Document
Route::post('/app/senddocument/document', 'BuisnessDocumentController@sendDocument');
Route::post('/app/customerdocument/document', 'BuisnessDocumentController@getCustomerDocument');
Route::put('/app/customereditdocument/document/{id}', 'BuisnessDocumentController@editCustomerDocument');
Route::post('/app/customersavedocument/document', 'BuisnessDocumentController@saveCustomerDocument');
Route::delete('/app/deletecustomerdocument/document/{id}', 'BuisnessDocumentController@deleteCustomerDocument');


//setting
Route::post('/app/updateUser','UserController@updateUser');
Route::get('/app/profile', 'UserController@profile');
Route::post('/app/changepassword', 'UserController@changePass');
Route::post('/app/updatepassword', 'UserController@updatepassword');
Route::post('/app/avatar','UserController@avatar');




Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{any}', 'HomeController@index');
Route::get('/{any}/{slug}', 'HomeController@index');
Route::get('/{any}/{slug}/{id}', 'HomeController@index');