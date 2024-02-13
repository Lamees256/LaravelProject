@extends('admin.layouts.master')

@section('content')
<section class="content-header">
    <h1>
        Posts
    </h1>
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
            <label for="">Posts</label>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Client Name</th>
                    <th>Short Description</th> 
                    <th>Category</th>
                    <th style="width: 180px">options</th>
                </thead>
                <tbody>
                    @if ($post->count()==0)
                        <tr>
                            <td colspan="100%" class="text-center">No Posts</td>
                        </tr>
                    @endif
                    @foreach ($post as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->Client->name}}</td>
                            <td>{{$item->short_description}}</td>
                            <td>{{$item->Category()->first()->name}}</td>
                            <td><a href="{{route('admin.post.view', $item->id)}}" class="btn btn-success btn-sm">View</a><a href="{{route('admin.post.edit', $item->id)}}" class="btn btn-info btn-sm">Edit</a><a href="{{route('admin.post.delete', $item->id)}}" class="btn btn-danger btn-sm">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
    
    
</section>
@endsection
