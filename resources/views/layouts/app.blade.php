<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10 Task List App</title>
    @yield('styles')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="container mx-auto my-10 max-w-lg">
    <h1 class="text-3xl mb-4">@yield('title')</h1>

    <div>
        @if (session()->has('success'))
            {{-- Se houver alguma flash message de sucesso, exibe aqui --}}
            <div>{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>

</html>
