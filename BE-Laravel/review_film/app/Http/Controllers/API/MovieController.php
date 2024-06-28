<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;


class MovieController extends Controller
{
    public function index()
    {
        $movie = Movie::all();
        return response()->json([
            "message" => "tampil semua dataaa",
            "data" => $movie
        ]);
    }
    public function store(MovieRequest $request){

        $data = $request->validated();

       // jika file gambar diinput

        if ($request->hasFile('image')) {

             // membuat unique name pada gamabr yang di input
            
             $imageName = time().'.'.$request->image->extension();

             // simpan gambar pada file storage

             $request->image->storeAs('public/images', $imageName);

             // menganti request nilai request image menjadi $imageName yang baru bukan berdasarkan request
             $path = env('APP_URL')."/storage/images/";

             $data['image'] = $path.$imageName;

        }

        Movie::create($data);

        return response()->json([
            'message' => "data berhasil ditambah"
        ], 201);
    }
    public function show(string $id)
    {
        $movie = Movie::find($id);
        if(!$movie){
            return response()->json([
                'message'=>"movie id tidak ditemukan"
            ],404);
        }
        return response()->json([
            "message" => "tampil semua data",
            "data" => $movie
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieRequest $request, string $id)
    {
        $data = $request->validated();

        $movie = Movie::find($id);


        if ($request->hasFile('image')) {

            // Hapus gambar lama jika ada

            if ($movie->image) {
                $namadata = basename($movie->image);
                Storage::delete('public/images/' . $namadata);
                // return response()->json('testing');
            }
            // unik data
            $imageName = time().'.'.$request->image->extension();

            $request->image->storeAs('public/images', $imageName);
            $path = env('APP_URL')."/storage/images/";

            $data['image'] = $imageName;

        }

        $movie->update($data);

        return response()->json([
            "message" => "data berhasil di update",

        ],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);

        if($movie){
            return response()->json([
                "message" => 'id tidak ditemukan'  
            ], '404'); 
        }
        if ($movie->image) {
            $namadata = basename($movie->image);
            Storage::delete('public/images/' . $namadata);
            // return response()->json('testing');
        }
        $movie ->delete();
        return response()->json([
            "message"=> "data berhasil di hapus"
        ],200);
    }
}
