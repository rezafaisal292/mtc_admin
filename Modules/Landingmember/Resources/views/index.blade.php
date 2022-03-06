@extends('landing-page.landing')
@section('title', $profile->name . '::Member')


@include('landinghome::navbar')

@section('content')
    <section id="member" class="member scrollspy">
        <div class="container">
            <div class="row">
                <div class="col s12 m12">
                    <h3 class="light black-text ">Member</h3>
                    <div class="progress">
                        <div class="determinate" style="width: 100%"></div>
                    </div>

                    @foreach ($member as $m)
                        <div class="row">
                            <div class="col s12 m3">
                                @if ($m->url != null)
                                    <iframe width="230" height="200" src="{{ $m->url }}" title="YouTube video player"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                @else
                                    @if ($m->image != null)
                                        <img src="{{ asset($m->image) }}" width="230" height="100">
                                    @endif
                                @endif
                            </div>

                            <div class="col s12 m9">
                                <div class="row">
                                    <div class="col s12 m9">
                                        <b>{{ $m->name }}</b>
                                    </div>
                                    <div class="col s12 m3">
                                        <i>{{ formatDate($m->updated_at) }}</i>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col s12 m12">
                                        @php
                                            $string = strip_tags($m->descp);
                                            if (strlen($string) > 300) {
                                                // truncate string
                                                $stringCut = substr($string, 0, 300);
                                                $endPoint = strrpos($stringCut, ' ');
                                            
                                                //if the string doesn't contain any space then it will cut without word basis.
                                                $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                // $string .= '... <a href="/this/story">Read More</a>';
                                                $string .= '...';
                                            }
                                        @endphp
                                        {!! $string !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m6 ">
                                @if (count($m->membersosmed) > 0)
                                    @foreach ($m->membersosmed as $ms)
                                        <a href="{{ $ms->url }}"><img src="{{ asset($ms->sosmeds->image) }}"
                                                width="5%"> </a>&nbsp;
                                    @endforeach
                                @endif
                            </div>
                            <div class="col s12 m6 right">
                                <a href="{{ url(request()->segment(1) . '/' . $m->id) }}" class="right">Lihat
                                    Selengkapnya</a>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    <div class="row">
                        <div class="col s12 m12 center">
                            <ul class="pagination">
                                @php
                                $pageMin =$member->currentPage()<=$member->lastPage()?$member->currentPage()-1 : $member->currentPage();
                                @endphp

                                <li >
                                    <a href="{{request()->segment(1)."?page=".$pageMin}}"><i class="material-icons">chevron_left</i></a>
                                </li>
                                @for ($i = 1; $i <= $member->lastPage() ; $i++)
                                    <li class="waves-effect
                                    @if($member->currentPage()==$i )
                                    active black
                                    @endif">
                                        <a href="{{request()->segment(1)."?page=".$i}}">{{ $i }}</a>
                                    </li>
                                @endfor
                                @php
                                $pageAdd =$member->currentPage()==$member->lastPage()?$member->currentPage() : $member->currentPage()+1;
                                @endphp
                                <li class="waves-effect">
                                    <a href="{{request()->segment(1)."?page=".$pageAdd}}">
                                    <i class="material-icons">chevron_right</i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
