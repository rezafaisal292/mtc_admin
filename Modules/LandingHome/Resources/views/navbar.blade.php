<div class="navbar-fixed">
    <nav class="black">
        <div class="container">
            <div class="nav-wrapper">
                <a href="index.html">
                    {{-- <img src="img/members/1.png" width="108px"></a> --}}
                <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    @foreach($pageweb as $pw)
                    <li><a href="{{url($pw->url)}}">{{$pw->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</div>
<ul class="sidenav" id="mobile-nav">
    @foreach($pageweb as $pw)
    <li><a href="{{url($pw->url)}}">{{$pw->name}}</a></li>
    @endforeach
</ul> 
