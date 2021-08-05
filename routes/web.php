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

Route::group(['middleware' => 'PreventBackHistory'],function(){
    Route::get('/login', 'AuthenticationsController@index')->name('login');
    Route::post('/loginAuth', 'AuthenticationsController@login')->name('login');
    Route::get('/register', 'AuthenticationsController@register')->name('register');
    
    Route::get('/', 'DashboardController@publicDashboard');
    Route::get('/lessfortunates', 'LessFortunateController@indexPublic'); 
    Route::get('/lessfortunates/find/{id}', 'LessFortunateController@showPublic');
    Route::get('/reports', 'ReportsController@indexPublic'); 
    Route::get('/reports/form', 'ReportsController@showPublic'); 
    Route::post('/reports/submitform', 'ReportsController@storePublic');
    Route::get('/logoutAuth', 'AuthenticationsController@logout')->name('logout');
    
    Route::group(['middleware' => 'CheckAdminLoginMiddleware'], function () {
        Route::get('/admin', 'DashboardController@adminDashboard');
        Route::get('/admin/dashboard', 'DashboardController@adminDashboard');
        Route::get('/admin/dashboard/editCampaign', 'DashboardController@adminDashboardEditCampaign');
        Route::post('/editCampaign', 'CampaignController@updateCampaign');
        Route::resource('/admin/lessfortunates', 'LessFortunateController'); 
        Route::resource('/admin/volunteers', 'UsersController'); 
        Route::resource('/admin/reports', 'ReportsController'); 
        Route::resource('/admin/aidaccomplishments', 'AidAccomplishmentController'); 
        Route::get('/admin/dashboard/resetAid', 'AidAccomplishmentController@resetAidAccomplishment');
    });
    
    Route::group(['middleware' => 'CheckVolunteerLoginMiddleware'], function () {
        Route::get('/volunteer', 'DashboardController@volunteerDashboard');
        Route::get('/volunteer/dashboard', 'DashboardController@volunteerDashboard');
        Route::get('/volunteer/lessfortunates', 'LessFortunateController@indexVolunteer'); 
        Route::get('/volunteer/lessfortunates/{id}', 'LessFortunateController@showVolunteer');
        Route::get('/volunteer/reports', 'ReportsController@indexVolunteer');
        Route::get('/volunteer/reports/form', 'ReportsController@showVolunteer');
        Route::post('/volunteer/reports/submitform', 'ReportsController@storeVolunteer');
        Route::get('/volunteer/aidaccomplishments', 'AidAccomplishmentController@indexVolunteer');
        Route::post('/volunteer/submitaid', 'AidAccomplishmentController@storeVolunteer');
    });
});
