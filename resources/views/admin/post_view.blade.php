@extends('admin.layouts.master')
@section('content')
<section class="content-header">
</section>

<section class="content container-fluid">

    @if (session()->has('message_success'))
        <div class="alert alert-success"><strong> Success: </strong>{{session()->get('message_success')}}</div>
    @endif
    @if (session()->has('message_error'))
        <div class="alert alert-danger"><strong> Error: </strong>{{session()->get('message_error')}}</div>
    @endif


    {{-- <div class="container mb-3" style="padding: 2px 16px">
        <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s; ">
            <img src="{{asset($post->Images()->first()->path)}}" alt="Cover" style="width:700px; border-radius: 5px 5px 0 0" width="400" height="400">
            <div class="container mb-3">
              <h3><b>{{$post->title}}</b>  {{$post->Category()->first()->name}}</h3>
              <p>by:  {{$post->Client->name}}</p>
               
                    <p>{{$post->description}}</p>
              
            </div>
                <a href="{{route('admin.post.publish',$post->id)}}" class="btn btn-info btn-sm pull-right">Publish</a>
          </div>
    </div> --}}


    <div class="card mt-2 ">
        <div class="card-body">
            <h1 class="card-title mb-4 mt-4 text-center "> {{$post->Category()->first()->name}}</h1>
        </div>
    </div>
    <div class="card m-5 ">
        <img src="{{asset($post->Images()->first()->path)}}" class="center-block" alt="..." width="80%" height="500">
        <div class="card-body">
            <h2 class="card-title">{{$post->title}}</h2>
            <p class="card-text">{{$post->short_description}}</p>
                <p class="card-text">{{$post->description}}</p>
            </div>
            <a href="{{route('admin.post.publish',$post->id)}}" class="btn btn-info btn-sm pull-right">Publish</a>
      </div>
            {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
        </div>
    </div>
   
 
</section>
@endsection
