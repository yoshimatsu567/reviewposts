@foreach ($posts as $post)
 
  <div class="post">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$post->last}} " frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <h3>{{ $post->title }}</h3>
    <a class="posted-by" href = "{{ route('users.show', $post->user_id, ['id' => $post->id]) }}">Poster's Details</a><br>
    <ul class="good_button">
      <li>
        @include('user_favorite.favorite_button')
      </li>
      <li>
        {{ $post->post_count }}
      </li>
    </ul>
    <a href="{{ route('posts.show', $post->id, ['post' => $post->id]) }}" class="btn-flat-border">Read more</a>
  </div>
@endforeach