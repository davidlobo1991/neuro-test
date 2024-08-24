<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SessionScoreController;
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


Route::get('/api/backend/history', [SessionScoreController::class, 'index'])->middleware('auth');
Route::get('/api/backend/last-categories', [CategoriesController::class, 'index'])->middleware('auth');


// add login route for allowing redirection if authentication is not possible
Route::get('login', function () {
    return view('welcome');
})->name('login');;

