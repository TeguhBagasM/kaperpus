<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index() 
    {
        $categories = Category::all();
        return view('category', ['categoriesList' => $categories]);
    }
    public function create() 
    {
        return view('category-add');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100'
        ]);
        $category = Category::create($request->all());
        // if ($category) {
        //     Session::flash('success-status', 'success');
        //     Session::flash('success-message', 'Category Added Successfully');
        // }
        return redirect('categories')->with('success-status', 'Category Added Successfully');
    }
    
    public function edit($slug) {
        $category = Category::where('slug', $slug)->first();
        return view('category-edit', ['categoryUpdate' => $category]);
        
    }

    public function update(Request $request, $slug) 
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100'
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('success-status', 'Category Updated Successfully');
    }
    
    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('categories')->with('danger-status', 'Category Deleted Successfully');

    }

    public function trashedCategories() 
    {
        $deletedCategories = Category::onlyTrashed()->get();
        return view('category-deleted-list', ['deletedList' => $deletedCategories]);
    }

    public function restore($slug)
    {
        $restore = Category::withTrashed()->where('slug', $slug)->first();
        $restore->restore();
        return redirect('categories')->with('success-status', 'Category Restored Successfully');
    }
}
