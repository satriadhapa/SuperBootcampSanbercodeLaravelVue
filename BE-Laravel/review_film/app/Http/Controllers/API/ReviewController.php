<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Review::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'critic' => 'required|string',
            'rating' => 'required|integer',
            'movie_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $currentUser = auth()->user();

        $user = User::find($currentUser->id);
        $reviewData = Review::updateOrCreate(
            // ['user_id'=> $currentUser ->id],
            ['user_id' => $currentUser->id, 'movie_id' => $request->movie_id],
            ['critic' => $request->critic, 'rating' => $request->rating]   
        );
        return response()->json([
            'message' => "tamabah dan update profil",
            'data' => $reviewData
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reviewData = Review::findOrFail($id);
        return response()->json([
            'message' => 'tampil data review',
            'data' => $reviewData
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reviewData = Review::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'critic' => 'required|string',
            'rating' => 'required|integer',
            'movie_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $reviewData->update($request->all());

        return response()->json([
            'message' => 'Review updated successfully',
            'data' => $reviewData
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
