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

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');
    /* ADM */
    Route::get('/registerUser', 'UserController@registerUser')->name('registerUser');
    Route::post('/storeUser','UserController@storeUser')->name('storeUser');     
    Route::get('/manageUsers', 'UserController@manageUsers')->name('manageUsers'); 
    Route::post('/updateUser/{id}', 'UserController@updateUser')->name('updateUser'); 
    Route::get('/dropUser/{id}', 'UserController@dropUser')->name('dropUser');
    Route::get('/resetPassword', 'UserController@resetPassword')->name('resetPassword');
    Route::get('/passwordUpdade/{id}', 'UserController@passwordUpdate')->name('passwordUpdate');
    
      //Sector
    Route::get('/registerSector', 'SectorController@registerSector')->name('registerSector');
    Route::post('/storeSector','SectorController@storeSector')->name('storeSector');     
    Route::post('/updateSector/{id}', 'SectorController@updateSector')->name('updateSector'); 
    Route::get('/dropSector/{id}', 'SectorController@dropSector')->name('dropSector'); 
    //Schooling
    Route::get('/registerSchooling', 'SchoolingController@registerSchooling')->name('registerSchooling');
    Route::post('/storeSchooling','SchoolingController@storeSchooling')->name('storeSchooling');     
    Route::post('/updateSchooling/{id}', 'SchoolingController@updateSchooling')->name('updateSchooling'); 
    Route::get('/dropSchooling/{id}', 'SchoolingController@dropSchooling')->name('dropSchooling'); 
    // CV's
    Route::get('/registerCv', 'CvController@registerCv')->name('registerCv');
    Route::post('/storeCv','CvController@storeCv')->name('storeCv');     
    Route::get('/manageCvs', 'CvController@manageCvs')->name('manageCvs'); 
    Route::post('/updateCv/{id}/{user_id}', 'CvController@updateCv')->name('updateCv'); 
    Route::get('/destroyCv/{id}/{filename}', 'CvController@destroyCv')->name('destroyCv'); 
    Route::post('/filtroDataCv', 'CvController@filtroDataCv')->name('filtroDataCv'); 
    Route::get('/pageFiltroData', 'CvController@pageFiltroData')->name('pageFiltroData');
});