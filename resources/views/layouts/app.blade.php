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
            @yield('content')
        </main>
        @if (Route::is('landing'))
            @include('partials.footer')
        @endif
    </body>

</html>
