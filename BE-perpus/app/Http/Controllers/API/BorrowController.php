<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BorrowController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('owner');
    }
    public function index()
    {
        return Borrow::all();
    }

    public function show($id)
    {
        return Borrow::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'load_date' => 'required|date',
            'barrow_date' => 'required|date',
            'book_id' => 'required|uuid|exists:books,id',
            'user_id' => 'required|uuid|exists:users,id',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $currentUser = auth()->user();

        $borrowData = Borrow::updateOrCreate(
            ['user_id' => $currentUser->id],
            [
                'load_date' => $request['load_date'],
                'barrow_date' => $request['barrow_date'],
                'book_id' => $request['book_id'],
                'user_id' => $request['user_id'],
            ]
            );
            return response()->json([
                'message' => "Pemijaman berhasil dibuat/diubah",
                'data' => $borrowData
            ],201);
    }

    public function update(Request $request, $id)
    {
        // $borrow = Borrows::findOrFail($id);
        // $borrow->update($request->all());
        // return response()->json($borrow);
    }

    public function destroy($id)
    {
        // Borrows::destroy($id);
        // return response()->json(['message' => 'Borrow deleted successfully']);
    }
}

