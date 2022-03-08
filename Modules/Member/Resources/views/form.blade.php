@php
$segment = request()->segment(2);
$title = 'Tambah';
$method = 'post';
$action = 'member.store';
if ($segment !== 'create') {
    $title = 'Ubah';
    $method = 'put';
    $action = ['member.update', $d->id];
}
@endphp
@extends('adminlte::page')
@section('title', env('APP_NAME') . '::' . $title . ' Member')
@section('content')

@section('content_header')
    <h1 class="m-0 text-dark">Member</h1>
@stop
{{ Form::open(['route' => $action,'method' => $method,'class' => 'form-horizontal form-data','autocomplete' => 'off','enctype' => 'multipart/form-data']) }}
<div class="card card-primary">
    <div class="card-header">
        {{ $title }} Data Member
    </div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-md-6">
                {{ Form::fgText('Nama', 'name', $d->name, ['class' => 'form-control'], null, 'text', true) }}
                <div class="form-group">
                    <b>Logo</b><br />
                    {{$d->images}}
                    <input type="file" name="images">
                    @if ($d->image != null)
                        <img src="{{ asset($d->image) }}" width="30%">
                    @endif
                </div>
                <div class="form-group">
                    <b>Banner</b><br />

                    <input type="file" name="imagesbanner">
                    @if ($d->image != null)
                        <img src="{{ asset($d->imagebanner) }}" width="30%">
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
@endsection
