<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

    <!-- my CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> @yield('title')</title>
</head>

<body id="services scrollspy">

    <!-- navbar -->
   

    <!-- slider -->
    <div class="slider">
        <ul class="slides">
            <li>
                <img src="{{ asset('img/services/wo6.jpg') }}">
                <div class="caption left-align">
                    <h3>This is our big Tagline!</h3>
                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div>
            </li>
            <li>
                <img src="{{ asset('img/services/wo7.jpg') }}">
                <div class="caption center-align">
                    <h3>This is our big Tagline!</h3>
                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div>
            </li>
            <li>
                <img src="{{ asset('img/services/wo3.jpg') }}">
                <div class="caption right-align">
                    <h3>This is our big Tagline!</h3>
                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div>
            </li>
        </ul>
    </div>
@yield('content')

    <!-- FOOTER -->
    <footer class="black">
        <p class="white-text center">AJ25 PRODUCTION. Copyright 2022</p>
    </footer>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
    <script>
        const sidenav = document.querySelectorAll('.sidenav');
        M.Sidenav.init(sidenav);

        const slider = document.querySelectorAll('.slider');
        M.Slider.init(slider, {
            indicators: false,
            height: 500,
            transition: 600,
            interval: 3000
        });

        const parallax = document.querySelectorAll('.parallax');
        M.Parallax.init(parallax);

        const materialbox = document.querySelectorAll('.materialboxed');
        M.Materialbox.init(materialbox);

        const scroll = document.querySelectorAll('.scrollspy')
        M.ScrollSpy.init(scroll, {
            scrollOffset: 50
        });
    </script>
</body>

</html>
