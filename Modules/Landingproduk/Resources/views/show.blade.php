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
                </div>
                <div class="row ">
                    <div class="col s12 m12 center">
                        @if ($d->url != null)
                            <iframe src="{{ $d->url }}" {{-- width="1424" height="620" --}} {{-- width="950" height="534" --}}
                                 width="100%"
                                height="450" 

                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        @else
                            @if ($sp->image != null)
                                <img src="{{ asset($d->image) }}" width="230">
                            @endif
                        @endif

                    </div>
                </div>
               
                <div class="row ">
                    <div class="col s12 m12 ">

                        {!! $d->descp !!}
                    </div>
                </div>

<hr>
                <div class="row right">
                    <div class="col s12 m12 right">
                       <a href="{{ url()->previous() }}"><< Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
