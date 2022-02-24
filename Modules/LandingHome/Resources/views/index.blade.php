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
            <h3 class="light black-text center">PROFILE</h3>
            <div class="row">
                <div class="col m12 light">
                    <div class="progress">
                        <div class="determinate" style="width: 100%"></div>
                    </div>
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
                    <h3 class="light black-text left">Produk</h3>
                </div>
            </div>
            <div class="row">
                @if (count($produk) > 0)
                    @foreach ($produk as $pr)
                        <div class="col m3 s12 center">
                            @if ($pr->url != null)
                                <iframe width="230" height="200" src="{{ $pr->url }}" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            @else
                                @if ($pr->image != null)
                                    <img src="{{ asset($pr->image) }}" width="230">
                                @endif
                            @endif

                            <b>{{ $pr->label }}</b>
                            <p>
                                @php
                                    $string = strip_tags($pr->descp);
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
                    @endforeach
                @endif
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
                        @if ($m->image != null)
                            <div class="col m3 s12 center">
                                <img src="{{ asset($m->image) }}" width="100%">
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="row">

            </div>
    </section>


@stop
