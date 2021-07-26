<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Gate;

class PostController extends Controller
{

    public function index(Request $request)
    {
        if (Gate::denies('posts.manage')) {
            abort(403);
        }
        $keyword = $request->input('keyword');
        $query = Post::query();
        if ($keyword) {
            $query->where('title', 'like', "%{$keyword}%");
        }
        $query->orderBy('id', 'desc');
        $posts = $query->paginate(2);


        // $posts = Post::paginate(2);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $tagIds = $request->input('tags', []);
        $title = $request->input('title');
        $content = $request->input('content');
        $status = $request->input('status');
        $categoryId = $request->input('category_id');
        $post = new Post;
        $post->title = $title;
        $post->content = $content;
        $post->status = $status;
        $post->category_id = $categoryId;
        $post->save();
        $post->tags()->attach($tagIds, ['created_at' => date('Y-m-d H:i:s')]);
        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update($id, Request $request)
    {
        $tagIds = $request->input('tags', []);
        $title = $request->input('title');
        $content = $request->input('content');
        $status = $request->input('status');
        $categoryId = $request->input('category_id');

        $post = Post::find($id);
        $post->title = $title;
        $post->content = $content;
        $post->status = $status;
        $post->category_id = $categoryId;
        $post->save();
        $post->tags()->sync($tagIds);
        return redirect()->route('posts.edit', $post->id);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('client.posts.show', compact('post'));
    }

    public function updateStatus($id, Request $request)
    {
        $post = Post::find($id);
        $status = $request->input('status', 1);
        $post->status = $status;
        $post->save();
        return response()->json([
            'status' => $status
        ]);
    }
}

