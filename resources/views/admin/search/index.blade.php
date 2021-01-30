@extends('layouts.admin')

@section('content')

    {{--//ログイン後--}}
    @if (Auth::check())

    <div class="adminContents">

        @include('admin.commons.sidebar')
        
        <div class="adminContents__main">

            @if(count($shareposts) > 0)
            
                @include('layouts.countpost')
 
                @include('admin.commons.sharepost')
                
                {{-- ページネーションのリンク --}}
                {{ $shareposts->appends(request()->query())->links() }}          
                
            @else 
                <p>対象記事がありません。</p>
            @endif

        </div>
    </div>  

    @endif

@endsection