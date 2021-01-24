@extends('layouts.admin')

@section('content')


<div class="oneColumnContent">
    @include('admin.commons.error')

    {{ Form::open(['route' => 'login.post']) }}
        <div class="">
            {{ Form::label('email', 'メールアドレス') }}
            {{ Form::email('email', old('email'), ['class' => '']) }}
        </div>

        <div class="">
            {{ Form::label('password', 'パスワード') }}
            {{ Form::password('password', ['class' => '']) }}
        </div>

        <div class="btnEle btnEle--single">
            {{ Form::submit('ログイン', ['class' => '']) }}
        </div> 
        
    {{ Form::close() }}
</div>
    


@endsection