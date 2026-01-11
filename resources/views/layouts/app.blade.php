<!DOCTYPE html>
<html lang="en">

    <head>
        @include('partials.head')
    </head>

    <body>
        @if (Route::is('landing'))
            @include('partials.navbar')
        @endif
        <main>
            @if (Auth::check() && Auth::user()->role === 'admin')
                @include('partials.sidebar')
                @include('partials.header-admin')
            @endif
            @yield('content')
        </main>
        @if (Route::is('landing'))
            @include('partials.footer')
        @endif
    </body>

</html>
