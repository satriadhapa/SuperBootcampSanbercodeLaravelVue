<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'string',
            'image' => 'string',
            'stok' => 'integer',
            'category_id' => 'required|uuid|exists:categories,id',
        ]);

        $book = Book::create([
            'id' => Str::uuid(),
            'title' => $request->title,
            'summary' => $request->summary,
            'image' => $request->image,
            'stok' => $request->stok,
            'category_id' => $request->category_id,
        ]);

        return response()->json(['message' => 'Book created successfully', 'book' => $book], 201);
    }

    public function show($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return $book;
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $request->validate([
            'title' => 'string|max:255',
            'summary' => 'string',
            'image' => 'string',
            'stok' => 'integer',
            'category_id' => 'uuid|exists:categories,id',
        ]);

        $book->update($request->all());

        return response()->json(['message' => 'Book updated successfully', 'book' => $book], 200);
    }

    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->delete();

        return response()->json(['message' => 'Book deleted successfully'], 200);
    }
}

