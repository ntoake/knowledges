@extends('layouts.admin')

@section('content')
    
    {{--//ログイン後--}}
    @if (Auth::check())

    <div class="adminContents">

        @include('admin.commons.sidebar')
        
        <div class="adminContents__main">
            
            
            @include('layouts.search_section', ['routeName' => 'admin'])

            @include('layouts.search_conditions')

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