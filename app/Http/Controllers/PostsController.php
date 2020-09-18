<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts = Post::orderBy('created_at', 'desc')->get();
        // $posts = \DB::table('posts')->get();
        // $posts = App\Post::get();
        
        
        
        return view('welcome', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $post = new Post;
        
        return view ('posts.create', [
            'post' =>$post,
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'youtube_code' => 'required|active_url|min:28|max:28',
            'title' => 'required|max:100',
            'content' => 'required|max:255',
        ]);
        
        $post = new Post;
        $post->user_id = auth()->id();
        $post->youtube_code = $request->youtube_code;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        $name = \App\User::select('name')->get();
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        
            return view('posts.show',[
                'post' => $post,    
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if(\Auth::id() === $post->user_id) {
            return view('posts.edit', [
            'post' => $post,
        ]);
        }else {
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        
        $request->validate([
            'youtube_code' => 'required|active_url|min:28|max:28',
            'title' => 'required|max:100',
            'content' => 'required|max:255',
        ]);
        
        if(\Auth::id() === $post->user_id) {
            $post->update();
            $post->youtube_code = $request->youtube_code;
            $post->title = $request->title;
            $post->content = $request->content;
            $post->save();
        }else {
            return view('/');
        }
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if(\Auth::id() === $post->user_id) {
            $post->delete();
            return redirect('/');
        }
        else {
            return redirect('/');
        }
    }
}
