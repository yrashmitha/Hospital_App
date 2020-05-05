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

Route::get('/',function (){
    return view('auth.login');
});

Route::get('/register','PagesController@register');


//patients
Route::resource('patients','PatientsController');
Route::post('/patients/{id}/records', 'PatientsController@showRecords');

//medical records

Route::resource('medicalrecords','MedicalRecordsController');

Route::post('/medicalrecords/{id}/records','MedicalRecordsController@showPage');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('treatments','TreatmentsController');
