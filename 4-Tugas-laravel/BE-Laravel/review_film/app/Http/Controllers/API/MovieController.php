<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;

class MovieController extends Controller
{
    public function store(MovieRequest $request){

        $validated = $request->validated();

        return response()->json([
            'message' => 'Movie created successfully',
            'data' => $validated
        ], 200);
    }
}
