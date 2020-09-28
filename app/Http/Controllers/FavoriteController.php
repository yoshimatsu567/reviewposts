<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;

class FavoriteController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->favorite($id);
        return back();
    }
    
    public function destroy($id)
    {
        \Auth::user()->unfavorite($id);
        return back();
    }
    
    public function index()
    {
        $posts = Post::withCount('favorites_users')->orderBy('favorites_users_count', 'desc')->get();
        
        foreach($posts as $post){
            $post_count = count($post->favorites_users()->get());
            $post->post_count = $post_count;
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

        return view('favorite.index', [
            'posts' => $posts,
        ]);
    }
}
