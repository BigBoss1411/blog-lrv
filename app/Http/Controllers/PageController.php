<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function homepage()
    {
        $categories = Category::all();
        $posts = Post::orderBy('id', 'desc')->limit(10)->get();

        return view('client.home', compact('posts', 'categories'));
    }
}
