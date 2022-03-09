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
                            <a href="{{ $ms->url }}"><img src="{{ asset($ms->sosmeds->image) }}" width="5%">
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
                    <a href="{{ url()->previous() }}" class="right"><< Kembali</a>
                 </div>
                <div class="col s12 m12 ">
                    <h4>{{ $d->name }}</h4>
                    <div class="progress">
                        <div class="determinate" style="width: 100%"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 ">
                    {!! $d->descp !!}
                </div>
            </div>
        </div>
    {{-- </section> --}}
@stop
