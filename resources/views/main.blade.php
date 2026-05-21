<!DOCTYPE html>
<html lang="ru">

<head>
    @include('partials.head')
</head>

<body>
    @include('partials.nav')
    @yield('content')
    {{-- @include('partials.footer') --}}
    @stack('scripts')
</body>

</html>