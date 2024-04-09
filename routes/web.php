<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AskController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AskMailController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MembershipMailController;

/*Route::get('/', function () {
    return view('app');
});*/


//Auth::routes();

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

Route::any('/admin/{any?}', [AdminController::class, 'index'])->where('any', '.*')->middleware('auth');

Route::post('/users/login', [AdminController::class, 'login']);
Route::post('/users/logout', [AdminController::class, 'logout']);
Route::post('/users/signin', [UserController::class, 'storeAdmin']);

Route::get('/api/news-items', [NewsController::class, 'index']);
Route::get('/api/news-items/{id}', [NewsController::class, 'show']);
Route::put('/api/news-items/update/{id}', [NewsController::class, 'update']);//->middleware('auth');
Route::post('/api/news-items/{id}', [NewsController::class, 'store']);
Route::delete('/api/news-items/{id}', [NewsController::class, 'destroy']);

Route::get('/login', [AdminController::class, 'getLogin'])->name('login');

Route::post('/api/post/membership-items', [MembershipController::class, 'store']);
Route::put('/api/post/ask-items/update/{id}', [MembershipController::class, 'update']);
Route::get('/api/membership-items', [MembershipController::class, 'index']);
Route::get('/api/membership-items/{id}', [MembershipController::class, 'show']);

Route::post('/api/post/ask-items', [AskController::class, 'store']);

Route::get('api/mail_ask', [AskMailController::class, 'index']);
Route::post('api/mail_ask/send_mail', [AskMailController::class, 'sendMail']);

Route::get('api/mail_membership', [MembershipMailController::class, 'index']);
Route::post('api/mail_membership/send_mail', [MembershipMailController::class, 'sendMail']);

Route::get('{view}', ApplicationController::class)->where('view', '(.*)');
