<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('owner')->except(['index', 'show']);
    }

    public function index()
    {
        $books = Book::with('category')->get();
        return response()->json($books);
    }

    public function show($id)
    {
        $book = Book::with('category')->findOrFail($id);
        return response()->json($book);
    }

    public function store(BookRequest $request)
    {
        $url = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $url = 'storage/' . $path;
        }

        $book = Book::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'image' => $url,
            'stok' => $request->stok,
            'category_id' => $request->category_id,
        ]);

        return response()->json($book, 201);
    }

    public function update(BookRequest $request, $id)
    {
        $book = Book::findOrFail($id);

        $url = $book->image;
        if ($request->hasFile('image')) {
            if ($book->image) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $book->image));
            }

            $path = $request->file('image')->store('images', 'public');
            $url = 'storage/' . $path;
        }

        $book->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'image' => $url,
            'stok' => $request->stok,
            'category_id' => $request->category_id,
        ]);

        return response()->json($book);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        if ($book->image) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $book->image));
        }

        $book->delete();

        return response()->json(null, 204);
    }
}
