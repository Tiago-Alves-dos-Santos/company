<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soluções Software</title>
    <!-- Favicons -->
    <link href="{{ asset('img/logo-ico.png') }}" rel="icon">
    @vite(['resources/sass/app.scss'])
</head>

<body class="layout-center">
    <div class="center">
        @yield('content')
    </div>

    <script>
        /* ----------------LOGIN LOAD----------------*/
        document.querySelectorAll('.load').forEach(element => {
            element.style.display = 'none';
        });
        showLoad = (form) => {
            form.querySelector('.load').style.display = 'inline-block';
            form.querySelector('.btn').setAttribute('disabled', true);
        }
        /* ----------------END-LOGIN LOAD----------------*/
        function showPassword() {
            var x = document.getElementById("password");
            var span = document.getElementById("show-password");
            if (x.type === "password") {
                x.type = "text";
                span.innerHTML = '<i class="bi bi-eye-fill"></i>';
            } else {
                x.type = "password";
                span.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
            }
        }
    </script>
    @stack('script')
</body>

</html>
