@extends('layouts.admin')

@section('css')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="/js/summernote.js"></script>
@endsection

@section('content')
    
    @if (Auth::check())
    <div class="adminContents">

        @include('admin.commons.sidebar')
        
        <div class="adminContents__main">



            @include('admin.commons.error')
            
    
      
                {{ Form::model($sharepost, ['route' => 'shareposts.store']) }}
                
                <div>
                    <div class="">
                        {{ Form::label('title', 'タイトル') }}
                        {{ Form::text('title', old('title'), ['class' => '']) }}
                    </div>
                    <div class="">
                        
                        {{ Form::label('content', 'コンテンツ') }}
                        {{ Form::textarea('content', old('content'), ['class' => 'js-summernote']) }}       
                    </div> 
                    
                    <ul class="tagCheckList">
                        @foreach ($tags as $tag)
                            <li class="tagCheckList__item">
                            {{Form::checkbox('tagname[]', $tag->id, false, ['id'=>$tag->tag])}}
                            {{ Form::label($tag->tag, $tag->tag) }}
                            </li>
                        @endforeach
                    </ul>
                    
                    <dl>
                        <dt>画像の削除について</dt>
                        <dd>
                            <ul>
                                <li>削除する際は、画像を選択肢、ゴミ箱ボタンを押して削除してください。<li>
                                <li>記事更新に関係なく実行されます。<li>
                            </ul>      
                        </dd>
                    </dl>

                </div>   

                <div class="btnEle btnEle--single">
                    {{ Form::submit('記事を投稿する', ['class' => '']) }}
                </div>                
                
                {{ Form::close() }}
        







        </div>
    </div>  
    @endif  
    
    
    


    
    

@endsection