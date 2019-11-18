<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    protected function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required|min:1',
        ]);

        $input['user_id'] = $request->user()->id;
        $input['comment'] = $request->get('comment');
        $request->get('parent_id') ?  $input['parent_id'] = $request->get('parent_id') : $input['parent_id'] = 0;
        Comment::create($input);
        $comments = Comment::with(['author', 'sub_comments'])->where('parent_id',0)->orderBy('created_at')->get();
        return view('comments', compact('comments'));
    }

}
