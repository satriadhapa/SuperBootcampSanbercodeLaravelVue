<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('owner')->except(['index', 'show']);
    }

    public function index()
    {
        $books = Book::with('category')->get();

        // Menambahkan APP_URL ke path image
        $books->each(function ($book) {
            if ($book->image) {
                $book->image = env('APP_URL') . '/images/' . basename($book->image);
            }
        });

        return response()->json($books);
    }

    public function show($id)
    {
        $book = Book::with('category')->findOrFail($id);

        // Menambahkan APP_URL ke path image
        if ($book->image) {
            $book->image = env('APP_URL') . '/images/' . basename($book->image);
        }

        return response()->json($book);
    }

    public function store(BookRequest $request)
    {
        $url = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->move(public_path('images'), $request->file('image')->getClientOriginalName());
            $url = 'images/' . $request->file('image')->getClientOriginalName();
        }

        $book = Book::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'image' => $url,
            'stok' => $request->stok,
            'category_id' => $request->category_id,
        ]);

        // Menambahkan APP_URL ke path image
        if ($book->image) {
            $book->image = env('APP_URL') . '/images/' . basename($book->image);
        }

        return response()->json($book, 201);
    }

    public function update(BookRequest $request, $id)
    {
        $book = Book::findOrFail($id);

        $url = $book->image;
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($book->image && file_exists(public_path($book->image))) {
                unlink(public_path($book->image));
            }

            $path = $request->file('image')->move(public_path('images'), $request->file('image')->getClientOriginalName());
            $url = 'images/' . $request->file('image')->getClientOriginalName();
        }

        $book->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'image' => $url,
            'stok' => $request->stok,
            'category_id' => $request->category_id,
        ]);

        // Menambahkan APP_URL ke path image
        if ($book->image) {
            $book->image = env('APP_URL') . '/images/' . basename($book->image);
        }

        return response()->json($book);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        if ($book->image && file_exists(public_path($book->image))) {
            unlink(public_path($book->image));
        }

        $book->delete();

        return response()->json(null, 204);
    }
}
