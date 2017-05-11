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
use App\Http\Controllers\Profile\ProfileController;
use App\Model\Error;
use Illuminate\Http\Request;
use App\Http\Controllers\Search\SearchController;

Route::get('/', function (Request $request) {
    $controller = new ItemController();
    $items = $controller->list_latest($request);
    return view('home', ['items' => $items]);
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
    $analyze = $controller->list_jdid_analyze($request);
    return view('list', ['items' => $items, 'analyze' => $analyze]);
});

Route::match(['get', 'post'], '/list/jdid_analyze', function (Request $request) {
    $controller = new ItemController();
    $ret = $controller->list_jdid_analyze($request);
    return $ret;
});

Route::match(['get', 'post'], '/list/jdid_num', function (Request $request) {
    $controller = new ItemController();
    $count = $controller->list_jdid_num($request);
    return $count;
});

Route::match(['get', 'post'], '/list/latest', function (Request $request) {
    $controller = new ItemController();
    $items = $controller->list_latest($request);
    return view('item_list', ['items' => $items]);
});

Route::match(['get', 'post'], '/profile/detail', function (Request $request) {
    $controller = new ProfileController();
    $user = $controller->profile($request);
    if ($user instanceof Error) {
        return view('error', ['error' => $user]);
    } else {
        return view('profile', ['user' => $user]);
    }
})->name('/profile/detail');

Route::match(['get', 'post'], '/profile/update', function (Request $request) {
    $controller = new ProfileController();
    $user = $controller->update($request);
    if ($user instanceof Error) {
        return view('error', ['error' => $user]);
    } else {
        return view('profile', ['user' => $user]);
    }
})->name('/profile/update');

Route::post('/post/jd/submit', 'Post\PostJDController@add_post_with_action_id')->name('/post/jd/submit');

Route::match(['get', 'post'], '/search', function (Request $request) {
    $controller = new SearchController();
    $items =  $controller->search($request);
    return view('item_list', ['items' => $items]);
})->name('/search');

Auth::routes();

Route::get('/home', function (Request $request) {
    $controller = new ItemController();
    $items = $controller->list_latest($request);
    return view('home', ['items' => $items]);
});