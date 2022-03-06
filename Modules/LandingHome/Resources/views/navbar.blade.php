@php
$segment = request()->segment(1);

@endphp
<div class="navbar-fixed">
    <nav class="black">
        <div class="container">
            <div class="nav-wrapper">
                <a href="index.html" class="brand-logo">
                    <img src="{{asset($profile->image)}}" width="70px" class="brand-logo">
                </a>
                    <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        @foreach ($pageweb as $pw)
                            @php
                                $active = $segment == $pw->url ? 'grey' : null;
                            @endphp
                            <li class="{{ $active }}"><a href="{{ url($pw->url) }}"
                                    class="">{{ $pw->name }}</a></li>
                        @endforeach
                    </ul>
            </div>
        </div>
    </nav>
</div>
<ul class="sidenav" id="mobile-nav">
    @foreach ($pageweb as $pw)
        <li><a href="{{ url($pw->url) }}">{{ $pw->name }}</a></li>
    @endforeach
</ul>
