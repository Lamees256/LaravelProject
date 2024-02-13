@extends('client.layouts.master')

@section('content')
<div class="col-md-9">
    <div class="card">
        <div class="card-header"> My Post</div>
        <div class="card-body">
            @if(session()->has('message_success'))
            <div class="alert alert-success">
                <strong>Success: </strong>{{session()->get('message_success')}}
            </div>
            @endif
            <table class="table table-bordered table-striped table-sm">
                <thead>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th style="width: 180px">Options</th>
                </thead>
                <tbody>
                    @if ($posts->count()==0)
                        <tr><td colspan="100%" class="text-center">No Posts</td></tr>
                    @endif
                    @foreach ($posts as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td>{{$item->Cats()->first()->name}}</td>
                            {{-- <td><a href="#">{{$item->Images()->count()}}</a></td> --}}
                            <td>@if($item->status==1)<label for="" class="badge badge-success">Published</label>@else<label for="" class="badge badge-warning">Pending</label> @endif</td>
                            <td>
                                <a href="{{route('client.post.view',$item->id)}}" class="btn btn-sm btn-primary">View</a>
                                <a href="{{route('client.post.edit', $item->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{route('client.post.delete', $item->id)}}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
@endsection