@extends('layouts.app')

@section('content')
    <div class="postslist">
      <h1>Top Charts</h1>
    </div>

@foreach ($posts as $post)
  @php
    $url = $post->youtube_code;
    $path = explode("/", $url); //分割処理
    $last = end($path); //最後の要素を取得
  @endphp
  
  <div class="post">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$last}} " frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <h3>{{ $post->title }}</h3>
    <a class="posted-by" href = "{{ route('users.show', $post->user_id, ['id' => $post->id]) }}">Poster's Details</a><br>
  @include('user_favorite.favorite_button')
  <div>
    {{ $post->favorites_users_count }}
  </div>
    <a href="{{ route('posts.show', $post->id, ['post' => $post->id]) }}" class="btn-flat-border">Read more</a>
    
  </div>
@endforeach

@endsection