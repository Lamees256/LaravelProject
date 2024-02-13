@extends('admin.layouts.master')

@section('content')
<section class="content-header">
    <h1>
        Clients
    </h1>
    <ol class="breadcrumb">
        <li class="active"> Clients </li>
    </ol>
</section>

<section class="content container-fluid">

    @if (session()->has('message_success'))
        <div class="alert alert-success"><strong> Success: </strong>{{session()->get('message_success')}}</div>
    @endif
    @if (session()->has('message_error'))
        <div class="alert alert-danger"><strong> Error: </strong>{{session()->get('message_error')}}</div>
    @endif

    <div class="box box-danger">
        <div class="box-header">
            <label for="">Clients</label>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>#</th>
                    <th>name</th>
                    <th>email</th>
                    <th style="width: 120px">options</th>
                </thead>
                <tbody>
                    @foreach ($clients as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td><a href="{{route('admin.clients.edit', $item->id)}}" class="btn btn-info btn-sm">Edit</a><a href="{{route('admin.clients.delete', $item->id)}}" class="btn btn-danger btn-sm">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
    
    
</section>
@endsection
