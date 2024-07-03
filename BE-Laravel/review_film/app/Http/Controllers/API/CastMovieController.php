<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CastMovieRequest;
use App\Models\CastMovie;
use Illuminate\Http\Request;

class CastMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $castmovie = CastMovie::all();
        return response()->json([
            "message" => "tampil semua data",
            "data" => $castmovie
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CastMovieRequest $request)
    {
        CastMovie::create($request-> all());
        return response()-> json([
            "message" => "data cast movie berhasil ditambahkan"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $castmovie = CastMovie::find($id);
        if(!$castmovie){
            return response()->json([
                "message" => "id cast tidak ditemukan"
            ]);
        }
        return response()->json([
            "message" => "data id "
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CastMovieRequest $request, string $id)
    {
        $castmovie = CastMovie::find($id);
        if(!$castmovie){
            return response()->json([
                "message" => "id tidak ditemukan"
            ],404);
        }
        $castmovie -> update($request->all());
        return response()->json([
            "message" => 'Data Cast Movie Telah di update'
        ], 201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $castmovie = CastMovie::find($id);

        if(!$castmovie){
            return response()->json([
                "message" => 'id tidak ditemukan'  
            ], '404'); 
        }
        $castmovie->delete();
        return response()->json([
            'message' => "Data cast movie berhasil di hapus dengan id : $id",
            // 'data' => $validated
        ]);
    }
}
