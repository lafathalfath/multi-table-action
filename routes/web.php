<?php

use App\Http\Controllers\MultiController;
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

Route::get('/index/{table}', [MultiController::class, 'index'])->name('index');
Route::get('/create/{table}', [MultiController::class, 'create'])->name('create');
Route::post('/store/{table}', [MultiController::class, 'store'])->name('store');
Route::get('/edit/{table}/{id}', [MultiController::class, 'edit'])->name('edit');
Route::put('/update/{table}/{id}', [MultiController::class, 'update'])->name('update');
Route::delete('/destroy/{table}/{id}', [MultiController::class, 'destroy'])->name('destroy');
