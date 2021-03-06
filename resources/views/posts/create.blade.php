@extends('layouts.app')

@section('content')
    <div class="postslist">
        <h1>
          Post Page
        </h1>
    </div>
    
    <div class="col-sm-6 offset-sm-3">
        {!! Form::open(['route' => 'posts.store']) !!}
            <div class="form-group">
                {!! Form::label('youtube_code', 'YouTube URL  (e.g."https://youtu.be/9GvB9ySUJ3A")') !!}
                {!! Form::text('youtube_code', null, ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('title', 'Artist & Title') !!}
                {!! Form::text('title',null, ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('content', 'Review') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            </div>
            
            <div class="submit">
                {!! Form::submit('Post', ['class' => 'btn']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection