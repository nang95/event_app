<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('plugin_assets/bootstraps-v3.3.6/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('auth_assets/css/app.css') }}">
    <title>Event App</title>
</head>
<body>
    <div class="hero">
        <div class="overlay">
            <div class="app-title">
                <img src="{{ asset('img_assets/logo.png') }}" class="logo">
                <div class="app-title-text">Aplikasi Event</div>
            </div>
        </div>
        <div class="box-form">
            @yield('content')
        </div>
    </div>

    {{-- <script src="{{ asset('plugin_assets/jquery-2.1.3/jquery.min.js') }}"></script>
    <script src="{{ asset('plugin_assets/bootstraps-v3.3.6/bootstrap.min.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
   
    @yield('footer-scripts')
</body>
</html>