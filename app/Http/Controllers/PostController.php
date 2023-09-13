<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all(['id','title', 'content', 'signature']);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'signature' => ['required' ,'string']
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->signature = $request->signature;
        $post->save();

        return redirect()->route('pindex')->with('status', 'This post has been created succefully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);        

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return  view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([ 
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'signature' => ['required', 'string']
        ]);

        $post = Post::find($request->id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->signature = $request->signature;
        $post->update();
        return redirect()->route('pshow',$post->id)->with('status', 'student has been updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
        public function  destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('pindex')->with('status', 'student has been deleted succesfully');

    }

}
