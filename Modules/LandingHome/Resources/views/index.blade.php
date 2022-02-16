@extends('landing-page.landing')
@section('title', $profile->name . '::Home')


@include('landinghome::navbar')

@section('content')

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
    
    <section id="services" class="services scrollspy">
        <div class="container">
            <div class="row">
                <div class="col s12 m12">
                    <h3>{{ $profile->name }}</h3>
                    <p>
                        @php
                            $string = strip_tags($profile->descp);
                            if (strlen($string) > 1000) {
                                // truncate string
                                $stringCut = substr($string, 0, 1000);
                                $endPoint = strrpos($stringCut, ' ');
                            
                                //if the string doesn't contain any space then it will cut without word basis.
                                $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                $string .= '... <a href="/this/story">Read More</a>';
                            }
                            echo $string;
                        @endphp
                    </p>
                </div>
            </div>
    </section>

    <footer class="black">
    </footer>
    <section id="services" class="services scrollspy">
        {{-- <div class="container"> --}}
        <div class="row">
            <a href="services.html">
                <h3 class="light black-text center">Our Services</h3>
            </a>
            @if (count($services) > 0)
                @foreach ($services as $s)
                    <div class="col m3 s12">
                        <div class="card-panel center">
                            {!! $s->icon !!}
                            <br>
                            <b>{{ $s->label }}</b>
                            <p>
                                @php
                                    $string = strip_tags($s->descp);
                                    if (strlen($string) > 100) {
                                        // truncate string
                                        $stringCut = substr($string, 0, 100);
                                        $endPoint = strrpos($stringCut, ' ');
                                    
                                        //if the string doesn't contain any space then it will cut without word basis.
                                        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                        $string .= '... <a href="/this/story">Read More</a>';
                                    }
                                    echo $string;
                                @endphp
                            </p>
                        </div>
                    </div>
                @endforeach
            @endif
            {{-- </div> --}}
    </section>

    <footer class="black">
    </footer>
    <section id="services" class="services scrollspy">
        <div class="container">
            <div class="row">
                <div class="col m3 s12">
                    <h3 class="light black-text left">Project</h3>
                </div>
            </div>
            <div class="row">
            </div>
    </section>

    <footer class="black">
    </footer>
    <section id="services" class="services scrollspy">
        <div class="container">
            <a href="services.html">
                <h3 class="light black-text center">Our Member</h3>
            </a>
            <div class="row">

                @if (count($member) > 0)
                    @foreach ($member as $m)
                        <div class="col m3 s12 center">
                            <img src="{{ asset($m->image) }}">
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row">

            </div>
    </section>


@stop
