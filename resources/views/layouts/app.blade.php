<!DOCTYPE html>
<html dir="rtl">

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/e514cbacd1.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    @livewireStyles
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-40 px-2 xl:px-20 relative">
        @yield('content')
    </div>
    @livewireScripts
</body>

</html>