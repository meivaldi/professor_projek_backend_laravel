<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    public function index() {
      $posts = Post::all();

      return response()->json([
        'error' => false,
        'status' => 'Berhasil',
        'data' => $posts
      ]);
    }

    public function find($id) {
      $post = Post::where('id', $id)->get();

      return response()->json([
          'error' => false,
          'status' => 'Berhasil',
          'data' => $post
      ]);
    }

    public function create(Request $request) {
      $post = new Post;
      $post->title = $request->title;
      $post->content = $request->content;
      $save = $post->save();

      if ($save) {
        return response()->json([
          'error' => false,
          'status' => 'Berhasil disimpan'
        ]);
      } else {
        return response()->json([
          'error' => true,
          'status' => 'Gagal disimpan'
        ]);
      }
    }

    public function update(Request $request, $id) {
      $post = Post::find($id);

      $post->title = $request->title;
      $post->content = $request->content;
      $update = $post->save();

      if ($update) {
        return response()->json([
          'error' => false,
          'status' => 'Berhasil di update'
        ]);
      } else {
        return response()->json([
          'error' => true,
          'status' => 'Gagal di update'
        ]);
      }
    }

    public function delete($id) {
      $post = Post::find($id);
      $delete = $post->delete();

      if ($delete) {
        return response()->json([
          'error' => false,
          'status' => 'Berhasil dihapus'
        ]);
      } else {
        return response()->json([
          'error' => true,
          'status' => 'Gagal dihapus'
        ]);
      }
    }
}
