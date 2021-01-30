@extends('layouts.front')

@section('content')



<div class="oneColumnContent">
    
    
    <div class="searchSection">

        <input id="searchSection__input" class="searchSection__input" type="checkbox">
        <label class="searchSection__label" for="searchSection__input">検索条件を指定する</label>       

        <div class="searchSection__detail">
            {{ Form::open(['route' => 'front', 'method' => 'get']) }}
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
    
        <ul class="sharepostList">     
            @foreach ($shareposts as $sharepost)

                <li class="sharepostList__item">
                    <a href="{{ route('front.show', ['sharepost' => $sharepost->id]) }}">
                        <time class="sharepostList__date" datetime="{{$sharepost->created_at}}">
                        {{$sharepost->created_at->format('Y年n月d日')}}</time>                      
                        <span class="sharepostList__author">著者：{{$sharepost->user->name}}</span>               
                        
                        <p class="sharepostList__ttl">{{$sharepost->title}}</p>
                
                        <ul class="sharepostTag">                           
                            @foreach ($sharepost->postHaveTag as $posttag)
                                <li class="sharepostTag__item">{{ $posttag->tag }}</li>
                            @endforeach
                        </ul>  
                        {{--{!! $sharepost->content !!}--}}  
                    </a>
                </li>

            @endforeach      
        </ul>            
        {{-- ページネーションのリンク --}}
        {{ $shareposts->appends(request()->query())->links() }}            
    @else 
        <p>現在記事がありません。</p>
    @endif
</div>

@endsection