<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\GenreRequest;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        return response()->json([
            "message" => "tampil semua data genre",
            "data" => $genres
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenreRequest $request)
    {
        // $validated = $request->validated();
        
        Genre::create($request->all());
        
        return response()->json([
            'message' => 'Data genre berhasil',
            // 'data' => $validated
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genres = Genre::find($id);

        if($genres){
            return response()->json([
                "message" => 'id tidak ditemukan'  
            ], '404'); 
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
        
        if($genres){
            return response()->json([
                "message" => 'id tidak ditemukan'  
            ], '404'); 
        }
        $genres->name = $request['name'];
 
        $genres->save();
        return response()->json([
            'message' => "Data genre berhasil di update dengan id : $id",
            // 'data' => $validated
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genres = Genre::find($id);
        
        if($genres){
            return response()->json([
                "message" => 'id tidak ditemukan'  
            ], '404'); 
        }
        $genres->delete();
        return response()->json([
            'message' => "Data genre berhasil di hapus dengan id : $id",
            // 'data' => $validated
        ]);
    }
}