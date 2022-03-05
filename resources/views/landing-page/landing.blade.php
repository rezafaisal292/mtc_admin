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


    @yield('content')

    <!-- FOOTER -->
    {{-- <footer class="page-footer black center">
        <div class="footer-copyright">
            <div class="container">
                <b class="white-text ">{{ $profile->name }}. Copyright 2022. Powered by Fariq Mujahid S.KOM</b>
            </div>
        </div>
    </footer> --}}
    <footer class="page-footer black">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
              <h5 class="white-text">{{$profile->name}} </h5>
              <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
            </div>
            <div class="col l4 offset-l2 s12">
              <h5 class="white-text">Contact Us</h5>
              <ul>
                 @foreach($profile->kontak as $k)
                <li><a class="grey-text text-lighten-3" href="#!"> {{$k->data}}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
          © 2022 Copyright {{$profile->name}}
          <a class="grey-text text-lighten-4 right" href="#!">Powered By Fariq Mujahid S.kom</a>
          </div>
        </div>
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
        M.AutoInit();
    </script>
</body>

</html>
