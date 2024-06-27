<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Http\Requests\CastRequest;
use App\Models\Cast;
=======
use App\Http\Requests\CastsRequest;
use App\Models\Cast;

>>>>>>> origin
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
<<<<<<< HEAD
    public function store(CastRequest $request)
=======
    public function store(CastsRequest $request)
>>>>>>> origin
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

        if($casts){
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
<<<<<<< HEAD
    public function update(CastRequest $request, string $id)
=======
    public function update(Request $request, string $id)
>>>>>>> origin
    {
        $casts = Cast::find($id);
        
        if($casts){
            return response()->json([
                "message" => 'id tidak ditemukan'  
            ], '404'); 
        }
        $casts->name = $request['name'];
 
<<<<<<< HEAD
        $casts->update($request->all());
=======
        $casts->save();
>>>>>>> origin
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
        
        if($casts){
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
