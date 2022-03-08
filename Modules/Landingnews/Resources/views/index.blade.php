@php $alignSlide='left-align'; @endphp
@extends('landing-page.landing')
@section('title', $profile->name . '::News')


@include('landinghome::navbar')

@section('content')
<section id="produk" class="produk scrollspy">
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <h3 class="light black-text ">News</h3>
                <div class="progress">
                    <div class="determinate" style="width: 100%"></div>
                </div>
@if(count($news ) > 0)
                @foreach ($news as $p)
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
                            <b>{{ !$p->service ? '' : $p->service->label  }}</b>
                            &nbsp;
                            <i>{{ !$p->members ? '' : $p->members->name }}</i>
                        </div>
                        <div class="col s12 m6 right">
                            <a href="{{ url(request()->segment(1) . '/' . $p->id) }}" class="right">Lihat
                                Selengkapnya</a>
                        </div>
                    </div>
                    <hr>
                @endforeach
                @else
                Data News tidak ada
                @endif

            </div>
        </div>
    </div>
</section>
    

@stop
