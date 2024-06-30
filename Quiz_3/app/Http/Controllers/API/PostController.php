<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::all();
        return response()->json([
            'message' => 'menampilkan data seluruh posting',
            'data' => $post
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {

        Post::create($request->all());
        return response()->json([
            'message' => 'Data post berhasil',
            // 'data' => $validated
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        if(!$post){
            return response()->json([
                'message' => 'post id tidak ditemukan'
            ],404);
        }
        return response()->json([
            'message' => "tampil Semua data posting dengan id : $id",
            'data' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);
        $post = Post::findOrFail($id);
        if(!$post){
            return response()->json([
                'message' => 'id tidak ditemukan'
            ], 404);
        }
        $post->name = $request['title'];
        $post->update($validatedData);
        return response()->json([
            'message'=>"data post berhasil di update dengan id : $id",
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        if(!$post){
            return response()->json([
                'message' => "id post tidak ditemukan"
            ],404);
        }
        $post->delete();
        return response()->json([
            'message' => "data post berhasil dihapus dengan id :$id"
        ]);
    }
}
