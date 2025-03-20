<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $categories) {
        $categories = Category::all();
        return view("categories.index", compact("categories"));
    }

    public function create() {
        return view("categories.create");
    }

    public function store(Request $request, Category $category) {
        $validated = $request->validate([
            "category_name" => ["required", "min:3", "max:20"],
        ]);
        Category::create([
            "category_name" => $validated["category_name"],
        ]);

        return redirect("/categories");
    }

    public function show(Category $category) {
        return view("categories.show", compact("category"));
    }

    public function edit(Category $category) {
        return view("categories.edit", compact("category"));
    }

    public function update(Request $request, Category $category) {
        $validated = $request->validate([
            "category_name" => ["required", "min:3", "max:20"],
        ]);

        $category->update($validated);

        return redirect("/categories/$category->id");
    }

    public function destroy(Category $category){ 
        $category->delete();
        return redirect("/categories");
    }
}
