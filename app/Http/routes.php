<?php

Route::get('/',['as' => 'dashboard', 'uses' => 'DashboardController@index']);
Route::get('/home',['as' => 'home', 'uses' => 'DashboardController@index']);

// COMPANIES
Route::get('/companies/newco', 'CompaniesController@newco');
Route::resource('companies', 'CompaniesController');

// PROJECTS
Route::resource('projects', 'ProjectsController');
//Route::get('/projects/create', ['as' => 'projects.create', 'uses' => 'ProjectsController@create']);
Route::get('projects/{id}/contract', 'ProjectsController@contract');

// TEST ROUTES
Route::get('/emailer', function() {
    $data = array('name' => 'Jonathan'); // Change name

    Mail::send('emails.welcome', $data, function($message)
    {
        // Please double-check email address
        $message->to('jongravois@gmail.com')
            ->subject('Hi, there! Laravel sent me!');
    });

    return 'Email Sent!';
});
Route::get('/event', function() {
    logit('created a test event');
});
Route::get('/tester', function () {
    return view('pages.tester');
});
Route::get('/welcome_page', function () {
    return view('pages.welcome');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register/{tier}', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// API
Route::group(['prefix' => 'api/'], function () {
    Route::resource('addresses', 'AddressesController');
    Route::resource('aircrafts', 'AircraftsController');
    Route::resource('atas', 'AtasController');
    Route::resource('companycontacts', 'CompanyContactsController');
    Route::resource('companies', 'CompaniesController');
    Route::resource('countries', 'CountriesController');
    Route::resource('systemics', 'SystemicsController');
    Route::resource('locations', 'LocationsController');
    Route::resource('phones', 'PhonesController');
    Route::resource('projects', 'ProjectsController');
    Route::resource('projecttypes', 'ProjectTypesController');
    Route::resource('roles', 'RolesController');
    Route::resource('systemics', 'SystemicsController');
    Route::resource('users', 'UsersController');
});