@extends('landing-page.landing')
@section('title', $profile->name . '::Show')


@include('landinghome::navbar')

@section('content')

    <section id="services" class="services scrollspy">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 right">
                    <a href="{{ url()->previous() }}" class="right"><< Kembali</a>
                 </div>
                <div class="col s12 m12">
                    <h5 class="light black-text ">List Produk `{{ $d->label }}`</h5>
                    <div class="progress">
                        <div class="determinate" style="width: 100%"></div>
                    </div>
                </div>

                @if (count($d->produks) > 0)
                    @foreach ($d->produks as $sp)
                        <div class="row">
                            <div class="col s12 m3">
                                @if ($sp->url != null)
                                    <iframe width="230" height="200" src="{{ $sp->url }}" title="YouTube video player"
                                        frameborder="0"
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
                                <div class="row">
                                    <div class="col s12 m12">
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
                                        {!! $string !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m6 ">
                                <i>{{ !$sp->members ? '' : $sp->members->name }}</i>
                            </div>
                            <div class="col s12 m6 right">
                                <a href="{{ url('landingproduk/' . $sp->id) }}" class="right">
                                    Lihat Selengkapnya
                                </a>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                @else
                    Data produk tidak ada
                @endif
            </div>
        </div>
    </section>
@stop
