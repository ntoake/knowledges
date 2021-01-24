@extends('layouts.front')

@section('css')
@endsection

@section('js')

</script>
@endsection


@section('content')


    <div class="oneColumnContent">
                  
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
        
        <div class="btnEle btnEle--single">
            <a href="{{ route('front') }}">
                記事一覧に戻る
            </a>
        </div>
        
    </div>  
        


    
    

@endsection