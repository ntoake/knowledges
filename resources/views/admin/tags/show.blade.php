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
                <h2 class="sharepostUnit__ttl">
                    {{$tag->tag}}
                </h2>
            </div>

            <div class="btnEle">
                <a href="{{ route('tags.edit', ['tag' => $tag->id]) }}">
                    タグを編集する
                </a>
                {!! Form::model($tag, ['route' => ['tags.destroy', $tag->id], 'method' => 'delete']) !!}
                    {!! Form::submit('タグを削除する', ['class' => '']) !!}
                {!! Form::close() !!}
            </div>

            <div class="btnEle btnEle--single">
                <a href="{{ route('tags.index') }}">
                    タグ一覧に戻る
                </a>
            </div>
        </div>
    </div>  
    
    @endif

@endsection