<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function create(Request $request, $post_id) {
        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->post_id = $post_id;
        $comment->comment = $request->comment;
        $comment->save();

        return response()->json([
            'error' => false,
            'status' => 'Berhasil disimpan'
        ]);
    }

    public function find($post_id) {
        $comment = Comment::find($post_id);

        return response()->json([
            'error' => false,
            'status' => 'Berhasil',
            'data' => $comment
        ]);
    }

    public function delete($post_id) {
        $comment = Comment::find($post_id);
        $comment->delete();

        return response()->json([
            'error' => false,
            'status' => 'Berhasil dihapus'
        ]);
    }
}
