<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ config('app.name', 'Tienda Online') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/menu.css?v=') }}@php echo(rand()); @endphp">
    <link rel="stylesheet" href="{{ asset('css/main.css?v=') }}@php echo(rand()); @endphp">
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
</head>
<body>
    
    @include('includes.TopNavbar')

    @include('includes.MiddleNavbar')

    @include('includes.BottomNavbar')

    <div class="container">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/menu.js?v=') }}@php echo(rand()); @endphp"></script>
</body>
</html>