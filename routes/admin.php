<?php


use Illuminate\Support\Facades\Route;

Route::view('/', 'panel.blank')->name('home');
Route::resource('users', 'UserController')->except(['show']);
Route::resource('championships', 'ChampionshipController');
Route::resource('roles', 'RoleController');
Route::resource('academies', 'AcademyController');
Route::resource('categories', 'CategoryController');
Route::get('ageing', 'AgeingController@basic')->name('ageing');
Route::get('ageing/category/{category}', 'AgeingController@byCategory')
    ->name('ageing.category');

Route::name('user.')->prefix('user')->group(function () {
    Route::resource('organizers', 'OrganizerController');
    Route::resource('bank-accounts', 'UserBankAccountController');
});