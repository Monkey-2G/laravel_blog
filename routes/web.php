<?php

use App\Http\Controllers\TaskController;
use GuzzleHttp\Middleware;
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

/*
    xprefix는 그룹안의 라우트에 특정 URI을 접두어로 지정할 때 사용한다.
    Middleware는 아래의 라우트를 통해페이지에 접근하기 전에 거치는 중간 단계라고 생각하면 될듯.
    = tasks URI에 속하는 모든 경로는 페이지 접근 전 auth (로그인 인증)을 먼저 거친 후에 해당 경로로 이동하게 된다.
*/
Route::prefix('tasks')->middleware('auth')->group(function () {

    Route::get('/', 'TaskController@index');

    Route::get('/create', 'TaskController@create');

    Route::post('/', 'TaskController@store');

    Route::get('/{task}', 'TaskController@show');

    Route::get('/{task}/edit', 'TaskController@edit');

    Route::put('/{task}', 'TaskController@update');

    Route::delete('/{task}', 'TaskController@destory');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

