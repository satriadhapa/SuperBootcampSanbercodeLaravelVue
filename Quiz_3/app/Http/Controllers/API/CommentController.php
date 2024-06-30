<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comment = comment::all();
        return response()->json([
            'message' => 'menampilkan data seluruh comment',
            'data' => $comment
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        comment::create($request->all());
        return response()->json([
            'message' => 'Data comment berhasil',
            // 'data' => $validated
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = comment::find($id);
        if(!$post){
            return response()->json([
                'message' => 'coment id tidak ditemukan'
            ],404);
        }
        return response()->json([
            'message' => "Semua data comment dengan id : $id",
            'data' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, string $id)
    {
        $validatedData = $request->validate([
            'comment' => 'required|text',
        ]);
        $comment = comment::findOrFail($id);
        if(!$comment){
            return response()->json([
                'message' => 'id tidak ditemukan'
            ], 404);
        }
        $comment->name = $request['comment'];
        $comment->update($validatedData);
        return response()->json([
            'message'=>"comment berhasil di update dengan id : $id",
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = comment::findOrFail($id);
        if(!$comment){
            return response()->json([
                'message' => "id commentnya tidak ditemukan"
            ],404);
        }
        $comment->delete();
        return response()->json([
            'message' => "comment data berhasil dihapus dengan id :$id"
        ]);
    }
}
