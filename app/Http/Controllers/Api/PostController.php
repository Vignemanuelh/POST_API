<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $posts = Post::all('id', 'title', 'content', 'signature');
            return response()->json($posts);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => ['required', 'string'],
                'content' => ['required', 'string'],
                'signature' => ['required', 'string']
            ]);
            $post = new Post();
            $post->title = $request->title;
            $post->content = $request->content;
            $post->signature = $request->signature;
            $post->user_id = auth()->user()->id;
            $post->save();

            return  response()->json([
                'status' => 'This post has been created succefully'
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        try {
            return response()->json([
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'signature' => $post->signature
            ]);
        } catch (Exception $e) {
            response()->json($e);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        try {
            $request->validate([
                'title' => ['required', 'string'],
                'content' => ['required', 'string'],
                'signature' => ['required', 'string']
            ]);
            $post->title = $request->title;
            $post->content = $request->content;
            $post->signature = $request->signature;
            if ($post->user_id === auth()->user()->id) {
                $post->save();
            }else {
                return response()->json([
                    'status' => 'This user  has not updated this post'
                ]);
            }
            return response()->json([
                'status' => 'The post has been updated succesfully'
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        try {
            if ($post->user_id === auth()->user()->id) {
                $post->delete();
            }else {
                return response()->json([
                    'status' => 'This user  has not updated this post'
                ]);
            }
           
            return response()->json([
                'status' => 'the post has been deleted successfully'
            ]);
        } catch (Exception  $e) {
            return response()->json($e);
        }
    }
}
