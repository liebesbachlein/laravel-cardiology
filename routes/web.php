<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\NewsController;

/*Route::get('/', function () {
    return view('app');
});*/

Route::get('/api/news-items', [NewsController::class, 'index']);
Route::get('/api/news-items/{id}', [NewsController::class, 'show']);

Route::get('{view}', ApplicationController::class)->where('view', '(.*)');

