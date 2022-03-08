@php
$segment = request()->segment(1);
@endphp
@extends('adminlte::page')

@section('title', env('APP_NAME') . '::Memberdetail')

@section('content_header')
    <h1 class="m-0 text-dark">
        Memberdetail</h1>
@stop

@section('content')
    @include('memberdetail::filter')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6" style="text-align:left">
                            Total Data : {{ $data->total() }}
                        </div>

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="col-md-1">Aksi</th>
                                <th class="col-md-2">Member</th>
                                <th class="col-md-2">Url</th>
                                <th class="col-md-2">Image</th>
                                <th class="col-md-2">Descp</th>
                                <th class="col-md-1">Status</th>
                                <th class="col-md-2">Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>
                                        @include(
                                            'master-component.button-edit-delete'
                                        )
                                    </td>

                                    <td>{{ $d->member->name }}</td>
                                    <td>{{ $d->url }}</td>
                                    <td>
                                        @if ($d->image != null)
                                            <img src="{{ asset($d->image) }}" width="30%">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ substr($d->descp, 0, 50) }}</td>
                                    <td>{{ $status[$d->status] }}</td>
                                    <td>{{ formatDate($d->updated_at) }}</td>
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
