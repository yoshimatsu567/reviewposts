@extends('layouts.app')

@section('content')
  <p class="description">This is a Web site where you can post your favorite HIP-HOP music from any time period in Japan or abroad.</br></br>国内、国外、時代を問わず好きなHIP-HOPを投稿できるサイトです。</p>
    
    <div class="postslist">
      <h1>Posts List</h1>
    </div>
@include('posts.posts')

@endsection