<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials._head')
</head>

<body class="font-sans bg-gray-900 text-white px-20">
    @include('partials._nav')
    @yield('content')
    @include('partials._scripts')
</body>

</html>
