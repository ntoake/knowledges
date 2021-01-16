@extends('layouts.app')

@section('content')

    {{ Form::open(['route' => 'signup.post']) }}
        <div class="">
            {{ Form::label('name', '名前') }}
            {{ Form::text('name', old('name'), ['class' => '']) }}
        </div>

        <div class="">
            {{ Form::label('email', 'メールアドレス') }}
            {{ Form::email('email', old('email'), ['class' => '']) }}
        </div>

        <div class="">
            {{ Form::label('password', 'パスワード') }}
            {{ Form::password('password', ['class' => '']) }}
        </div>

        <div class="">
            {{ Form::label('password_confirmation', 'パスワード確認') }}
            {{ Form::password('password_confirmation', ['class' => '']) }}
        </div>

        {{ Form::submit('新規登録する', ['class' => '']) }}
    {{ Form::close() }}


@endsection