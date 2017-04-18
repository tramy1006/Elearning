<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Post;
use App\User;
use Auth;
class ForumController extends Controller
{
    
    public function getList()
    {
    	$post=Post::all();
    	return view('forum.list',['post'=>$post]);
    }
    public function getAdd()
    {
    	$cate = Category::all();
    	return view('forum.add',['cate'=>$cate]);
    }
    public function postAdd( Request $request)
    {
    	$post = new Post;
        $post->cate_id =$request->category;
        $post->user_id = Auth::user()->id;
        $post->title =$request->title;
        $post->noidung = $request->noidung;
        $post->save();
        return redirect('forum/list');
    }
    public function getChitiet()
    {
    	return view('forum.chitiet');
    }
    
}
