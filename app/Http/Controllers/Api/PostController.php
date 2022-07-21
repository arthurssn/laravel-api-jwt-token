<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return $posts;
    }

    public function show(int $id)
    {
        $post = Post::findOrFail($id)
            ->with('user:id,name')
            ->get();
        return $post;
    }

    public function store(Request $request)
    {
        $newPost = [
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => auth('api')->user()->id
        ];
        return Post::create($newPost);
    }

    public function update(int $id, Request $request)
    {
        $post = Post::findOrFail($id);
        $newPost = [
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ];
        return $post->update($newPost);
    }

    public function destroy(int $id)
    {
        $post = Post::findOrFail($id);
        return $post->delete();
    }
}