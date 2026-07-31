<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/js/app.js'])
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">

        <a class="navbar-brand" href="{{ route('posts.index') }}">
            Blog App
        </a>

        <div class="ms-auto d-flex align-items-center">

            @auth

                <span class="text-white me-3">
                    {{ auth()->user()->name }}
                </span>

                <a href="{{ route('profile.edit') }}" class="btn btn-outline-light btn-sm me-2">
                    Profile
                </a>

                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm">
                        Logout
                    </button>
                </form>

            @else

                <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm me-2">
                    Login
                </a>

                <a href="{{ route('register') }}" class="btn btn-success btn-sm">
                    Register
                </a>

            @endauth

        </div>

    </div>
</nav>

<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>