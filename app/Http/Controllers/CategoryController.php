<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DB;

class CategoryController extends Controller
{
    public function category_list()
    {
        $category_list=Category::paginate(7);
        return view('categories',['category_list'=>$category_list]);
    }
    public function add_category()
    {
        return view('add_category');
    }

    public function save_category(Request $request)
    {
        $category_name=$request->input('category');
        DB::insert('insert into categories(category,created_at,updated_at) values(?,?,?)',[$category_name,now(),now()]);
        return 'Category Inserted Successfully...<a href="/categories">Go To Categories</a>';

    }

    public function edit_category($id)
    {
        $category=DB::select('select * from categories where id=?',[$id]);
        return view('edit_category',['category'=>$category]);

    }

    public function update_category(Request $request,$id)
    {
        $category_name=$request->input('category');
        DB::update('update categories set category=? where id=?',[$category_name,$id]);
       return 'Category Updated Successfully...<a href="/categories">Go To Categories </a>';
    }


    public function delete_category($id)
    {
        DB::delete('delete from categories where id=?',[$id]);
        return 'Category Deleted Successfully...<a href="/categories">Go To Categories </a>';
    }
}
