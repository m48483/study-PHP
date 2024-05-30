<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function index($board_id)
    {
        Log::info('Get method called', [
            'comments list get', $board_id
        ]);
        $comments = Comment::where('board_id', $board_id)->get();
        return response()->json($comments);
    }

    public function store(Request $request, $board_id)
    {
        $comment = new Comment();
        $comment->comment_author = $request->input('comment_author');
        $comment->comment_content = $request->input('comment_content');
        $comment->board_id = $board_id;
        $comment->save();
        return response()->json($comment, 201);
    }

    public function update(Request $request, $board_id, $id)
    {
        Log::info('Update method called', [
            'comment update', $board_id, $id, $request->input('comment_content')
        ]);
        $comment = Comment::where('board_id', $board_id)->findOrFail($id);
        $comment->update([
            'comment_content' => $request->input('comment_content'),
        ]);
        return response()->json($comment);
    }

    public function destroy($board_id, $id)
    {
        $comment = Comment::where('board_id', $board_id)->findOrFail($id);
        $comment->delete();
        return response()->json(null, 204);
    }
}
