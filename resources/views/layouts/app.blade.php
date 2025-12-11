<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'My Blog')</title>


        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    </head>

    <body>

        @include('components.navbar')


        <main class="container py-4">
            @yield('content')
        </main>


        @include('components.footer')


        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


        <!-- Custom JS -->
        <script src="{{ asset('js/blog.js') }}"></script>


    </body>

</html>