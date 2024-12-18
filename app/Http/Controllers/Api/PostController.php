<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller

{



    public function addPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:draft,published',
        ]);




        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }


        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
            'status' => $request->status,
        ]);

        dd($post);

        return response()->json([
            'status' => 200,
            'message' => 'Post created successfully.',
            'post' => $post
        ]);
    }



    public function getPublishedPosts(Request $request)
    {

        $posts = Post::where('status', 'published')->with('category', 'user')->get();

        return response()->json([
            'status' => 200,
            'message' => 'Published posts fetched successfully.',
            'posts' => $posts
        ]);
    }

    public function getPublishedPostsByCategory(Request $request)
    {

        $query = Post::where('status', 'published');


        if ($request->has('category')) {
            $category = $request->category;
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('name', $category);
            });
        }

        $posts = $query->with('category', 'user')->get();

        return response()->json([
            'status' => 200,
            'message' => 'Published posts fetched successfully.',
            'posts' => $posts
        ]);
    }
}
