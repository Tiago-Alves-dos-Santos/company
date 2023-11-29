<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soluções Software</title>
    <!-- Favicons -->
    <link href="{{ asset('img/logo-ico.png') }}" rel="icon">
    @vite(['resources/sass/admin.scss','resources/js/app.js'])
    @wireUiScripts
</head>
<body>
    <h1>Menu admin</h1>
    <button class="bg-red-200">Teste</button>
    @yield('content')
</body>
</html>
