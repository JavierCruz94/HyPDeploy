<?php

// Home route
Route::get('/', 'HomeController@index');

//----------------------------------------------------------------------------------------------------------------------

//Login
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login')->name('login');

//----------------------------------------------------------------------------------------------------------------------

//Logout
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

//----------------------------------------------------------------------------------------------------------------------

//User redirection and validation
Route::get('/user', 'UserController@index');


//----------------------------------------------------------------------------------------------------------------------

/* Administrator Routes */

// Admin's home route. Route for watching customers.
Route::get('/adminWatch', 'AdminController@watchCustomers');

// Routes for assigning and watching requests to consultants
Route::get('/adminAssignReq', 'AdminController@getRequestsConsultants');
Route::post('/adminAssignReq', 'AdminController@assignRequestToConsultant')->name('assignRequestToConsultant');

Route::post('/adminChangeConsultant', 'AdminController@changeConsultant')->name('changeConsultant');

// Routes for adding a new customer
Route::get('/adminAddCustomer','AdminController@addCustomerForm');
Route::post('/adminAddCustomer','AdminController@addCustomer')->name('addCustomerDB');

// Routes for adding a new consultant
Route::get('/adminAddConsultant','AdminController@addConsultantForm');
Route::post('/adminAddConsultant','AdminController@addConsultant')->name('addConsultantDB');

//----------------------------------------------------------------------------------------------------------------------


/* Customer Routes */

// Customer's home route. Routes for creating requests
Route::get('/customerReq', 'CustomerController@customerReqForm');
Route::post('/customerReq','CustomerController@addReq' ) ->name('addReqDB');

// Customer's calendar route for scheduled requests
Route::get('/customerCalendar', 'CustomerController@showCalendar');

//----------------------------------------------------------------------------------------------------------------------

/* Consultant Routes */

// Consultant's home route. Route for new requests inbox.
Route::get('/newReq', 'ConsultantController@showNewRequests');
// Route for scheduling a new request
Route::get('/schedReq', 'ConsultantController@scheduleRequestForm') ->name('schedReq');
Route::post('/schedReq', 'ConsultantController@scheduleRequest')->name('schedInDB');


// Routes for registering a visit
Route::get('/regVisit', 'ConsultantController@registerVisitForm')->name('regVisit');
Route::get('/checkClientReq', 'ConsultantController@checkClientReq')->name('checkClientReq');
Route::post('/checkClientReq', 'ConsultantController@generateReport')->name('generateReport');
Route::post('/signReport', 'ConsultantController@signReport')->name('signReport');
Route::get('/modificar', 'ConsultantController@modificar');


Route::get('/pdf', 'ConsultantController@pdf')->name('pdf');


// Consultant's calendar route for scheduled requests
Route::get('/calendarCons', 'ConsultantController@showCalendar')->name('calendarCons');

