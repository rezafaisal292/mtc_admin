@php
$segment = request()->segment(2);
$title = 'Tambah'; $method = 'post'; $action = 'sosmed.store';
if ($segment !== 'create' ) { $title = 'Ubah'; $method = 'put'; $action = ['sosmed.update', $d->id]; }
@endphp
@extends('adminlte::page')
@section('title', env('APP_NAME').'::'.$title.' Sosmed')
@section('content')

@section('content_header')
<h1 class="m-0 text-dark">Sosmed</h1>
@stop
{{ Form::open(['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-data', 'autocomplete' => 'off']) }}
<div class="card card-primary">
    <div class="card-header">
        {{$title}} Data Sosmed
    </div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-md-6">
                {{ Form::fgText('Label', 'label', $d->label, ['class' => 'form-control'], null, 'text', true) }}
                {{ Form::fgSelect('Member', 'member', $member,$d->member, ['class' => 'form-control'], null, 'text', true) }}
             
                <div class="form-group">
                    <b>File Gambar</b><br />

                    <input type="file" name="images">
                    @if ($d->image != null)
                        <img src="{{ asset($d->image) }}" width="30%">
                    @endif
                </div>
            </div> {{ Form::fgSelect('Status', 'status',$status ,$d->status, ['class' => 'form-control'], null, 'text', true) }}


           
        </div>
    </div>

    <div class="card-footer clearfix text-right">
        @include('master-component.button-form')
    </div>
</div>
{{ Form::close() }}
@endsection