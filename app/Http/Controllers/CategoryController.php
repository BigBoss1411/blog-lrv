<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Category::find($id);
        return view('client.category.show', compact('category'));
    }
}
