@extends('layouts.admin')

@section('content')




    <div class="adminContents">

        @include('admin.commons.sidebar')
        
        <div class="adminContents__main">
            
            <h1 class="">アカウント内容</h1>
            
            <div class="">
                <ul class="">
                    <li class="">
                        <span>名前:</span>
                        {{ $user->name }}
                    </li>
                    <li class="">
                        <span>メールアドレス:</span>
                        {{ $user->email }}
                    </li>  
                    {{--<li class="">
                        <span>パスワード:</span>
                        {{ $user->password }}
                    </li>--}}
                </ul>
            </div>
          
            <div class="">
                <ul class="">
                    {{--<li class="">
                        <a href="{{ route('users.edit', ['user' => Auth::id()]) }}">
                            アカウントを編集
                        </a>
                    </li>--}}
                    <li class="">

                        
                        {{ Form::model($user, ['route' => ['users.destroy', $user->id], 'method' => 'delete']) }}
                        
                            <div class="btnEle btnEle--single">
                                {{ Form::submit('アカウント削除', ['class' => ''])  }}
                            </div>           
                            
                        {{ Form::close()  }}
                    </li>  
                </ul>
            </div>




        </div>
    </div>  
    







@endsection