@php
$segment = request()->segment(2);
$title = 'Tambah';
$method = 'post';
$action = 'services.store';
if ($segment !== 'create') {
    $title = 'Ubah';
    $method = 'put';
    $action = ['services.update', $d->id];
}
@endphp
@extends('adminlte::page')
@section('title', env('APP_NAME') . '::' . $title . ' Services')
@section('content')

@section('content_header')
    <h1 class="m-0 text-dark">Services</h1>
@stop
{{ Form::open(['route' => $action,'method' => $method,'class' => 'form-horizontal form-data','autocomplete' => 'off']) }}
<div class="card card-primary">
    <div class="card-header">
        {{ $title }} Data Services
    </div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-md-6">
                {{ Form::fgText('Icon', 'icon', $d->icon, ['class' => 'form-control'], null, 'text', true) }}
                {{ Form::fgText('Label', 'label', $d->label, ['class' => 'form-control'], null, 'text', true) }}

                {{ Form::fgSelect('Status', 'status', $status, $d->status, ['class' => 'form-control'], null, 'text', true) }}
            </div>
            <div class="col-md-12">
                <b>Deskripsi</b>

                {!! Form::textarea('descp', $d->descp, ['class' => 'form-control'], true) !!}
            </div>

        </div>
    </div>

    <div class="card-footer clearfix text-right">
        @include('master-component.button-form')
    </div>
</div>
{{ Form::close() }}
@endsection
