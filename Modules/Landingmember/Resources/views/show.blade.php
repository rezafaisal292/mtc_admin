@extends('landing-page.landing')
@section('title', $profile->name . '::Show')


@include('landinghome::navbar')

@section('content')
    <div class="slider" style="height: 500px;">
        <ul class="slides" style="height: 500px;">
            <li class="" style="opacity: 0; transform: translateX(0px) translateY(0px);">
                <img src="{{ asset($d->imagebanner) }}"
                    style="background-image: url(&quot;img/members/hyper/1.jpg&quot;);">
                <div class="caption left-align" style="opacity: 0; transform: translateX(-100px);">
                    {{-- <h3>This is our big Tagline!</h3>
                  <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5> --}}
                </div>
            </li>
        </ul>
    </div>
    {{-- <section id="member" class="member scrollspy">
        <div class="container"> --}}
    <div class="row">
        <div class="col s12 m12 center ">
            <br>
            @if (count($d->membersosmed) > 0)
                @foreach ($d->membersosmed as $ms)
                    <a href="{{ $ms->url }}"><img src="{{ asset($ms->sosmeds->image) }}" width="4%">
                    </a>&nbsp;
                @endforeach
            @endif
        </div>
    </div>
    {{-- </div>
    </section> --}}
    {{-- <section id="member" class="member scrollspy"> --}}


    <div class="container">
        <div class="row">
            <div class="col s12 m12 right">
                <a href="{{ url()->previous() }}" class="right">
                    << Kembali</a>
            </div>
            <div class="col s12 m12 ">
                <h4>{{ $d->name }}</h4>
                <div class="progress">
                    <div class="determinate" style="width: 100%"></div>
                </div>
            </div>
            <div class="col s12 m12 ">
                {!! $d->descp !!}
            </div>
        </div>
    </div>
    <footer class="black">
    </footer>

    <div class="row center">
        <br>
        @if (count($d->memberdetail) > 0)
            @foreach ($d->memberdetail as $pr)
                <div class="col m2 s12 center">
                    @if ($pr->url != null)
                        <iframe width="230" height="200" src="{{ $pr->url }}" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    @else
                        @if ($pr->image != null)
                            <img src="{{ asset($pr->image) }}" width="50%">
                        @endif
                    @endif
                    <br>
                    <b>{{ $pr->label }}</b>
                    <br>
                    {!! $pr->descp !!}
                </div>
            @endforeach
    </div>
    @endif
    </div>
    <footer class="black">
    </footer>
    <div class="container">
        <div class="row">
            <div class="col s12 m12 ">
                <h4>{{ $d->name }} Update</h4>
                <div class="progress">
                    <div class="determinate" style="width: 100%"></div>
                </div>
            </div>
            @if (count($d->memberproduk) > 0)
                @foreach ($d->memberproduk as $p)
                    <div class="col s12 m12 ">
                        <div class="row">
                            <div class="col s12 m3">
                                @if ($p->url != null)
                                    <iframe width="230" height="200" src="{{ $p->url }}" title="YouTube video player"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                @else
                                    @if ($sp->image != null)
                                        <img src="{{ asset($p->image) }}" width="230">
                                    @endif
                                @endif
                            </div>

                            <div class="col s12 m9">
                                <div class="row">
                                    <div class="col s12 m9">
                                        <b>{{ $p->label }}</b>
                                    </div>
                                    <div class="col s12 m3">
                                        <i>{{ formatDate($p->updated_at) }}</i>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col s12 m12">
                                        @php
                                            $string = strip_tags($p->descp);
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
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m6 ">
                                <b>{{ !$p->service ? '' : $p->service->label }}</b>
                                &nbsp;
                                <i>{{ !$p->members ? '' : $p->members->name }}</i>
                            </div>
                            <div class="col s12 m6 right">
                                <a href="{{ url(request()->segment(1) . '/' . $p->id) }}" class="right">Lihat
                                    Selengkapnya</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                @endforeach
            @endif
        </div>
    </div>


    {{-- </section> --}}
@stop
