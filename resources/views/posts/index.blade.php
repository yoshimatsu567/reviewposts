@extends('layouts.app')

@section('content')
  <p class="description">This is a site where you can post your favorite HIP-HOP music from any time period in Japan or abroad.</br></br>国内、国外、時代を問わず好きなHIP-HOPを投稿できるサイトです。</p>
    
    <div class="postslist">
      <h1>Posts List</h1>
    </div>
    
    @foreach ($posts as $post)
      <div class="post">
        {{ $post->youtube_code }}
        <h3>{{ $post->title }}</h3>
        <p>user_name</p>
      </div>
    @endforeach
    
    
    <div class="post">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/VC4ORS5n9Hg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <h3>Nas - Nas is like -</h3>
      <p>user_name</p>
      <a href="#" class="btn-flat-border">Read more</a>
    </div>
    
@endsection