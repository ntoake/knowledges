            <div class="searchSection">
   
                <input id="searchSection__input" class="searchSection__input" type="checkbox">
                <label class="searchSection__label" for="searchSection__input">検索条件を指定する</label>       
 
                <div class="searchSection__detail">
                    {{ Form::open(['route' => 'front', 'method' => 'get']) }}
                        {{ Form::label('search_query', '検索テキスト') }}
                        {{ Form::text('search_query', old('search_query'), ['class' => '']) }}
                        <ul class="tagCheckList">
                            @foreach ($tags as $tag)
                                <li class="tagCheckList__item">
                                {{Form::checkbox('tagname[]', $tag->id, false, ['id'=>$tag->tag])}}
                                {{ Form::label($tag->tag, $tag->tag) }}
                                </li>
                            @endforeach
                        </ul>
                        <div class="btnEle">
                            {!! Form::submit('記事を検索する', ['class' => '']) !!}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>