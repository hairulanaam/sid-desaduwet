<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
    
    @if ($page === 'Beranda')
    <link rel="stylesheet" href="{{ asset('assets/css/beranda.css') }}">
    @endif
</head>
<body>
    @include('layouts.navbar')

    <main class="w-full overflow-x-hidden bg-[#F7F9FA] relative">
        @yield('content')
    </main>

    @include('layouts.footer')
</body>
</html>