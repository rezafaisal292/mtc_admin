@extends('landing-page.landing')
@section('title', $profile->name . '::Services')


@include('landingservices::navbar')

@section('content')

    <section id="services" class="services scrollspy">
        <div class="container">
            <div class="row">
                <div class="col s12 m12">

                    <ul id="tabs-swipe-demo" class="tabs">
                        <li class="tab col s3"><a href="#test-swipe-1">Test 1</a></li>
                        <li class="tab col s3"><a href="#test-swipe-2">Test 2</a></li>
                        <li class="tab col s3"><a href="#test-swipe-3">Test 3</a></li>
                    </ul>

                    <div id="test-swipe-1" class="col s12 blue">Test 1</div>
                    <div id="test-swipe-2" class="col s12 red">Test 2</div>
                    <div id="test-swipe-3" class="col s12 green">Test 3</div>
                </div>
            </div>
        </div>
    </section>
@stop
