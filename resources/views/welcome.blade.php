@extends('layouts.app')

@section('content')
  <p class="description">This is a site where you can post your favorite HIP-HOP music from any time period in Japan or abroad.</br></br>国内、国外、時代を問わず好きなHIP-HOPを投稿できるサイトです。</p>
    
    <div class="postslist">
      <h1>Posts List</h1>
    </div>
    
    
    <div class="post">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/VC4ORS5n9Hg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <h3>Nas - Nas is like -</h3>
      <p>user_name</p>
      <a href="#" class="btn-flat-border">Read more</a>
    </div>
    
    <div class="post">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/17VWstpmGHc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <h3>TKR - AM24 -</h3>
      <p>user_name</p>
      <a href="#" class="btn-flat-border">Read more</a>
    </div>
    
    <div class="post">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/9GvB9ySUJ3A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <h3>Cam'Ron ft. Juelz Santana - Oh Boy -<span style="margin-right:5px;"></span><i class="fas fa-thumbs-up"></i></h3>
      <p>user_name</p>
      <a href="#" class="btn-flat-border">Read more</a>
    </div>
@endsection