<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['verify' => true]);

Route::get('/','NewsController@index')->middleware('verified');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('/about', function (){
    return view('about');
})->name('about')->middleware('auth');


Route::group(['namespace' => 'Admin'],function(){
    Route::get('first', 'FirstController@Showname');
});

Route::resource("news",'NewsController');






