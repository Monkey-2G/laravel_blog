<?php

use App\Http\Controllers\TaskController;
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
    return view('welcome');
});

// 해당 페이지에서 작성을 하면 가독성 및 작업 효율이 떨어지기 때문에, Controller를 생성하여 그곳에서 처리하도록 한다. (MVC 중 C)
// (HomeController 의 hello function으로 연결된다.)
Route::get('/hello', 'HomeController@hello');

Route::get('/contact', 'HomeController@contact');

Route::get('/projects', 'ProjectController@index');

Route::get('/tasks', 'TaskController@index');

Route::get('/tasks/create', 'TaskController@create');

Route::post('/tasks', 'TaskController@store');

Route::get('/tasks/{task}', 'TaskController@show');