        <aside class="adminContents__side">
            <ul class="adminSideNav">
                <li class="adminSideNav__item">
                    <a href="{{ route('admin') }}">
                        管理画面TOP     
                    </a>
                </li>                 
                <li class="adminSideNav__item">
                    記事
                    <ul class="adminSideNavLower">
                        <li class="">
                            -
                            <a href="{{ route('shareposts.create') }}">
                                新規記事登録
                            </a>
                        </li>      
                        </li class="">
                            -
                            <a href="{{ route('tags.index') }}">
                                記事タグ
                            </a>
                        </li>
                    </ul>   
                </li>
                <li class="adminSideNav__item">  
                    <a href="{{ route('users.show', ['user' => Auth::id()]) }}">
                        マイアカウント
                    </a>
                </li>
                <li class="adminSideNav__item">
                    <a href="/admin/contact/">
                        問い合わせ    
                    </a>
                </li>                
            </ul>   
        </aside>