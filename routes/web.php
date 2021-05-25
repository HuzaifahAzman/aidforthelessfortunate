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

// TODO Breadcrumbs on all pages

Route::get('/login', 'AuthenticationsController@index')->name('login');
Route::post('/loginAuth', 'AuthenticationsController@login')->name('login');
Route::get('/register', 'AuthenticationsController@register')->name('register');

Route::get('/', 'DashboardController@publicDashboard');
Route::get('/lessfortunates', 'LessFortunateController@indexPublic'); // TODO search & filter
Route::get('/lessfortunates/find/{id}', 'LessFortunateController@showPublic');
// TODO open map
Route::get('/reports', 'ReportsController@indexPublic'); 
Route::get('/reports/form', 'ReportsController@showPublic'); // TODO submit report

Route::group(['middleware' => 'CheckAdminLoginMiddleware'], function () {
    Route::get('/admin/dashboard', 'DashboardController@adminDashboard');
    Route::resource('/admin/lessfortunates', 'LessFortunateController'); // TODO search & filter
    Route::resource('/admin/volunteers', 'UsersController'); 
    Route::resource('/admin/reports', 'ReportsController'); // TODO manage User Report
    // TODO manage View Aid Accomplishment
    Route::get('/logoutAuth', 'AuthenticationsController@logout')->name('logout');
});

Route::group(['middleware' => 'CheckVolunteerLoginMiddleware'], function () {
    Route::get('/volunteer/dashboard', 'DashboardController@volunteerDashboard');
    Route::get('/volunteer/lessfortunates', 'LessFortunateController@indexVolunteer'); // TODO search & filter
    Route::get('/volunteer/lessfortunates/{id}', 'LessFortunateController@showVolunteer');
    // TODO open map
    Route::get('/volunteer/reports', 'ReportsController@indexVolunteer');
    Route::get('/volunteer/reports/form', 'ReportsController@showVolunteer'); // TODO submit report
    // TODO Aid Accomplistment
    // TODO QR
    Route::get('/logoutAuth', 'AuthenticationsController@logout')->name('logout');
});





// Route::get('/lessfortunate', 'LessFortuController@welcome');


// Route::get('/login', function () {
//     return view('/authentications/login');
// });

// Route::get('/users/{id}', function ($id) {
//     return 'This is user ' . $id;
// });

// Route::get('/users/{id}/{name}', function ($id, $name) {
//     return 'This is user ' . $id . ' with name ' . $name;
// });

// Route::get('/', function () {
//     return view('welcome');
// });
