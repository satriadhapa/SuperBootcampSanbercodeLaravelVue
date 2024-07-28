<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CastRequest;
use App\Models\Cast;

class CastController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth:api', 'isAdmin'])->only('index');
    }

    public function index()
    {
        $casts = Cast::all();
        return response()->json([
            "message" => "tampil semua data",
            "data" => $casts
        ]);
    }

    public function store(CastRequest $request)
    {
        Cast::create($request->all());
        return response()->json([
            'message' => 'Data cast berhasil ditambah',
        ], 201);
    }

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

    public function update(CastRequest $request, string $id)
    {
        $casts = Cast::find($id);

        if(!$casts){
            return response()->json([
                "message" => 'id tidak ditemukan'  
            ], '404'); 
        }
        $casts->update($request->all());
        return response()->json([
            'message' => "Data cast berhasil di update dengan id : $id",
        ], 201);
    }

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
        ]);
    }
}
