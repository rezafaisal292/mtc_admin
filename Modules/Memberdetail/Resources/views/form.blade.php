@php
$segment = request()->segment(2);
$title = 'Tambah'; $method = 'post'; $action = 'memberdetail.store';
if ($segment !== 'create' ) { $title = 'Ubah'; $method = 'put'; $action = ['memberdetail.update', $d->id]; }
@endphp
@extends('adminlte::page')
@section('title', env('APP_NAME').'::'.$title.' Memberdetail')
@section('content')

@section('content_header')
<h1 class="m-0 text-dark">Memberdetail</h1>
@stop
{{ Form::open(['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-data', 'autocomplete' => 'off']) }}
<div class="card card-primary">
    <div class="card-header">
        {{$title}} Data Memberdetail
    </div>
    <div class="card-body">
        <div class="form-group row">
            
        </div>
    </div>

    <div class="card-footer clearfix text-right">
        @include('master-component.button-form')
    </div>
</div>
{{ Form::close() }}
@endsection