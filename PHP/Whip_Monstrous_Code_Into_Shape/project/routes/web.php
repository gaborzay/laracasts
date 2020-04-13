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

Route::get('/', function () {
    $user = factory('App\User')->make();

    return view('welcome', compact('user'));
});

Route::get('decorator', 'TutorialsController@store');

Route::get('purchases', 'PurchasesController@store');

Route::get('users', 'UsersCOntroller@store');

Route::get('team', 'TeamMembersController@store');
