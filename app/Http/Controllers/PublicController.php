<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class PublicController extends Controller
{
    public function index(Request $request): View
    {
        $categories = Category::all();
    
        $query = Book::query();  // Start with a clean query builder
    
        if ($request->has('category') && $request->filled('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request->category);
            });
        }
    
        if ($request->has('title') && $request->filled('title')) {
            $query->orWhere('title', 'like', '%' . $request->title . '%');
        }
    
        $bookList = $query->get();
    
        return view('book-list', compact('bookList', 'categories'));
    }
    
}
