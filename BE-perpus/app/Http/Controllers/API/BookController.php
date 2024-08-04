<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('owner');
        $this->middleware('user')->only(['index', 'show']);
    }

    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    public function show($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return response()->json($book);
    }

    public function store(BookRequest $request)
    {
        // Handle the file upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
        }

        $book = Book::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'image' => $path ?? null, // store the path in the database
            'stok' => $request->stok,
            'category_id' => $request->category_id,
        ]);

        return response()->json($book, 201);
    }

    public function update(BookRequest $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        // Handle the file upload
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($book->image) {
                Storage::delete($book->image);
            }
            $path = $request->file('image')->store('public/images');
        }

        $book->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'image' => $path ?? $book->image, // update the path in the database
            'stok' => $request->stok,
            'category_id' => $request->category_id,
        ]);

        return response()->json($book);
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        // Delete the image if exists
        if ($book->image) {
            Storage::delete($book->image);
        }

        $book->delete();
        return response()->json(['message' => 'Book deleted successfully']);
    }
}
