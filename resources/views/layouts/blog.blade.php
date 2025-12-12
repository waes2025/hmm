<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Header -->
    @include('components.header')
</head>
<body>
    <!-- Navbar -->
    @include('components.admin-navbar')

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    @include('components.footer')
</body>
</html>