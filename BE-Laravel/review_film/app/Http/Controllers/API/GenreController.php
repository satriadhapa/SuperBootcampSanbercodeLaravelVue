<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\GenreRequest;

class GenreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('isAdmin')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        return response()->json([
            "message" => "tampil semua data",
            "data" => $genres
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenreRequest $request)
    {
        Genre::create($request->all());

        return response()->json([
            'message' => 'Data genre berhasil',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genres = Genre::find($id);

        if (!$genres) {
            return response()->json([
                "message" => 'id tidak ditemukan'
            ], 404);
        }
        return response()->json([
            "message" => "data id dengan id : $id ",
            "data" => $genres
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GenreRequest $request, string $id)
    {
        $genres = Genre::find($id);

        if (!$genres) {
            return response()->json([
                "message" => 'id tidak ditemukan'
            ], 404);
        }
        $genres->update($request->all());

        return response()->json([
            'message' => "Data genre berhasil di update dengan id : $id",
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genres = Genre::find($id);

        if (!$genres) {
            return response()->json([
                "message" => 'id tidak ditemukan'
            ], 404);
        }
        $genres->delete();
        return response()->json([
            'message' => "Data genre berhasil di hapus dengan id : $id",
        ]);
    }
}
