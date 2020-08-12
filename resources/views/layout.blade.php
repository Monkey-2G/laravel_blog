<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Laravel')</title>
        <ul>
          <li><a href="/">welcome</li>
          <li><a href="/hello">hello</li>
          <li><a href="/contact">contact</a></li>
        </ul>
    </head>
    <body>
    @yield('content')
    </body>
</html>
