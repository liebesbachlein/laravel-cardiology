<?php

namespace App\Http\Controllers;

use App\Models\NewsItem;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //Show all news
    public function index() {
        $news = NewsItem::orderBy('date_published', 'desc')->get();
        return $news;
    }

    //Show single news
    public function show($id) {
        return NewsItem::findOrFail($id);
    }
}
