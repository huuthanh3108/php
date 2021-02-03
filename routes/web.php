<?php

use Illuminate\Support\Facades\Route;
use App\Page;
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
try {
    $pages = Page::all();
    foreach ($pages as $page) {
        $name = 'page-' . $page->id;
        if (!empty($page->controller_action)) {
            Route::get('/' . $page->slug, $page->controller_action)->name($name);
        }
        else {
            Route::get('/' . $page->slug, 'PageController@show')->name($name);
        }
    }
} catch (Exception $e) {
    echo '*************************************' . PHP_EOL;
    echo 'Error fetching database pages: ' . PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
    echo '*************************************' . PHP_EOL;
}
/*
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/
