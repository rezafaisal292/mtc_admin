@php
$segment = request()->segment(1);
@endphp
@extends('adminlte::page')


@section('title', env('APP_NAME').'::Services')

@section('content_header')
    <h1 class="m-0 text-dark">Services</h1>
@stop

@section('content')
@include('services::filter')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6" style="text-align:left">
             Total Data : {{$data->total()}} 
          </div>
          
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>Aksi</th>
              <th>Icon</th>
              <th>Label</th>
              <th>Descp</th>
              <th>Status</th>
              <th>Timestamp</th>
            </tr>
          </thead>
          <tbody>
             @foreach ($data as $d)
            <tr>
              <td>
              @include('master-component.button-edit-delete')
              </td>
              <td>{!! $d->icon !!}</td>
              <td>{{$d->label}}</td>
              <td>{{substr($d->descp,0,50)}}</td>
              <td>{{$status[$d->status]}}</td>
              <td>{{formatDate($d->updated_at)}}</td>
            </tr>
            @endforeach 
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix float-right">

        <div class="row">
          <div class="col-6">

            {{ $data->links() }}
          </div>
          <div class="col-6 text-right">
           
              @include('master-component.button-add')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
