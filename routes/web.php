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
use App\Http\Controllers\ItemController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/list', 'ItemController@index');

Route::get('/listview', function () {
    return view('list');
});

Route::match(['get', 'post'], '/list/jdid_json', function (Request $request) {
    $controller = new ItemController();
    $items = $controller->list_jdid_json($request);
    return $items;
});


Route::match(['get', 'post'], '/list/jdid', function (Request $request) {
    $controller = new ItemController();
    $items = $controller->list_jdid_json($request);
    return view('list', ['items' => $items]);
});

Route::match(['get', 'post'], '/list/jdid_num', function (Request $request) {
    $controller = new ItemController();
    $count = $controller->list_jdid_num($request);
    return $count;
});