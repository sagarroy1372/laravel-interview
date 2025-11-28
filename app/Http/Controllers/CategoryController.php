<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $allCategories = Category::all();
        return view('admin.categories.create', compact('allCategories'));
    }

    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        $allCategories = Category::where('id', '<>', $category->id)->get();
        return view('admin.categories.edit', compact('category', 'allCategories'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
