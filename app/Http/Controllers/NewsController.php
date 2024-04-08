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

    //Update single news
    public function update(Request $request, NewsItem $news) {

        $formFields = $request->validate([ 
            'id' => 'required',
            'title' => ['required', 'max:255'],
            'phrase' => ['required', 'max:255'],
            'date_published' => 'required',
            'summary' => ['required', 'max:1000'],
            'content' => ['required', 'max:3000']
        ]
        );
        $item = NewsItem::findOrFail($formFields['id']);
        $item->update($formFields);
    }

    //Store single news
    public function store(Request $request) {
        $formFields = $request->validate([ 
            'id' => ['required', 'max:255'],
            'title' => ['required', 'max:255'],
            'phrase' => ['required', 'max:255'],
            'date_published' => 'required',
            'summary' => ['required', 'max:1000'],
            'content' => ['required', 'max:3000']
        ]
        );

        NewsItem::create($formFields);
    }

    public function destroy($id) {

        NewsItem::destroy($id);

    }
}
