<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::any('/admin/{any?}', [AdminController::class, 'index'])->where('any', '.*')->middleware('auth');
Route::post('/users/login', [AdminController::class, 'login']);
Route::post('/users/create', [AdminController::class, 'createAdmin']);

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

/*
Route::middleware("auth:sanctum")->get('/user', function(Request $request) {
    return $request->user;
});*/

/*Route::group(["middleware"=>"auth:sanctum"], function () {
    Route::get();
});*/