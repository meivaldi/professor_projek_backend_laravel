<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tags = Tag::all();

      return response()->json([
        'error' => false,
        'status' => 'Berhasil',
        'data' => $tags
      ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tag = new Tag;
        $tag->tag = $request->tag;
        $save = $tag->save();

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

    /**
     * Display the specified resource.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::where('id', $id)->get();

        return response()->json([
          'error' => false,
          'status' => 'Berhasil',
          'data' => $tag
      ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);

        $tag->tag = $request->tag;
        $update = $tag->save();

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $tag = Tag::find($id);
      $delete = $tag->delete();

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
