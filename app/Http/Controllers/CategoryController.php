<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('Pages.Dashboard.categories', ['page' => 'Dashboard - Categories']);
    }
    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return back()->with('success', 'Category created successfully.');
    }

    public function show(string $id)
    {
        return Category::find($id) ?? '404';
    }

    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return back()->with('success', 'Category updated successfully.');
    }

    public function destroy(string $id)
    {
        Category::find($id)->delete();
        return back()->with('success', 'Category deleted successfully.');
    }
}
