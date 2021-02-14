            <div class="searchConditions">
                <dl>
                    <dt class="searchConditions__ttl">検索条件</dt>
                    <dd>
                        @if ($searchTxt != '' && empty($searchTags))
                            <p>検索テキスト：{{ $searchTxt }}</p>
                            
                        @elseif ($searchTxt == null && empty($searchTags) == false)
                            <div class="searchConditions__tagWrap">
                                <p class="searchConditions__tag">検索タグ：</p>
                                <ul class="searchConditionsList">
                                    @foreach($searchTags as $searchTag)
                                        <li class="searchConditionsList__item"> {{ $searchTag }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @elseif ($searchTxt != '' && empty($searchTags) == false)                     
                            <p>検索テキスト：{{ $searchTxt }}</p>
                            
                            <div class="searchConditions__tagWrap">
                                <p class="searchConditions__tag">検索タグ：</p>
                                <ul class="searchConditionsList">
                                    @foreach($searchTags as $searchTag)
                                        <li class="searchConditionsList__item"> {{ $searchTag }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <p>検索指定はありません</p>
                        @endif
                    </dd>
                </dl>
            </div>
