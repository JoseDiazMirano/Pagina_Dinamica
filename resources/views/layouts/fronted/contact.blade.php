<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="imagenes" href="{{asset('img/favicon.ico')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>JLDM |Contáctanos</title>

        <!-- Fonts--> 
        <link href="{{asset('css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Styles -->
    </head>
    <body> <!--oncontextmenu = "return false"-->
    @yield('redes')
        <section id="headerSection_contactanos">
            @yield('navbar_top')
            @yield('navbar')
            @yield('banner')
        </section>
        @yield('cards_service')
        @yield('Content_messege')
        @yield('footer') 
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{asset('js/responsive.js') }}"></script>
    <script src="{{asset('js/security.js') }}"></script>
    <script src="{{asset('js/typed.js') }}"></script>
    <script>
	var typed = new Typed('.type', {
    strings: ['<span><i class="fas fa-mobile-alt"></i></span> +51 99999999', 
                '<span><i class="fas fa-mail-bulk"></i></span> jldm605@gmail.com'],
    typeSpeed:60,backSpeed:60,loop:true});
    </script>
    </body>
</html>