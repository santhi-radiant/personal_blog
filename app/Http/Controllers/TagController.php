<?php

namespace App\Http\Controllers;
use app\Models\Tag;

use DB;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function tag_list()
    {
        $tag_list=DB::select('select * from tags');
        return view('tags',['tag_list'=>$tag_list]);
    }
    public function add_tag()
    {
        return view('add_tag');
    }
    public function save_tag(Request $request)
    {
        $tag_name=$request->input('tag');
        DB::insert('insert into tags(tag,created_at,updated_at) values(?,?,?)',[$tag_name,now(),now()]);
       return 'Tag Inserted Successfully...<a href="/tags">Go To Tags </a>';

    }
    public function edit_tag($id)
    {
        $tag=DB::select('select * from tags where id=?',[$id]);
        return view('edit_tag',['tag'=>$tag]);

    }
    public function update_tag(Request $request,$id)
    {
        $tag_name=$request->input('tag');
        DB::update('update tags set tag=? where id=?',[$tag_name,$id]);
       return 'Tag Updated Successfully...<a href="/tags">Go To Tags </a>';
    }
    public function delete_tag($id)
    {
        DB::delete('delete from tags where id=?',[$id]);
        return 'Tag Deleted Successfully...<a href="/tags">Go To Tags </a>';
    }


}
