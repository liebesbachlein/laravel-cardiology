<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AskController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AskMailController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MembershipMailController;

/*Route::get('/', function () {
    return view('app');
});*/

Route::get('/api/news-items', [NewsController::class, 'index']);
Route::get('/api/news-items/{id}', [NewsController::class, 'show']);

Route::post('/api/post/membership_items', [MembershipController::class, 'store']);

Route::post('/api/post/ask_items', [AskController::class, 'store']);
Route::post('/api/post/education_items', [AskController::class, 'store']);

Route::get('api/mail_ask', [AskMailController::class, 'index']);
Route::post('api/mail_ask/send_mail', [AskMailController::class, 'sendMail']);

Route::get('api/mail_membership', [MembershipMailController::class, 'index']);
Route::post('api/mail_membership/send_mail', [MembershipMailController::class, 'sendMail']);

Route::get('{view}', ApplicationController::class)->where('view', '(.*)');
