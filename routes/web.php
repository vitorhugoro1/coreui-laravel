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

/* CoreUI templates */
Route::view('/', 'templates.index');
// Section UI elements
Route::view('/templates/buttons', 'templates.buttons');
Route::view('/templates/social', 'templates.social');
Route::view('/templates/cards', 'templates.cards');
Route::view('/templates/forms', 'templates.forms');
Route::view('/templates/modals', 'templates.modals');
Route::view('/templates/switches', 'templates.switches');
Route::view('/templates/tables', 'templates.tables');
Route::view('/templates/tabs', 'templates.tabs');
Route::view('/templates/font-awesome-icons', 'templates.font-awesome-icons');
Route::view('/templates/simple-line-icons', 'templates.simple-line-icons');
Route::view('/templates/widgets', 'templates.widgets');
Route::view('/templates/charts', 'templates.charts');
// Section Pages
Route::view('/templates/login', 'templates.login')->name('login');
Route::view('/templates/register', 'templates.register')->name('register');
Route::view('/templates/error404', 'templates.error404')->name('error404');
Route::view('/templates/error500', 'templates.error500')->name('error500');
