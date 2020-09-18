@extends('layouts.app')

@section('content')
    <div class="post">
        <div class="post_title">
           <h1>{{ $post->title }}</h1> 
        </div>
        @php
            $url = $post->youtube_code;
            $keys = parse_url($url); //パース処理
            $path = explode("/", $keys['path']); //分割処理
            $last = end($path); //最後の要素を取得
        @endphp
        
        <iframe width="600" height="330" src="https://www.youtube.com/embed/{{$last}} " frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br>
        <div class="post_content">
           {{ $post->content }} 
        </div>
        <div class="edit">
            <a href="{{ route('posts.edit', $post->id, ['post' => $post->id]) }}" class="btn-flat-border">Edit</a>
        </div>
    </div>
@endsection