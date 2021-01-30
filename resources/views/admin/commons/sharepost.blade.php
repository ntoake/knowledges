<ul class="sharepostList">     
    @foreach ($shareposts as $sharepost)

        <li class="sharepostList__item">
            <a href="{{ route('shareposts.show', ['sharepost' => $sharepost->id]) }}">
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