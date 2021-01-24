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
                
                <div>
                    <a href="{{ route('admin') }}" target="_blank">
                            管理画面ログイン
                    </a>
                </div>
                
            </header>
            <main class="l-main">
                
                @yield('content')

{{--
<p class="aaa">111</p>
<img src="/assets/img/111.jpg">
--}}


            </main>
            <foote class="l-footer">
                &copy; 2021 XXXX
                
            </footer>   
       </div>
       
    </body>
</html>
