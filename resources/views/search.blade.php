@extends('layouts.app')
@section('content')

<div class="card mb-4 mt-2 bg-secondary">
    <div class="card-body">
        @if($posts->count()==0)
        <h1 class="card-title mb-4 mt-4 text-center ">No Posts Yet</h1>
        @else
        @endif
    </div>
</div>
@foreach ($posts as $item)
<div class="col-md-12">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-secondary">{{$item->Cats()->first()->name}}</strong>
            <h3 class="mb-0">{{$item->title}}</h3>
            <div class="card-text text-muted small">
                <time class="news-date">{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</time>
            </div>
            <p class="mb-auto">{{$item->short_description}}</p>
            <a href="{{route('post.view',$item->id)}}" class="stretched-link"><button
                    class="btn btn-primary btn-sm">Continue</button></a>
        </div>
        <div class="col-sm-4 col-md-12 col-lg-4">
            <div class="ratio_360-202 image-wrapper">
                <img width="400" height="250" src="{{asset($item->Images()->first()->path)}}">
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection