<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::all();
        return view('admin.comment.index',compact('comments'));
    }
    public function detail($id){
        $comments = Comment::find($id);
        return view('admin.comment.detail',compact('comments'));
    }
}
