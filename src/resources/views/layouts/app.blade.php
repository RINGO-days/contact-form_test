<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header_inner">
            <form action="/reset" method="get">
                <button class="header_logo">FashionablyLate</button>
            </form>
            @yield('nav')
        </div>
        <div class="title_box">
            @yield('title')
            <div class="flash_message__box">
            @yield('flash_message')
            </div>
        </div>

    </header>
    <main>
        @yield('main')
    </main>
</body>
</html>