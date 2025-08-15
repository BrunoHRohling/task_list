<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10 Task List App</title>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
    .btn {
        @apply rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 text-slate-700
    }

    .link {
        @apply font-medium text-gray-700 underline decoration-pink-500
    }
    </style>
    {{-- blade-formatter-enable --}}

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
