<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarenPlay</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

</head>

<nav class="navbar navbar-expand-lg " data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="#">Care n Play</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Regisztráció</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Bejelentkezés</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')


<footer class="my-4 text-center">
    <p>Készítette: Balogh Dominik Ádám, Szalatnai Milán</p>
</footer>

</html>
