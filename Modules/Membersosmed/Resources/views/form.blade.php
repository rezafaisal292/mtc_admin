@php
$segment = request()->segment(2);
$title = 'Tambah';
$method = 'post';
$action = 'membersosmed.store';
$readonly='';
if ($segment !== 'create') {
    $title = 'Ubah';
    $method = 'put';
    $action = ['membersosmed.update', $d->id];
    $readonly='readonly';
    
}
@endphp
@extends('adminlte::page')
@section('title', env('APP_NAME') . '::' . $title . ' Membersosmed')
@section('content')

@section('content_header')
    <h1 class="m-0 text-dark">Member Sosmed</h1>
@stop
{{ Form::open(['route' => $action,'method' => $method,'class' => 'form-horizontal form-data','autocomplete' => 'off']) }}
<div class="card card-primary">
    <div class="card-header">
        {{ $title }} Data Member Sosmed
    </div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-md-6">
                {{ Form::fgSelect('Member', 'member', $member, $d->member, ['class' => 'form-control',$readonly], null, 'text', true) }}
                {{ Form::fgSelect('Sosmed', 'sosmed', $sosmed, $d->sosmed, ['class' => 'form-control'], null, 'text', true) }}
                {{ Form::fgText('Url', 'url', $d->url, ['class' => 'form-control'], null, 'text', true) }}
            </div>
        </div>
    </div>

    <div class="card-footer clearfix text-right">
        @include('master-component.button-form')
    </div>
</div>
{{ Form::close() }}
@endsection
