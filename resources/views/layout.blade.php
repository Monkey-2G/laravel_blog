<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- post 전송 시, csrf 방지를 위해 meta tag를 삽입한다. -->
        <title>@yield('title', 'Laravel')</title>
    <link rel="stylesheet" href="{{ mix('css/tailwind.css')}}"></link>
        <!--
          <ul>
          <li><a href="/">welcome</li>
          <li><a href="/hello">hello</li>
          <li><a href="/contact">contact</a></li>
          <li><a href="/projects">Projects (Database)</a></li>
        </ul>
        -->
    </head>
    <body>
      <!-- <div class="bg-red-100">This Area is tailwind.CSS Area</div> -->
      <div class="container mx-auto">
        @yield('content')
      </div>
    </body>
</html>
