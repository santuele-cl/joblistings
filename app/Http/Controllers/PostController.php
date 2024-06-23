<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(["user"])->latest()->paginate(10);

        return view("posts.index", ["posts" => $posts]);
    }
    public function show(Post $post)
    {
        return view("posts.show", ["post" => $post]);
    }
    public function create()
    {
        return view("posts.create");
    }

    public function edit(Post $post)
    {
        return view("posts.edit", ["post" => $post]);
    }



    public function store()
    {
        request()->validate(["body" => ["required", "min:10"]]);

        Post::create([
            "body" => request("body"),
            "user_id" => 1
        ]);

        return redirect("/posts");
    }
    public function update(Post $post)
    {
        request()->validate(["body" => ["required", "min:10"]]);

        if ($post->body === request("body")) {
            throw ValidationException::withMessages(["body" => "No changes made"]);
        }

        $post->updateOrFail([
            "body" => request("body"),
        ]);


        return redirect("/posts/{$post->id}");
    }
    public function destroy(Post $post)
    {
        $post->deleteOrFail();


        return redirect("/posts");
    }
}
