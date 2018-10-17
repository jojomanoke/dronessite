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
        Route::get('progress/{id?}', 'FormController@submitOverview');
        Route::get('operational_flight_plan', 'FormController@operational_flight_plan_edit');
        Route::get('pre_site_survey/', 'FormController@pre_site_survey');
        Route::get('pre_flight_checklist/', 'FormController@pre_flight_checklist');
        Route::get('maintenance_log/', 'FormController@maintenance_log');
        Route::get('incident_log/', 'FormController@incident_log');
        Route::get('embarkation_checklist/', 'FormController@embarkation_checklist');
        Route::get('aircraft_pilot_and_crew_flight_logs/', 'FormController@aircraft_pilot_and_crew_flight_logs');
        Route::get('arrival_flight_checklist/', 'FormController@arrival_flight_checklist');
        Route::get('post_flight_checklist/', 'FormController@post_flight_checklist');
        Route::get('battery_log/', 'FormController@battery_log');
    });
    Route::prefix('save')->group(function(){
        Route::post('operational_flight_plan/', 'FormController@operational_flight_plan_save');
        Route::post('pre_site_survey/', 'FormController@pre_site_survey_save');
        Route::post('pre_flight_checklist/', 'FormController@pre_flight_checklist_save');
        Route::post('maintenance_log/', 'FormController@maintenance_log_save');
        Route::post('incident_log/', 'FormController@incident_log_save');
        Route::post('embarkation_checklist/', 'FormController@embarkation_checklist_save');
        Route::post('aircraft_pilot_and_crew_flight_logs/', 'FormController@aircraft_pilot_and_crew_flight_logs_save');
        Route::post('arrival_flight_checklist/', 'FormController@arrival_flight_checklist_save');
        Route::post('post_flight_checklist/', 'FormController@post_flight_checklist_save');
        Route::post('battery_log/', 'FormController@battery_log_save');
    });
});