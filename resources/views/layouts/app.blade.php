<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description', 'Laravel Application')">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class=" text-gray-900 bg-[#f2f2f2] h-[100vh] antialiased">

    {{-- Header --}}
    <x-navbar />

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <x-footer />

    @stack('scripts')
</body>

</html>
