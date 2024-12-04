<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', "Damar's Blog")</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aos-master/dist/aos.css') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        .navbar { height: 10vh; }
        body { background-color: white; transition: background-color 0.5s, color 0.5s; min-height: 100vh; }
        body::-webkit-scrollbar { display: none; }
        .content { margin: auto; }
        .dark { background-color: #000; }
        .blog { padding: 5px; border-bottom: 1px solid lightgray; }
        .small { color: gray; }
    </style>
</head>
<body>
    
    <div class="container">
        <main>
            @yield('content')
        </main>
    </div>
    
    <script src="{{ asset('bootstrap-5/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('aos-master/dist/aos.js') }}"></script>
    <script src="{{ asset('sweetalert-2/sweetalert2.js') }}"></script>
    <script src="{{ asset('jquery/jquery.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>