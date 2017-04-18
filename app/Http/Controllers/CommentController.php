<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use Auth;
use App\Lesson;
class CommentController extends Controller
{
    public function getDelete($id, $less_id)
    {
    	$cmt = Comment::find($id);
    	$cmt->delete();
    	return redirect('/lesson/edit/'.$less_id)->with('thongbao', 'Xóa comment thành công');
    }
     public function postComment($id, Request $request)
    {
        $less_id = $id;
        $less = Lesson::find($id);
        $comment = new Comment;
        $comment->less_id = $less_id;
        $comment->user_id = Auth::user()->id;
        $comment->noidung = $request->noidung;
        $comment->save();
        return redirect('/cate/lesson/' . $less->id);
    }
}
