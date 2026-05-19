<!DOCTYPE html>
<html lang="ru">

<head>
    @include('partials.head')
</head>

<body>
    @yield('content')
    @include('partials.footer')
    @stack('scripts')
</body>

</html>