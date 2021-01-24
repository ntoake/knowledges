@extends('layouts.admin')

@section('content')




    <div class="adminContents">

        @include('admin.commons.sidebar')
        
        <div class="adminContents__main">
            
            <h1 class="">アカウント内容</h1>
            
            @include('admin.commons.error')
            
            <div class="">
                <ul class="">
                    {{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) }}
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
                
                        {{ Form::submit('更新する', ['class' => '']) }}
                    {{ Form::close() }}
                </ul>
                
    
            </div>
          

            
        </div>
    </div>  
    







@endsection