<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

    class BookController extends Controller
    {
    public function index(): View
    {
        $bookList = Book::all();

        return view('books.book', compact('bookList'));
    }

    public function create(): View
    {
        $categories = Category::all();

        return view('books.book-add', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|max:255',
            'author' => 'required|max:100',
            'publisher' => 'required|max:100',
            'image' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048', // Added validation for image
        ]);

        $newName = '';
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;
        $book = Book::create($request->all());
        $book->categories()->sync($request->categories);

        return redirect('books')->with('success-status', 'Book Added Successfully');
    }

    public function edit(string $slug): View
    {
        $book = Book::where('slug', $slug)->firstOrFail();
        $categories = Category::all();

        return view('books.book-edit', compact('categories', 'book'));
    }

    public function update(Request $request, string $slug): RedirectResponse
    {
        if ($request->hasFile('image')) 
        {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }


        $book = Book::where('slug', $slug)->firstOrFail();
        $book->update($request->all());

        if ($request->categories) {
            $book->categories()->sync($request->categories);
        }

        return redirect('books')->with('success-status', 'Book Updated Successfully');
    }

    public function delete($slug): RedirectResponse
    {
        $book = Book::where('slug', $slug)->firstOrFail();
        $book->delete();

        return redirect('books')->with('danger-status', 'Book Deleted Successfully');
    }

    public function trashedBooks(): View
    {
        $deletedBooks = Book::onlyTrashed()->get();

        return view('books.book-deleted-list', compact('deletedBooks'));
    }

    public function restoreBook(string $slug): RedirectResponse
    {
        $book = Book::withTrashed()->where('slug', $slug)->firstOrFail();
        $book->restore();

        return redirect('books')->with('success-status', 'Book Restored Successfully');
    }

    }