            <div class="currentPages">   
                <p>現在のページ数: {{ $shareposts->currentPage() }}</p>
                <p>総件数: {{ $shareposts -> total() }}件</p>
                
                @if($shareposts->perPage() > $shareposts->total())
                    {{--1ページに表示する件数が合計件数より多い時--}}
                    <p>1〜{{ $shareposts -> total() }}件目を表示しています。</p>
                @else
                    @if($shareposts->currentPage() == $shareposts->lastPage())
                        {{--最終ページなら--}}
                        <p>{{ ($shareposts->lastPage() - 1) * $shareposts->perPage() + 1}}〜{{ $shareposts -> total() }}
                            件目を表示しています。</p>
                    @else
                        <p>{{($shareposts->currentPage() - 1) * $shareposts->perPage() + 1}}〜{{ $shareposts->currentPage() * $shareposts->perPage() }}
                            件目を表示しています。</p>        
                    @endif              
                @endif
            </div> 