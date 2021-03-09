<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="imagenes" href="{{asset('img/favicon.ico')}}">
    <title>JLDM | Web Dinamica</title>

    <!--LINNK-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet"> 

    <!-- Styles -->
    <link type="text/css" href="{{asset('css/style.css') }}" rel="stylesheet">
    <link type="text/css" href="{{asset('css/slick.css') }}" rel="stylesheet">
</head>
<body> 
    @yield('redes')
        <section id="headerSection">
            @yield('navbar_top')
            @yield('navbar')
            @yield('banner')
        </section>
    @yield('cards_service')
    @yield('title')
        <div class="body_cards">
            @yield('cards')
        </div>
    @yield('title5')
        @yield('Proveedores')
    @yield('title2')
    @yield('products')
    @yield('footer')
    @yield('modals')
    <!--SCRIPT-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{asset('js/hgnka.js') }}"></script>
    <script src="{{asset('js/security.js') }}"></script>
    <script src="{{asset('js/provee.js') }}"></script>
    <script src="{{asset('js/slick.min.js') }}"></script>
    <script src="{{asset('js/typed.js') }}"></script>
    <script>
        var typed = new Typed('.type', {
        strings: ['<span><i class="fas fa-paint-brush"></i></span> RESPONSIVE', 
                    '<span><i class="fas fa-building"></i></span> DINAMICA'
                    ,'<span><i class="fas fa-coffee"></i></span> FOLLOW ME'],
        typeSpeed:60,backSpeed:60,loop:true});
    </script>
</body>
</html>
