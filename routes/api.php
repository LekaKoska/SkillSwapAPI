<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\SkillsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function ()
{
    Route::post('/register', 'register');
    Route::post('/login',  'login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
    Route::patch('/bio', 'bio')->middleware('auth:sanctum');
});
Route::controller(SkillsController::class)->middleware('auth:sanctum')->group(function ()
{
    Route::get('/skills', 'index');
    Route::post('/skills/add', 'add');
});


