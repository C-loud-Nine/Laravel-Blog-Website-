<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller

{
    public function showNews()
    {
        $response = Http::get('https://newsapi.org/v2/top-headlines?country=us&apiKey=2bc407bd53b14431a37eeb23e745eb69');
        $articles = $response->json()['articles'];
        return view('newsapi', compact('articles'));
    }

    
}
