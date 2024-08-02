<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return Profile::all();
    }

    public function show($id)
    {
        return Profile::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'bio' => 'nullable|string',
            'age' => 'nullable|integer',
            'user_id' => 'required|uuid|exists:users,id',
        ]);

        $profile = Profile::create($request->all());
        return response()->json($profile, 201);
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->update($request->all());
        return response()->json($profile);
    }

    public function destroy($id)
    {
        Profile::destroy($id);
        return response()->json(['message' => 'Profile deleted successfully']);
    }
}
