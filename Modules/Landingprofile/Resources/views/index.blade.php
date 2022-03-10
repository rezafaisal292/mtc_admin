@extends('landing-page.landing')
@section('title', $profile->name . '::Profile')


@include('landinghome::navbar')

@section('content')

    <section id="contact" class="contact scrollspy">
        <div class="container">
            <h3 class="light center white lighten-4-text">Profile</h3>
            <div class="row">
                <div class="col m5 s12 center">
                    <div class="card-panel grey center white-text">
                        <i class="material-icons">email</i>
                        <h5>contact</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore.</p>
                    </div>
                    <ul class="collection with-header">
                        <li class="center collection-header">
                            <h4>Contact Us</h4>
                        </li>
                        @if (count($profile->Kontak) > 0)
                            @foreach ($profile->Kontak as $k)
                                <li class="center collection-item">
                                  @if ($k->sosmed->image != null)
                                  <img src="{{ asset($k->sosmed->image) }}" width="30%">
                              @else
                              @endif
                              &nbsp; {{$k->data}}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>

                <div class="col m7 s12">
                    <form>
                        <div class="card-panel">
                            <h5>Fill Out This Form</h5>

                            <div class="input-field">
                                <input id="name" type="text" required class="validate">
                                <label for="last_name">Name</label>
                            </div>

                            <div class="input-field">
                                <input id="email" type="text" class="validate">
                                <label for="email">Email</label>
                            </div>

                            <div class="input-field">
                                <input id="phone_number" type="text" class="validate">
                                <label for="phone_number">Phone Number</label>
                            </div>

                            <div class="input-field">
                                <textarea name="message" id="message" class="materialize-textarea"></textarea>
                                <label for="message">Message</label>
                            </div>
                            <button type="submit" class="btn blue darken-2">Send</button>

                        </div>
                    </form>
                </div>
            </div>
    </section>

@stop
