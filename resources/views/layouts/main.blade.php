<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ Vite::asset('resources/img/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ Vite::asset('resources/img/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ Vite::asset('resources/img/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ Vite::asset('resources/img/site.webmanifest') }}">

        <link rel="apple-touch-icon" sizes="57x57" href="{{ Vite::asset('resources/img/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ Vite::asset('resources/img/apple-icon-60x60.png"') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ Vite::asset('resources/img/apple-icon-72x72.png"') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ Vite::asset('resources/img/apple-icon-76x76.png"') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ Vite::asset('resources/img/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ Vite::asset('resources/img/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ Vite::asset('resources/img/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ Vite::asset('resources/img/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ Vite::asset('resources/img/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ Vite::asset('resources/img/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ Vite::asset('resources/img/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ Vite::asset('resources/img/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ Vite::asset('resources/img/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ Vite::asset('resources/img/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ Vite::asset('resources/img/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">

        <title>TO-DO List - @yield('title')</title>

        {{-- Styles/Scripts --}}
        @vite(['resources/js/app.js' ])
    </head>
    <body class="@yield('class-body')">
        <nav class="navbar">
            <div class="navbar-brand">
                <a class="navbar-item" href="{{ route('home') }}">
                    <img src="{{ Vite::asset('resources/img/logo.png') }}" />
                </a>
                <h1 class="is-size-3 has-text-success">TO-DO List</h1>
            </div>
        </nav>

        <div id="app">

            {{-- Content --}}
            @yield('content')

        </div>

        <footer class="footer py-2 px-6 @yield('class-footer')">
            <div class="content">
                <div class="columns has-text-centered">
                    <div class="column ">
                        <div class="column">
                            {{  __('footer.copyright') }}
                        </div>
                    </div>
                    <div class="column is-two-fifths">
                        <div class="column">
                            Lang: {{ App::getLocale() }}
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
