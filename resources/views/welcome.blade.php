@extends('layouts.app')

@section('content')
  <p class="description">This is a site where you can post your favorite HIP-HOP music from any time period in Japan or abroad.</br></br>国内、国外、時代を問わず好きなHIP-HOPを投稿できるサイトです。</p>
    
    <div class="postslist">
      <h1>Posts List</h1>
    </div>
    
    
    
    @foreach ($posts as $post)
      @php
        $url = $post->youtube_code;
        $keys = parse_url($url); //パース処理
        $path = explode("/", $keys['path']); //分割処理
        $last = end($path); //最後の要素を取得
      @endphp
      <div class="post">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$last}} " frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->user_id }}</p>
        <a href="{{ route('posts.show', $post->id, ['post' => $post->id]) }}" class="btn-flat-border">Read more</a>
      </div>
    @endforeach
    
@endsection