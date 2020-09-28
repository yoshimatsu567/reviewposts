@if(Auth::check())
    @if(Auth::user()->is_favorite($post->id))
        {!! Form::open(['route' => ['favorite.unfavorite', $post->id], 'method' => 'delete']) !!}
            {!! Form::button('<i class="fas fa-thumbs-up fa-lg"></i>', ['class' => "dislike", 'type' => "submit"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['favorite.favorite', $post->id]]) !!}
            {!! Form::button('<i class="far fa-thumbs-up fa-lg"></i>', ['class' => "like", 'type' => "submit"]) !!}
        {!! Form::close() !!}
    @endif
@else
    <button class="like" onclick="location.href='{{route('login')}}'"><i class="far fa-thumbs-up fa-lg"></i></button>
@endif