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
Route::resource('form', FormController::class)->except(['show']);
Route::resource('input', InputController::class)->except(['show','create','index']);
Route::resource('select', SelectController::class)->except(['show', 'create', 'index']);
Route::resource('textarea', TextareaController::class)->except(['show', 'create', 'index']);

Route::get('/answers', [\App\Http\Controllers\AnswerController::class, 'index'])->name('answers');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
