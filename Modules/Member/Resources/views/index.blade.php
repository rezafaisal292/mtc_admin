@php
$segment = request()->segment(1);
@endphp
@extends('adminlte::page')

@section('title', env('APP_NAME').'::Member')

@section('content_header')
    <h1 class="m-0 text-dark">Member</h1>
@stop

@section('content')
@include('member::filter')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6" style="text-align:left">
             Total Data : {{$data->total()}} 
          </div>
          <div class="col-md-6" style="text-align:right">
            {{-- <button type="submit" class="btn btn-success btn-sm">
              <i class="fas fa-file-excel"></i>&nbsp; Export XLS
            </button>
            &nbsp;
            <button type="submit" class="btn btn-danger btn-sm">
              <i class="fas fa-file-excel"></i>&nbsp; Export PDF
            </button> --}}
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th class="col-md-2">Aksi</th>
              <th class="col-md-3">Image</th>
              <th class="col-md-2">Nama</th>
              <th class="col-md-3">Descp</th>
              <th  class="col-md-2"> TimeStamp</th>
            </tr>
          </thead>
          <tbody>
             @foreach ($data as $d)
            <tr>
              <td>
              @include('master-component.button-edit-delete')
              </td>
              <td><img src="{{asset($d->image)}}" width="30%"></td>
              <td>{{$d->name}}</td>
              <td>{{substr($d->descp,0,50)}}</td>
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
