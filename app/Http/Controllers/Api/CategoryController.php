<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name')
            ->get();

        return $categories;
    }

    public function show(int $id)
    {
        $category = Category::select('id', 'name')
            ->with('posts:id,title,category_id')
            ->where('id', $id)
            ->get();

        return $category;
    }

    public function store(Request $request)
    {
        $newCategory = [
            'name' => $request->name,
            'user_id' => auth('api')->user()->id
        ];
        return Category::create($newCategory);
    }

    public function update(int $id, Request $request)
    {
        $category = Category::findOrFail($id);
        $newCategory = [
            'name' => $request->name,
        ];
        return $category->update($newCategory);
    }

    public function destroy(int $id)
    {
        $category = Category::findOrFail($id);

        return $category->delete();
    }
}