@extends('layouts.front')

@section('content')


    @if (Auth::check())
    <div class="adminContents">

        @include('admin.commons.sidebar')
        
        <div class="adminContents__main">

            @if(count($tags) > 0)
            
                @include('layouts.countpost', ['shareposts' => $tags])
                
                <ul class="sharepostList">     
                    @foreach ($tags as $tag)
    
                        <li class="sharepostList__item">
                            <a href="{{ route('tags.show', ['tag' => $tag->id]) }}">
                                {{ $tag->tag }}
                            </a>
                        </li>
    
                    @endforeach      
                </ul>            
                {{-- ページネーションのリンク --}}
                {{ $tags->links() }}              
                
            @else 
                <p>現在タグがありません。</p>
            @endif
            
            <div class="btnEle btnEle--single">
                <a href="{{ route('tags.create') }}">
                    タグを作成する
                </a>
            </div>
            
        </div>
    </div>  
    @endif   
    
    
    


@endsection