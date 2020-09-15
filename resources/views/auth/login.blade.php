@extends('layouts.app')

@section('content')
    <div class="postslist">
        <h1>
          Login
        </h1>
    </div>
    
    <div class="col-sm-6 offset-sm-3">
        {!! Form::open(['route' => 'login.post']) !!}
            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
            
            <div class="submit">
                {!! Form::submit('Log in', ['class' => 'btn']) !!}
            </div>
        {!! Form::close() !!}
        
        {{-- Sign upのページへ --}}
        <div class="new">
            <p>New user? {!! link_to_route('signup.get', 'Sign up now!') !!}</p>
        </div>
    </div>
@endsection