@if(Auth::check())
    @if(Auth::user()->is_favorite($post->id))
        {!! Form::open(['route' => ['favorite.unfavorite', $post->id], 'method' => 'delete']) !!}
            <div class="dislike">{!! Form::submit('Like', ['class' => "btn btn-danger btn-sm"]) !!}</div>
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['favorite.favorite', $post->id]]) !!}
            <div class="like">{!! Form::submit('Like', ['class' => "btn btn-success btn-sm"]) !!}</div>
        {!! Form::close() !!}
    @endif
@endif