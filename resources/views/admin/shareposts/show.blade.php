@extends('layouts.admin')

@section('css')
@endsection

@section('js')

</script>
@endsection


@section('content')

    @if (Auth::check())
    <div class="adminContents">

        @include('admin.commons.sidebar')
        
        <div class="adminContents__main">


            <div class="sharepostUnit">
                
                <div class="sharepostUnit__status">

                    <time class="sharepostUnit__date" datetime="{{$sharepost->created_at}}">
                    {{$sharepost->created_at->format('Y年n月d日')}}
                    </time>                      
                    <span class="sharepostUnit__author">
                        著者：{{$sharepost->user->name}}
                    </span>    
                </div>  
 
                <ul class="sharepostUnitTag">                       
                    @foreach ($sharepost->postHaveTag as $posttag)
                        <li class="sharepostUnitTag__item">{{ $posttag->tag }}</li>
                    @endforeach
                </ul> 
 
                <h2 class="sharepostUnit__ttl">
                    {{$sharepost->title}}
                </h2>
                <div class="sharepostUnit__content">
                    {!! $sharepost->content !!}  
                </div>

            </div>
            

            <div class="btnEle">
                <a href="{{ route('shareposts.edit', ['sharepost' => $sharepost->id]) }}">
                    記事を編集する
                </a>

                
                {!! Form::model($sharepost, ['route' => ['shareposts.destroy', $sharepost->id], 'method' => 'delete']) !!}
                    {!! Form::submit('記事を削除する', ['class' => '']) !!}
                {!! Form::close() !!}
            </div>
            
            
            <div class="btnEle btnEle--single">
                <a href="{{ route('shareposts.index') }}">
                    記事一覧に戻る
                </a>
            </div>
        </div>
    </div>  
    
    @endif
    
    
    


    
    

@endsection