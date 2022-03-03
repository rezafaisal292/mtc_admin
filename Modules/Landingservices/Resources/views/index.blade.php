@extends('landing-page.landing')
@section('title', $profile->name . '::Services')


@include('landinghome::navbar')

@section('content')

    <section id="services" class="services scrollspy">
        <div class="container">
            <div class="row">
                <div class="col s12 m12">
                    <h3 class="light black-text ">Services</h3>
                    <div class="progress">
                        <div class="determinate" style="width: 100%"></div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12">
                            <ul id="tabs-swipe-demo" class="tabs">
                                @foreach ($services as $s)
                                    <li class="tab col s3 ">
                                        <a href="#{{ $s->id }}">
                                            <b>{{ $s->label }}</b>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            @foreach ($services as $s)
                                <div id="{{ $s->id }}" class="col s12 ">
                                    <br>
                                    <h5>{{ $s->label }}</h5>
                                    {!! $s->descp !!}
                                    <br>

                                    <h5>Produk</h5>
                                    <div class="progress">
                                        <div class="determinate" style="width: 100%"></div>
                                    </div>
                                    @if (count($s->produks) > 0)
                                        @foreach ($s->produks as $sp)
                                            <div class="row">
                                                <div class="col s12 m3">
                                                    @if ($sp->url != null)
                                                        <iframe width="230" height="200" src="{{ $sp->url }}"
                                                            title="YouTube video player" frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                            allowfullscreen></iframe>
                                                    @else
                                                        @if ($sp->image != null)
                                                            <img src="{{ asset($pr->image) }}" width="230">
                                                        @endif
                                                    @endif
                                                </div>

                                                <div class="col s12 m9">
                                                    <div class="row">
                                                        <div class="col s12 m9">
                                                            <b>{{ $sp->label }}</b>
                                                        </div>
                                                        <div class="col s12 m3">
                                                            <i>{{ formatDate($sp->updated_at) }}</i>
                                                        </div>
                                                    </div>
                                                    
                                                        @php
                                                            $string = strip_tags($sp->descp);
                                                            if (strlen($string) > 100) {
                                                                // truncate string
                                                                $stringCut = substr($string, 0, 100);
                                                                $endPoint = strrpos($stringCut, ' ');
                                                            
                                                                //if the string doesn't contain any space then it will cut without word basis.
                                                                $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                                $string .= '... <a href="/this/story">Read More</a>';
                                                            }
                                                        @endphp
                                                   {!!$string!!}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m6 ">
                                                    <i><b>{{ !$sp->service ? '' : $sp->service->label . ',' }}</b></i>
                                                    &nbsp;
                                                    <i>{{ !$sp->members ? '' : $sp->members->name }}</i>
                                                </div>
                                                <div class="col s12 m6 right">
                                                    <a href="{{ url('landingproduk/' . $sp->id) }}" class="right">Lihat
                                                        Selengkapnya</a>
                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach
                                        @else
                                        
                                        Data produk tidak ada
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
    </section>
@stop
