@extends('layouts.admin')

@section('content')

    {{--//ログイン後--}}
    @if (Auth::check())

    <div class="adminContents">

        @include('admin.commons.sidebar')
        
        <div class="adminContents__main">
            
            
            
            <div class="searchSection">
   
                <input id="searchSection__input" class="searchSection__input" type="checkbox">
                <label class="searchSection__label" for="searchSection__input">検索条件を指定する</label>       
 
                <div class="searchSection__detail">
                    {{ Form::open(['route' => 'admin', 'method' => 'get']) }}
                        {{ Form::label('search_query', '検索テキスト') }}
                        {{ Form::text('search_query', old('search_query'), ['class' => '']) }}
                        <ul class="tagCheckList">
                            @foreach ($tags as $tag)
                                <li class="tagCheckList__item">
                                {{Form::checkbox('tagname[]', $tag->id, false, ['id'=>$tag->tag])}}
                                {{ Form::label($tag->tag, $tag->tag) }}
                                </li>
                            @endforeach
                        </ul>
                        <div class="btnEle">
                            {!! Form::submit('記事を検索する', ['class' => '']) !!}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
            

            @if(count($shareposts) > 0)

                @include('layouts.countpost')
 
                @include('admin.commons.sharepost')
                
                {{-- ページネーションのリンク --}}
                {{ $shareposts->appends(request()->query())->links() }}                  
                
            @else 
                <p>現在記事がありません。</p>
            @endif
        </div>
    </div>  
    
    

    {{--//ログイン前--}}
    @else
    
    <div class="oneColumnContent">   
        <div class="btnEle">
            <a href="{{ route('signup.get') }}">
                新規登録
            </a>
            <a href="{{ route('login') }}">
                ログイン
            </a>      
        </div>
    </div>
    
    @endif

@endsection