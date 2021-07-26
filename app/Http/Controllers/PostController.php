<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request) {
        $request = $request->input('keyword');
        return view('posts.index');
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $title = $request->input('title');
        $content = $request->input('content');
    }


}
