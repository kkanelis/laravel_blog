<?php

namespace App\Http\Controllers;
use App\Models\Comments;

use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function store(Request $request, Comments $comment) {
        $validated = $request->validate([
            "author" => ["required", "min:3", "max:20"],
            "comment" => ["required", "min:3", "max:100"],
        ]);
    
        Comments::create([
            "posts_id" => $request->posts_id,
            "comment" => $validated["comment"],
            "author" => $validated["author"],
        ]);
    
        return redirect("/posts/$request->posts_id");
    }

    public function destroy(Comments $comment) {
        $comment->delete();
        return redirect("/posts/$comment->posts_id");
    }

    public function edit(Comments $comment) {
        return view("comments.edit", compact("comment"));
    }

    public function update(Request $request, Comments $comment) {
        $validated = $request->validate([
            "author" => ["required", "min:3", "max:20"],
            "comment" => ["required", "min:3", "max:100"],
        ]);

        $comment->update($validated);

        return redirect("/posts/$comment->posts_id");
    }
}
