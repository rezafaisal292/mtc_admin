@php
$segment = request()->segment(1);
@endphp
@extends('adminlte::page')

@section('title', env('APP_NAME').'::Master User')

@section('content_header')
<h1 class="m-0 text-dark">Master User</h1>
@stop

@section('content')

@include('masteruser::filter')

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6" style="text-align:left">
            Total Data : {{$data->total()}}
          </div>
         
          @include('master-component.button-export')
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>Aksi</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Role</th>
              <th>Timestamp</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $d)
            <tr>
              <td>
                @include('master-component.button-edit-delete')
              </td>
              <td> {{$d->name}}</td>
              <td> {{$d->email}}</td>
              <td> {{$d->roles->first()->display_name}}</td>
              <td> {{$d->updated_at}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix float-right">

        <div class="row">
          <div class="col-6">
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