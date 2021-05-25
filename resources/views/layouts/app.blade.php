<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    {{--    Ikonky --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>@yield('title')</title>
    @yield('tst')
</head>

<body>
<style>
    * {
        font-family: 'Poppins', sans-serif;
    }
    body{
        background: #C9D6FF;
        background: -webkit-linear-gradient(to right, #E2E2E2, #C9D6FF);
        background: linear-gradient(to right, #E2E2E2, #C9D6FF);
    }

    .navbar a{
        color: rgba(255, 255, 255, 0.5);
    }

    .navbar .nav-link:hover,
    .navbar .nav-link:focus {
        color: #FFF;
    }


</style>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2d4059">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><b>Rents</b></a>
        <button style="color: white" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/index">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('rents.index')}}">Rents</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('customers.index')}}">Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sportsgrounds.index') }}">Sportsgrounds</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="py-5 container">
    @yield('content')
</div>

<footer class="text-center text-lg-start fixed-bottom text-light" style="background: #2d4059">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.0);">
        © 2021 Copyright: JV
        <a class="text-light" href="https://github.com/UKF-JozefVirag" target="_blank"><i class="bi bi-github"></i></a>
        <a class="text-light" href="https://www.instagram.com/yuung_flackoo/" target="_blank"><i class="bi bi-instagram"></i></a>
    </div>
    <!-- Copyright -->
</footer>

{{--<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">--}}
{{--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>--}}
{{--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">--}}
{{--<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
</body>

</html>
