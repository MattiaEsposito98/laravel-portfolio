<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Welcome')</title>
    @vite(['resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body class="bg-secondary-subtle d-flex flex-column min-vh-100">
    {{-- Navbar --}}
    <header>
        @include('partials.navbar')
    </header>

    {{-- Main --}}
    <main class="container flex-grow-1">
        <h1>I miei progetti</h1>
        @include('projects.index')

    </main>

    {{-- Footer --}}
    <footer>
        @include('partials.footer')
    </footer>

</body>

</html>
