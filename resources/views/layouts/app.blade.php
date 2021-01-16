<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>


        <link rel="stylesheet" type="text/css" href="/assets/css/index.css">



    </head>
    <body>
        
       <div class="l-wrapper"> 
            <header class="l-header headerWrap">
                <h1 class="headerTtl">ナレッジ共有サイト</h1>
                
                @if (Auth::check())
                <div>
                    こんにちは、{{ Auth::user()->name }}さん
                </div>
                <ul class="headerNav">
                    <li class="headerNav__item">
                        <a href="">
                            マイアカウント
                        </a>
                    </li>
                    <li class="headerNav__item">
                        <a href="{{ route('logout.get') }}">
                            ログアウト
                        </a>
                    </li>
                </ul>
                @else
                <ul class="headerNav">
                    <li class="headerNav__item">
                        <a href="{{ route('signup.get') }}">
                            新規登録
                        </a>
                    </li>
                    <li class="headerNav__item">
                        <a href="{{ route('login') }}">
                            ログイン
                        </a>
                    </li>
                </ul>
                @endif
                
            </header>
            <main class="l-main">
                
                @yield('content')

                
            </main>
            <foote class="l-footer">
                &copy; 2021 XXXX
                
            </footer>   
       </div>
       
    </body>
</html>
