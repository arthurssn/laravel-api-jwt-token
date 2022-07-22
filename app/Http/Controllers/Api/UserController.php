<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name', 'email')
            ->withCount('posts')
            ->get();

        return $users;
    }

    public function show(int $id)
    {
        $user = User::select('id', 'name', 'email')
            ->with('posts:id,title,category_id,user_id')
            ->where('id', $id)
            ->get();

        return $user;
    }
}