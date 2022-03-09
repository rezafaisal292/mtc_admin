@php $alignSlide='left-align'; @endphp
@extends('landing-page.landing')
@section('title', $profile->name . '::Home')


@include('landinghome::navbar')

@section('content')

    <!-- slider -->
    <div class="slider">
        <ul class="slides">
            @foreach ($banner as $b)
                <li>
                    <img src="{{ asset($b->image) }}">
                    <div class="caption {{ $alignSlide }}">
                        <h3>{{ $b->label }}</h3>
                        <h5 class="light grey-text text-lighten-3">{{ $b->descp }}</h5>
                    </div>
                </li>
                @if ($alignSlide == 'left-align')
                    @php $alignSlide ='center-align' @endphp
                @elseif($alignSlide == 'center-align')
                    @php $alignSlide ='right-align' @endphp
                @elseif($alignSlide == 'right-align')
                    @php $alignSlide ='left-align' @endphp
                @else
                @endif
            @endforeach

        </ul>
    </div>

    <section id="services" class="services scrollspy">

        <div class="container">
            <h3 class="light black-text ">Profile</h3>
            <div class="row">
                <div class="col m12 light">
                    <div class="progress">
                        <div class="determinate" style="width: 100%"></div>
                    </div>
                    @php
                        $string = strip_tags($profile->descp);
                        if (strlen($string) > 1000) {
                            // truncate string
                            $stringCut = substr($string, 0, 1000);
                            $endPoint = strrpos($stringCut, ' ');
                        
                            //if the string doesn't contain any space then it will cut without word basis.
                            $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                            $string .= '... <a href=' . url('landingprofile') . '>Read More</a>';
                        }
                        
                    @endphp
                    {!! $string !!}
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
                            <br>
                            @php
                                $string = strip_tags($s->descp);
                                if (strlen($string) > 100) {
                                    // truncate string
                                    $stringCut = substr($string, 0, 100);
                                    $endPoint = strrpos($stringCut, ' ');
                                
                                    //if the string doesn't contain any space then it will cut without word basis.
                                    $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                    $string .= '... <a href="'.url('landingservices/'.$s->id).'" class="right">Lihat Selengkapnya</a>
';
                                }
                                
                            @endphp
                            {!! $string !!}
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
<br>
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
                            @endphp
                            {!! $string !!}
                        </div>
                    @endforeach
                @endif
            </div>
    </section>

    <footer class="black">
    </footer>
    <section id="services" class="services scrollspy">
        <a href="services.html">
            <h3 class="light black-text center">Our Client</h3>
        </a>
        <div class="row ">

            <div class="col m12 s12 center">
                <div class="row">
            @if (count($client) > 0)
                @foreach ($client as $c)
                    @if ($c->image != null)
                            <img src="{{ asset($c->image) }}" width="15%"> &nbsp; &nbsp; &nbsp;
                    @endif
                @endforeach
            @endif
                </div>
            </div>
    </section>


    <footer class="black">
    </footer>
    <section id="services" class="services scrollspy">
        <div class="container">
            <a href="services.html">
                <h3 class="light black-text ">Our Member</h3>
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
    </section>


@stop
