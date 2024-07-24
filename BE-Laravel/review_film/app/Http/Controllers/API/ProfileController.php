<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $currentUser = auth()->user();
    $profile = Profil::where('user_id', $currentUser->id)->first();

    if (!$profile) {
        return response()->json([
            'message' => "Profile not found",
            'data' => null
        ], 404);
    }

    return response()->json([
        'message' => "Profile data fetched successfully",
        'data' => $profile
    ], 200);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'age' => 'required|integer',
            'biodata' => 'required|string',
            'address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $currentUser = auth()->user();

        $user = User::find($currentUser->id);
        $profileData = profil::updateOrCreate(
            ['user_id'=> $currentUser ->id],
            [
                'age' => $request['age'],
                'biodata' => $request['biodata'],
                'address' => $request['address'],
                'user_id' => $currentUser->id
            ]   
        );
        return response()->json([
            'message' => "tamabah dan update profil",
            'data' => $profileData
        ]);
    }
        /**
         * Display the specified resource.
         */
        // [
    
        // ]
        // [
    
        //     'age' => $request['age'],
        //     'biodata' => $request['biodata'],
        //     'address' => $request['address'],
        // ]);
        public function show(string $id)
        {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
