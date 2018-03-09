<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('layouts.head')
        <title>@yield('title')</title>
    </head>
    <body>
        @yield('navbar')

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (isset($success))
            <div class="alert alert-success">
                {{$success}}
            </div>
        @endif

        @if (session('fail'))
            <div class="alert alert-danger">
                {{ session('fail') }}
            </div>
        @endif

        @if (isset($fail))
            <div class="alert alert-danger">
                {{$fail}}
            </div>
        @endif

        @yield('content')

        @include('layouts.footer')

        @yield('custom_js')
    </body>
</html>