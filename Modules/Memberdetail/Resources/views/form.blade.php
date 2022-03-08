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
{{ Form::open(['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-data', 'autocomplete' => 'off','enctype' => 'multipart/form-data']) }}
<div class="card card-primary">
    <div class="card-header">
        {{$title}} Data Memberdetail
    </div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-md-6">

                {{ Form::fgSelect('Member', 'id_member', $member,$d->id_member, ['class' => 'form-control'], null, 'text', true) }}
                {{ Form::fgText('Url', 'url', $d->url, ['class' => 'form-control'], null, 'text', true) }}
                {{ Form::fgSelect('Status', 'status', $status,$d->status, ['class' => 'form-control'], null, 'text', true) }}
               
                <div class="form-group">
                    <b>File Image</b><br />
                    {{$d->images}}
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
@endsection