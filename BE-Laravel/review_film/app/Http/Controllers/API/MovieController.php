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
        $movies = Movie::all();
        return response()->json([
            "message" => "All movies retrieved successfully",
            "data" => $movies
        ]);
    }

    public function store(MovieRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('poster')) {
            $posterName = time().'.'.$request->poster->extension();
            $request->poster->storeAs('public/posters', $posterName);
            $path = env('APP_URL')."/storage/posters/";
            $data['poster'] = $path.$posterName;
        }

        Movie::create($data);

        return response()->json([
            'message' => "Movie added successfully"
        ], 201);
    }

    public function show(string $id)
    {
        $movie = Movie::find($id);
        if (!$movie) {
            return response()->json([
                'message' => "Movie not found"
            ], 404);
        }

        return response()->json([
            "message" => "Movie retrieved successfully",
            "data" => $movie
        ]);
    }

    public function update(MovieRequest $request, string $id)
    {
        $data = $request->validated();
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json([
                'message' => "Movie not found"
            ], 404);
        }

        if ($request->hasFile('poster')) {
            if ($movie->poster) {
                $posterName = basename($movie->poster);
                Storage::delete('public/posters/' . $posterName);
            }
            $posterName = time().'.'.$request->poster->extension();
            $request->poster->storeAs('public/posters', $posterName);
            $path = env('APP_URL')."/storage/posters/";
            $data['poster'] = $path.$posterName;
        }

        $movie->update($data);

        return response()->json([
            "message" => "Movie updated successfully"
        ], 200);
    }

    public function destroy(string $id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json([
                "message" => "Movie not found"
            ], 404);
        }

        if ($movie->poster) {
            $posterName = basename($movie->poster);
            Storage::delete('public/posters/' . $posterName);
        }

        $movie->delete();

        return response()->json([
            "message" => "Movie deleted successfully"
        ], 200);
    }
}
