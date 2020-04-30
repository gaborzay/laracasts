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

class Order
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('/update', function () {
    \App\Events\OrderStatusUpdated::dispatch(new Order(5));
});

Route::get('/tasks', function () {
    return \App\Task::oldest()->pluck('body');
});

Route::post('/tasks', function () {
    $task = \App\Task::forceCreate(request(['body']));

    event(new App\Events\TaskCreated($task));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
