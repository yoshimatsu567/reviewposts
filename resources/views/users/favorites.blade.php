@extends('layouts.app')

@section('content')
    <div class="users">
      <h1>{{ $user->name }}'s Page</h1>
    </div>
    <ul>
    	<li class="users-posts"><a href="{{ secure_url('users/', ['id' => $user->id ]) }}">Posts</a></li>
    	<li><a href="{{ route('users.favorites',['id' => $user->id]) }}">Liked Posts</a></li>
    </ul>

@if(count($posts) > 0)
    @foreach ($posts as $post)
      
      <div class="post">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$post->last}} " frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <h3>{{ $post->title }}</h3>
        <a class="posted-by" href = "{{ route('users.show', $post->user_id, ['id' => $post->id]) }}">Poster's Details</a><br>
      @include('user_favorite.favorite_button')
      <div>
        {{ $post->favorites_users_count }}
      </div>
        <a href="{{ route('posts.show', $post->id, ['post' => $post->id]) }}" class="btn-flat-border">Read more</a>
        
      </div>
    @endforeach
@else
    <div class="message">
        <h3>This person hasn't added post to "Liked Posts".</h3>
    </div>
@endif
@endsection