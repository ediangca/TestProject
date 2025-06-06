<?php


use App\Http\Controllers\ItemAndServiceController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Directory\PatientController;
use App\Http\Controllers\Directory\DoctorController;
use App\Http\Controllers\Directory\DirectoryController;
use App\Http\Controllers\Directory\ItemAndServicesController;
// use App\Http\Controllers\ItemAndServicesController as ControllersItemAndServicesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', function () {
//     return view('index');
// });
// Route::get('/dashboard', function () {
//     return view('dashboard');
// });


Route::controller(PagesController::class)->group(function() {
    Route::get('/', 'index')->name('home');
    Route::get('/template', 'dashboard')->name('dashboard');
});


Route::controller(AuthController::class)->group(function() {
    Route::get('/register', 'register')->name('register');//View Register
    Route::post('/store', 'store')->name('store');//Register
    Route::get('/login', 'login')->name('login');//View Login
    Route::post('/authenticate', 'authenticate')->name('authenticate');//Authenticate login
    Route::get('/dashboard', 'dashboard')->name('dashboard');//Dashboard
    Route::post('/logout', 'logout')->name('logout');//Logout
});



Route::controller(DashboardController::class)->group(function() { //I separated this for index purpose
    Route::group(['prefix' => 'dashboard/'], function(){
        Route::get('/home', 'index')->name('dashboard_home');
        Route::get('/student', 'dashboard_student')->name('dashboard_student');
        Route::get('/post', 'dashboard_post')->name('dashboard_post');
        Route::get('/attendance', 'dashboard_attendance')->name('dashboard_attendance');
        Route::get('/settings', 'dashboard_settings')->name('dashboard_settings');
    });
});


Route::controller(DirectoryController::class)->group(function() { //I separated this for index purpose
    Route::group(['prefix' => 'dashboard/directory/'], function(){
        Route::resource('patients', PatientController::class)->name('index','directory_patient');
        Route::get('/patients/{id}/edit', [PatientController::class, 'editById'])->name('patients.editById');
        Route::put('/patients', [PatientController::class, 'updateById'])->name('patients.updateById');
        Route::delete('/patients', [PatientController::class, 'deleteById'])->name('patients.deleteById');
        Route::get('/patients/filter/{search}', [PatientController::class, 'filter'])->name('patients.filter');


        Route::resource('doctors', DoctorController::class)->name('index','directory_doctor');
        Route::get('/doctor', 'doctor')->name('directory_doctor');
        Route::get('/items and services', 'item_services')->name('directory_item_services');
        Route::get('/guarrantor', 'guarrantor')->name('directory_guarrantor');


        // Route::resource('itemservices', ControllersItemAndServicesController::class)->name('index','directory_itemservices');
    });
});
