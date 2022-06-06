<?php

use App\Http\Controllers\InputController;
use App\Http\Controllers\SelectController;
use App\Http\Controllers\TextareaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
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

Route::get('/', [FormController::class, 'index'])->name('form.index');
Route::resource('form', FormController::class);
//Route::get('form/create', [FormController::class, 'create'])->name('form.create');
//Route::post('form',[FormController::class, 'store'])->name('form.store');
//Route::get('form',[FormController::class, 'edit'])->name('form.edit');
Route::resource('input', InputController::class);
Route::resource('select', SelectController::class);
Route::resource('textarea', TextareaController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
