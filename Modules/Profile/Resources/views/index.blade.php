@php
$segment = request()->segment(1);
@endphp
@extends('adminlte::page')

@section('title', env('APP_NAME') . '::Profile')

@section('content_header')
    <h1 class="m-0 text-dark">Profile</h1>
@stop

@section('content')
    @php
    $segment = request()->segment(2);
    $title = 'Tambah';
    $method = 'post';
    $action = 'profile.store';
    if ($segment !== 'create') {
        $title = 'Ubah';
        $method = 'put';
        $action = ['profile.update', $d->id];
    }
    @endphp

@section('content_header')
    <h1 class="m-0 text-dark">Profile</h1>
@stop
{{ Form::open(['route' => $action,'method' => $method,'class' => 'form-horizontal form-data','autocomplete' => 'off','enctype' => 'multipart/form-data']) }}
<div class="card card-primary">
    <div class="card-header">
        Data Profile
    </div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-md-6">
                {{ Form::fgText('Nama', 'name', $d->name, ['class' => 'form-control'], null, 'text', true) }}
                {{ Form::fgText('Telp', 'phone', $d->phone, ['class' => 'form-control'], null, 'text', true) }}
                {{ Form::fgText('Email', 'email', $d->email, ['class' => 'form-control'], null, 'text', true) }}
                {{ Form::fgText('Alamat', 'address', $d->address, ['class' => 'form-control'], null, 'text', true) }}

                <div class="form-group">
                    <b>File Gambar</b><br />

                    <input type="file" name="images">
                    @if ($d->image != null)
                        <img src="{{ asset($d->image) }}" width="30%">
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <b>Deskripsi</b>
                <textarea id="summernote" style="display: none;" name="descp">
            {{ $d->descp }}
             </textarea>
            </div>
        </div>
    </div>

    <div class="card-footer clearfix text-right">
        @include('master-component.button-form')
    </div>
</div>
{{ Form::close() }}

</div>
@stop
