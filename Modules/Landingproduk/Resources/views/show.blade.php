@extends('landing-page.landing')
@section('title', $profile->name . '::Show')


@include('landinghome::navbar')

@section('content')
    <section id="produk" class="produk scrollspy">
        <div class="container">
            <div class="row">
                <div class="col s12 m12">
                    <h3 class="light black-text ">{{ $d->label }}</h3>
                    <div class="progress">
                        <div class="determinate" style="width: 100%"></div>
                    </div>


                    <div class="row">
                        <div class="col s12 m3">
                            @if ($d->url != null)
                                <iframe width="230" height="200" src="{{ $d->url }}" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            @else
                                @if ($sp->image != null)
                                    <img src="{{ asset($d->image) }}" width="230">
                                @endif
                            @endif
                        </div>

                        {!! $d->descp !!}
                        <br>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
