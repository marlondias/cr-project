<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Bootstrap required tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Marlon's CRM</title>
</head>

<body>
    <div id="topBannerBox">
        <div class="container">
            <a type="button" class="btn btn-light" href="{{ $urlRetorno }}">{{ $txtRetorno }}</a>
            <h2 class="blocky-text">{{ $txtTitulo }}</h2>
        </div>
    </div>

    <div id="contentBox">
        @include('layout.messages')

        @yield('corpo')
    </div>

    <div id="footerBox">
        <div class="container">
            <span class="copyright">&#9733; 2020 Marlon Dias</span>
        </div>
    </div>

    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
    @yield('scripts')
    
</body>
</html>