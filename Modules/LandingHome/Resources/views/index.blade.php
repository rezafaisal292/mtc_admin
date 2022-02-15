@extends('landing-page.landing')
@section('title', 'Home')


@include('landinghome::navbar')

@section('content')
    <section id="services" class="services scrollspy">
        <div class="container">
            <div class="row">
                <div class="col m3 s12">
                    <h3 class="light black-text left">Profile</h3>
                </div>
            </div>
            <div class="row">

            </div>
    </section>
    <hr>
    <section id="services" class="services scrollspy">
        {{-- <div class="container"> --}}
        <div class="row">
            <a href="services.html">
                <h3 class="light black-text center">Our Services</h3>
            </a>
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


@stop
