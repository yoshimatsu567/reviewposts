<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = User::find($user->id);
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        $posts = $user->posts()->withCount('favorites_users')->orderBy('created_at', 'desc')->get();
        
        foreach($posts as $post){
            $url = $post->youtube_code;
            $path_list = explode("=", $url); //分割処理
            
            if(count($path_list) > 1 ){
                $last = mb_substr($path_list[1], 0, 11);
            }
            else{
                $path = explode("/", $url); //分割処理
                $last = end($path); //最後の要素を取得
            }
            $post->last = $last;
        }

        return view('users.show', [
            'user' => $user,
            'posts' => $posts,
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function favorites($id)
    {
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        $posts = $user->favorites()->withCount('favorites_users')->orderBy('created_at', 'desc')->get();
        
        foreach($posts as $post){
            $url = $post->youtube_code;
            $path_list = explode("=", $url); //分割処理
            
            if(count($path_list) > 1 ){
                $last = mb_substr($path_list[1], 0, 11);
            }
            else{
                $path = explode("/", $url); //分割処理
                $last = end($path); //最後の要素を取得
            }
            $post->last = $last;
        }

        return view('users.favorites',[
           'user' => $user,
           'posts' => $posts,
           'id' => $id,
        ]);
    }
}
