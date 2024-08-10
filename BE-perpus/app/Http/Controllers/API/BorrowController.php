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
        $this->middleware('owner')->except(['store']);
    }

    public function index()
    {
        return response()->json(Borrow::with(['book', 'user'])->get());
    }

    public function show($id)
    {
        return response()->json(Borrow::with(['book', 'user'])->findOrFail($id));
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
                'user_id' => $currentUser->id,
            ]
        );

        return response()->json([
            'message' => "Peminjaman berhasil dibuat/diubah",
            'data' => $borrowData
        ], 201);
    }

    public function update(Request $request, $id)
    {
        // Method ini dapat diimplementasikan sesuai kebutuhan
    }

    public function destroy($id)
    {
        // Method ini dapat diimplementasikan sesuai kebutuhan
    }
}
