<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use App\Models\Category;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Posts::all();
        return view("posts.index", compact("posts"));
    }

    public function show(Posts $post) {
        return view("posts.show", compact("post"));
    }

    public function create(Posts $posts) {
        return view('posts.create', ['categories' => Category::all()]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "content" => ["required", "min:3" ,"max:255"],
            "category_id" => ["required"],
        ]);
        Posts::create([
            "content" => $validated["content"],
            "category_id" => $validated["category_id"]
        ]);
        return redirect("/posts");
    }

    public function edit(Posts $post) {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    public function update(Request $request, Posts $post){
        $validated = $request->validate([
            "content" => ["required", "min:3", "max:255"],
            "category_id" => ["required"], 
        ]);
        
        $post->update($validated);

        return redirect("/posts");
    }

    public function destroy(Posts $post) {
        $post->delete();
        return redirect("/posts");
    }
}
