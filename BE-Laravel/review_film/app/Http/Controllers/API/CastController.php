<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CastRequest;
use App\Models\Cast;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $casts = Cast::all();
        return response()->json([
            "message" => "tampil semua data",
            "data" => $casts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CastRequest $request)
    {
        // $validated = $request->validated();

        Cast::create($request->all());

        return response()->json([
            'message' => 'Data cast berhasil ditambah',
            // 'data' => $validated
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $casts = Cast::find($id);

        if(!$casts){
            return response()->json([
                "message" => 'id tidak ditemukan'  
            ], '404'); 
        }
        return response()->json([
            "message" => "data id dengan id : $id ",
            "data" => $casts
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CastRequest $request, string $id)
    {
        $casts = Cast::find($id);

        if(!$casts){
            return response()->json([
                "message" => 'id tidak ditemukan'  
            ], '404'); 
        }
        $casts->update($request->all());
        // $casts->name = $request['name'];
        // $casts->age = $request['age'];
        // $casts->bio = $request['bio'];

        // $casts->save();
        return response()->json([
            'message' => "Data cast berhasil di update dengan id : $id",
            // 'data' => $validated
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $casts = Cast::find($id);

        if(!$casts){
            return response()->json([
                "message" => 'id tidak ditemukan'  
            ], '404'); 
        }
        $casts->delete();
        return response()->json([
            'message' => "Data cast berhasil di hapus dengan id : $id",
            // 'data' => $validated
        ]);
    }
}