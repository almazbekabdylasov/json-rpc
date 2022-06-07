<?php

use App\Http\Procedures\AnswerProcedure;
use App\Http\Procedures\FormsProcedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::rpc('/v1/forms', [FormsProcedure::class])->name('rpc.forms');
Route::rpc('/v1/answers', [AnswerProcedure::class])->name('rpc.answers');
