@extends('layouts.app')

@section('content')

    {{ Form::open(['route' => 'login.post']) }}
        <div class="">
            {{ Form::label('email', 'メールアドレス') }}
            {{ Form::email('email', old('email'), ['class' => '']) }}
        </div>

        <div class="">
            {{ Form::label('password', 'パスワード') }}
            {{ Form::password('password', ['class' => '']) }}
        </div>

        {{ Form::submit('Log in', ['class' => '']) }}
    {{ Form::close() }}


@endsection