<?php

namespace App\Http\Controllers;

use App\Models\Art_tag;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function home()
    {

 $articles=Article::with('tags','categories')->get();

//return $articles;

// return   $categories=Category::with('articles')->find($articles[2]->id);

 //$categories=Category::with('articles')->find($articles[1]->id);
//return $categories;

       return view('home',['articles'=>$articles]);
    }
}
