<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use DB;
class ArticleController extends Controller
{
    public function create_article_page()
    {
        $category_list=DB::select('select * from categories');
        $tags_list=DB::select('select * from tags');
        return view('article',compact(['category_list','tags_list']));
       // return view('article');
    }
    public function post_article_page(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'image|mimes:jpg,jpeg,png,gif,svg|max:2048',

        ]);
        $title=$request->input('title');
        $description=$request->input('description');
        $category_id=$request->input('category');
        $tag_id=$request->input('tags');

        //image name creation
        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$imageName);

$article= new Article;
$article->title=$title;
$article->description=$description;
$article->image=$imageName;
$article->save();


/*
$category_obj=DB::select('select * from categories where category = ?', [$category]);
$tag_obj=DB::select('select * from tags where tag = ?', [$tags]);

if($category_obj->category!=$category)
{
$category_obj->category=$category;
$category_obj->save();
}

if($tag_obj->tag!=$tags)
{
$tag_obj->tag=$tags;
$tag_obj->save();
}
*/
DB::insert("insert into art_categories(article_id,category_id)values(?,?)",[$article->id,$category_id]);
DB::insert("insert into art_tags(article_id,tag_id)values(?,?)",[$article->id,$tag_id]);
return 'Article Created Successfully...<a href="/">Go To Home </a>';
    }



     public function delete_article($id)
    {
        DB::delete('delete from articles where id=?',[$id]);
        return 'Article Deleted Successfully...<a href="/">Go To Home </a>';
    }

}
