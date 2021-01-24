@extends('layouts.admin')

@section('css')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
$(function(){
    $('.js-summernote').summernote({
        tabsize: 2,
        height: 300,
    });
});
</script>
@endsection


@section('content')


    <div class="adminContents">

        @include('admin.commons.sidebar')
        
        <div class="adminContents__main">



            @include('admin.commons.error')
            
            @if (Auth::check())    
      
                {{ Form::model($tag, ['route' => 'tags.store']) }}
                
                <div>
                    <div class="">
                        {{ Form::label('tag', 'タグ名') }}
                        {{ Form::text('tag', old('tag'), ['class' => '']) }}
                    </div>
  
                </div>   

                <div class="btnEle btnEle--single">
                    {{ Form::submit('タグを作成する', ['class' => '']) }}
                </div>                
                
                {{ Form::close() }}
        
            @endif






        </div>
    </div>  
    
    
    
    


    
    

@endsection