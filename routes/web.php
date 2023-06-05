<?php
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route client
Route::resource('client', ClientController::class);
// route project
Route::resource('project', ProjectController::class);
Route::delete('/selected-data',[ProjectController::class,'deleteAll'])->name('data.delete');