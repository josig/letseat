<?php
use CodexShaper\PWA\Facades\PWA;
use Illuminate\Support\Facades\Route;

Route::get('/','RedirectController@index')->name('index');

Route::view('/condiciones', 'condiciones')->name('condiciones');
Route::view('/tutorial', 'tutorial')->name('tutorial');

// Authentication Routes...
//Auth::routes();
// Registration Routes...
Route::post('register', 'Auth\RegisterController@register')->name('register');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::resetPassword();

// Email Verification Routes...
Route::emailVerification();


Route::get('superadmin','Dashboards\SuperadminController@index')->middleware('can:dashboard.superadmin')->name('dashboard.superadmin');
Route::get('admin','Dashboards\AdminController@index')->middleware('can:dashboard.admin')->name('dashboard.admin');
Route::get('employee','Dashboards\EmployeeController@index')->middleware('can:dashboard.employee')->name('dashboard.employee');
Route::get('tutor','Dashboards\TutorController@index')->middleware('can:dashboard.tutor')->name('dashboard.tutor');
Route::get('student','Dashboards\StudentController@index')->middleware('can:dashboard.student')->name('dashboard.student');


Route::get('/home', 'HomeController@index')->name('home');



Route::resource('user', 'UserController')->names('users');
Route::resource('transaction', 'TransactionController')->names('transactions');
Route::resource('order', 'OrderController')->names('orders');
Route::resource('account', 'AccountController')->names('accounts');
Route::resource('establishment', 'EstablishmentController')->names('establishments');
Route::resource('branch', 'BranchController')->names('branches');

PWA::routes();