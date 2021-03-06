<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function postComment(Request $request)
    {
        $this->validate($request, [
           'comment' => 'required'
        ]);

        $comment = Comment::create([
           'ticket_id' => $request->input('ticket_id'),
           'user_id' => Auth::user()->id,
           'comment' => $request->input('comment')
        ]);

        return redirect()->back()->with('status', 'Ваш коментарий сохранен');
    }

}
