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

        return view('favorite.index', [
            'posts' => $posts,
        ]);
    }
}
