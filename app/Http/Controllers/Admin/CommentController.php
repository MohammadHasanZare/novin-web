<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use System\Auth\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CommentRequest;

class CommentController extends AdminController
{
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comment.index', compact('comments'));
    }
    public function show($id)
    {
        $comments = Comment::find();
        return view('admin.comment.show', compact('comment'));
    }
    public function approved($id)
    {
        $comments = Comment::find($id);
        if ($comments->approved == 0) {
            $comments = Comment::update(['id' => $id, 'approved' => 1]);
        } else {
            $comments = Comment::update(['id' => $id, 'approved' => 0]);
        }
        return back();
    }
    public function answer($id)
    {
        $comment=Comment::find($id);
        $request=new CommentRequest();
        $inputs=$request->all();
        $inputs['user_id']= Auth::User()->id;
        $inputs['post_id']=$comment->post_id;
        $inputs['parent_id']=$comment->id;
        $inputs['approved'] = 1;
        $inputs['status']=0;
        Comment::create($inputs);
        return back();
        

    }
}
