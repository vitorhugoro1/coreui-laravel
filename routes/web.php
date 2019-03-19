<?php

use App\Models\Championship;

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
/* CoreUI templates */
Route::get('/', function () {
    $championships = Championship::all();

    return view('home')->with(compact('championships'));
});
Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::resource('championships', 'ChampionshipController');

Route::middleware('auth')->group(function () {
    Route::name('admin.')->prefix('admin')->group(function () {
        Route::view('/', 'panel.blank')->name('home');
        Route::resource('users', 'Admin\UserController')->except(['show']);
        Route::resource('championships', 'Admin\ChampionshipController');
        Route::resource('roles', 'Admin\RoleController');
        Route::resource('academies', 'Admin\AcademyController');
        Route::resource('categories', 'Admin\CategoryController');
        Route::get('ageing', 'Admin\AgeingController@basic')->name('ageing');
        Route::get('ageing/category/{category}', 'Admin\AgeingController@byCategory')->name('ageing.category');

        Route::name('user.')->prefix('user')->group(function () {
            Route::resource('organizers', 'Admin\OrganizerController');
            Route::resource('bank-accounts', 'Admin\UserBankAccountController');
        });
    });
});
