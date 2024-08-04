<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Borrows;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('owner');
    }
    public function index()
    {
        return Borrows::all();
    }

    public function show($id)
    {
        return Borrows::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'load_date' => 'required|date',
            'barrow_date' => 'required|date',
            'book_id' => 'required|uuid|exists:books,id',
            'user_id' => 'required|uuid|exists:users,id',
        ]);

        $borrow = Borrows::create($request->all());
        return response()->json($borrow, 201);
    }

    public function update(Request $request, $id)
    {
        $borrow = Borrows::findOrFail($id);
        $borrow->update($request->all());
        return response()->json($borrow);
    }

    public function destroy($id)
    {
        Borrows::destroy($id);
        return response()->json(['message' => 'Borrow deleted successfully']);
    }
}

