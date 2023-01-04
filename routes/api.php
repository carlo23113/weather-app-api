<?php

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

Route::post('/auth/logout', [App\Http\Controllers\LoginController::class, 'logout']);
Route::post('/auth/getUser', [App\Http\Controllers\LoginController::class, 'getUser']);
Route::post('/auth/check', [App\Http\Controllers\LoginController::class, 'authCheck']);
Route::get('/login/github', [App\Http\Controllers\LoginController::class, 'redirectToGithub']);
Route::get('/login/github/callback', [App\Http\Controllers\LoginController::class, 'handleGithubCallback']);