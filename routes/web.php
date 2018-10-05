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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');      //Makes the site login-only since /home will
Route::get('/home', 'HomeController@index')->name('home');  //redirect to /login if the user is not authenticated. If he is logged in redirects to the dashboard.


/*
 * All routes for the forms
 */
Route::prefix('forms')->middleware('auth')->group(function(){
    Route::get('overview', 'FormController@index');
    Route::prefix('submit')->group(function(){
        Route::get('progress', 'FormController@submitOverview');
        Route::get('operational_flight_plan/{id?}', 'FormController@operational_flight_plan_edit');
        Route::get('pre_site_survey/{id?}', 'FormController@pre_site_survey');
        Route::get('pre_flight_checklist/{id?}', 'FormController@pre_flight_checklist');
    });
    Route::prefix('save')->group(function(){
        Route::post('operational_flight_plan/{id?}', 'FormController@operational_flight_plan_save');
    });
});