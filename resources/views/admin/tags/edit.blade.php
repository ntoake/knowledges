@extends('layouts.admin')

@section('css')
@endsection

@section('js')
@endsection

@section('content')

    @if (Auth::check())
    <div class="adminContents">

        @include('admin.commons.sidebar')
        
        <div class="adminContents__main">



            @include('admin.commons.error')
            
   
      
                {{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'put']) }}
                
                <div>
                    <div class="">
                        {{ Form::label('tag', 'タグ名') }}
                        {{ Form::text('tag', old('tag'), ['class' => '']) }}
                    </div>
      
                </div>   

                <div class="btnEle btnEle--single">
                    {{ Form::submit('タグを更新する', ['class' => '']) }}
                </div>
                
                {{ Form::close() }}
        

            

            <div class="btnEle btnEle--single">
                <a href="{{ route('shareposts.index') }}">
                    記事一覧に戻る
                </a>
            </div>
        </div>
    </div>  
    
    @endif
    
    
    


    
    

@endsection