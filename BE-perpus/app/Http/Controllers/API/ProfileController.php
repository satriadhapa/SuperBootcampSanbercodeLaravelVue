<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
{
    $currentUser = auth()->user();

    if (!$currentUser) {
        return response()->json(['message' => 'User not authenticated'], 401);
    }

    $profiles = Profile::where('user_id', $currentUser->id)->first();

    if (!$profiles) {
        return response()->json(['message' => 'Profile not found for this user'], 404);
    }

    return response()->json($profiles);
}

    
public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'bio' => 'required|string',
        'age' => 'required|integer',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    $currentUser = auth()->user();

    if (!$currentUser) {
        return response()->json(['message' => 'User not authenticated'], 401);
    }

    $profileData = Profile::updateOrCreate(
        ['user_id' => $currentUser->id],
        [
            'bio' => $request['bio'],
            'age' => $request['age'],
        ]
    );

    return response()->json([
        'message' => 'Profile added or updated successfully',
        'data' => $profileData
    ], 201);
}
    
    public function show($id)
    {
        // $profile = Profile::find($id);
        // if (!$profile) {
        //     return response()->json(['message' => 'Profile not found'], 404);
        // }
        // return response()->json($profile);
    }
    public function update(Request $request, $id)
    {
        // $profile = Profile::find($id);
        // if (!$profile) {
        //     return response()->json(['message' => 'Profile not found'], 404);
        // }

        // $profile->update($request->validated());
        // return response()->json($profile);
    }

    public function destroy($id)
    {
        // $profile = Profile::find($id);
        // if (!$profile) {
        //     return response()->json(['message' => 'Profile not found'], 404);
        // }

        // $profile->delete();
        // return response()->json(['message' => 'Profile deleted successfully']);
    }
}
