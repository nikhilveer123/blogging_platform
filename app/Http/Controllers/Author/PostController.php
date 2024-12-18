<?php

namespace App\Http\Controllers\Author;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::where('user_id', auth()->id())->get();
        return view('author.posts.index', compact('posts'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('author.posts.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
            'status' => 'draft',
        ]);

        return redirect()->route('author.posts.index')->with('success', 'Post created successfully');
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('author.posts.edit', compact('post', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('author.posts.index')->with('success', 'Post updated successfully');
    }

    // Remove the specified post from the database
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('author.posts.index')->with('success', 'Post deleted successfully');
    }
}
