@extends('layouts.app')
@section('content')
<div class="container" style="min-height: 50px">
    <div class="card mt-3">
        <div class="card-body">
            Category : {{$category->name}} <label class="float-end">Posts :
                {{$category->Posts()->where('status',1)->count()}}</label>
        </div>
    </div>

</div>

<div class="container mt-3">
    <div class="card">
        <div class="body">
            @if($category->Posts()->where('status',1)->count()==0)
            <h1 class="card-title mb-4 mt-4 text-center ">No Posts</h1>
            @else
            @foreach ($category->Posts()->where('status',1)->orderBy('id','desc')->get() as $item)
            <div class="col-md-12">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">{{$item->Cats()->first()->name}}</strong>
                        <h3 class="mb-0">{{$item->title}}</h3>
                        <div class="card-text text-muted small">
                            <time class="news-date">{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</time>
                        </div>
                        <p class="mb-auto">{{$item->short_description}}</p>
                        <a href="{{route('post.view',$item->id)}}" class="stretched-link"></a>
                    </div>
                    <div class="col-sm-4 col-md-12 col-lg-4">
                        <!--thumbnail-->
                        <div class="ratio_360-202 image-wrapper">
                            <a href="{{route('post.view',$item->id)}}"><img width="400" height="250"
                                    src="{{asset($item->Images()->first()->path)}}"></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            </table>
        </div>
    </div>
</div>

@endsection