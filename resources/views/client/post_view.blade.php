@extends('client.layouts.master')

@section('content')
<div class="col-md-9">
    <div class="card">
        <div class="card-header"> My Post</div>
        <div class="card-body">
            <div class="card m-5 ">
                <img src="{{asset($post->Images()->first()->path)}}" class="center-block" alt="..." width="100%" height="500">
                <div class="card-body">
                    <h2 class="card-title">{{$post->title}}</h2>
                    <p class="card-text">{{$post->short_description}}</p>
                        <p class="card-text">{{$post->description}}</p>
                    </div>
              </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>
@endsection