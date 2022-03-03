@php
$segment = request()->segment(1);
@endphp
@extends('adminlte::page')

@section('title', env('APP_NAME').'::Membersosmed')

@section('content_header')
    <h1 class="m-0 text-dark">Membersosmed</h1>
@stop

@section('content')
@include('membersosmed::filter')
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
              <th class="col-md-2">Aksi</th>
              <th class="col-md-2">image</th>
              <th class="col-md-2">Member</th>
              <th class="col-md-2">Sosmed</th>
              <th class="col-md-2">Url</th>
              <th class="col-md-2">TimeStamp</th>
            </tr>
          </thead>
          <tbody>
             @foreach ($data as $d)
            <tr>
              <td>
              @include('master-component.button-edit-delete')
              </td>

              <td><img src="{{asset($d->sosmeds->image)}}" width="20%"></td>
              <td>{{$d->members->name}}</td>
              <td>{{$d->sosmeds->name}}</td>
              <td>{{$d->url}}</td>
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
