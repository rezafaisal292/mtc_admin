@php
$segment = request()->segment(1);
@endphp
@extends('adminlte::page')

@section('title', env('APP_NAME').'::Produk')

@section('content_header')
    <h1 class="m-0 text-dark">Produk</h1>
@stop

@section('content')
@include('produk::filter')
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
              <th>Url</th>
              <th>Image</th>
              <th>Label</th>
              <th>Descp</th>
              <th>Member</th>
              <th>Services</th>
              <th>Tipe</th>
              <th>Status</th>
              <th>TimeStamp</th>
            </tr>
          </thead>
          <tbody>
             @foreach ($data as $d)
            <tr>
              <td>
              @include('master-component.button-edit-delete')
              </td>
              <td>{{$d->url}}</td>
              <td>{{$d->image}}</td>
              <td>{{$d->label}}</td>
              <td>{{substr($d->descp,0,30)}}</td>
              <td>{{!$d->members  ? '-': $d->members->name}}</td>
              <td>{{!$d->service  ? '-': $d->service->label }}</td>
              <td>{{!$d->tipe_produk ? '-': $tipe_produk[$d->tipe_produk]}}</td>
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
