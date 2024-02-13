@extends('layouts.app')
@section('content')

<body>
    <div class="container mb-4 ">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class="active"
                    aria-current="true" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" class="active"
                    aria-current="true" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" class="active"
                    aria-current="true" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" class="active"
                    aria-current="true" aria-label="Slide 5"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" class="active"
                    aria-current="true" aria-label="Slide 6"></button>
            </div>
            <div class="carousel-inner">
                @foreach ($slides as $item)
                <div class="carousel-item {{ $loop->first ? 'active' : ''}}">
                    <img src="{{asset($item->Images()->first()->path)}}" class="d-block w-100 " alt="..."
                        style="background-size: cover" width="100%" height="450px">
                    <div class="carousel-caption d-none d-md-block text-start">
                        <h5>{{$item->title}}</h5>
                        <p>{{$item->short_description}}</p>
                        <a href="{{route('post.view',$item->id)}}"><button class="btn"
                                style="color:white; background-color: #f1403b; border-color: #f1403b;">Show More
                            </button></a>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span
                    class="visually-hidden">Previous</span></button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span
                    class="visually-hidden">Next</span></button>
        </div>
    </div>

    <main>
        <div class="container">
            <div class="row mb-2">
                @foreach ($randomCat as $post)
                <div class="col-md-6">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary">{{$post->Posts()->first()->title}}</strong>
                            <h3 class="mb-0"></h3>
                            <div class="mb-1 text-muted">Nov 12</div>
                            <p class="card-text mb-auto">{{$post->Posts()->first()->short_description}}</p>
                            <a href="{{route('post.view',$post->Posts()->first()->id)}}">Continue reading</a>
                        </div>
                        <div class="col-sm-4 col-md-12 col-lg-4">
                            <div class="ratio_360-202 image-wrapper">
                                <a href="#">
                                    <img width="220" height="250" src="{{asset($post->Posts()->first()->Images()->first()->path)}}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <section>
                <h4 class="h5 bg-secondary"><span class="bg text-white" style="font-family: Roboto,sans-serif;"> Latest
                        Post </span></h4>
                <article
                    class="card card-full hover-a py-4 post-1304 post type-post status-publish format-standard has-post-thumbnail hentry category-holiday tag-holiday tag-weekend"
                    id="post-1304">
                    <div class="row">
                        <div class="col-sm-6 col-md-12 col-lg-6">
                            <div class="ratio_360-202 image-wrapper">
                                <a href="#">
                                    <img width="650" height="250"
                                        src="{{asset($posts->last()->Images()->first()->path)}}">
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-6">
                            <div class="card-body pt-3 pt-sm-0 pt-md-3 pt-lg-0">
                                <h3 class="card-title h2 h3-sm h2-md ">
                                    <a href="{{route('post.view',$posts->last()->id)}}">{{$posts->last()->title}}</a>
                                </h3>
                                <p class="card-text">{{$posts->last()->short_description}}</p>
                                <a class="btn btn-outline-info" href="{{route('post.view',$posts->last()->id)}}">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                </article>
            </section>
            <section class="mt-5">
                <div class="row">
                    <div class="col-8">
                        <h4 class="h5 bg-secondary"><span class="bg text-white" style="font-family: Roboto,sans-serif;">
                                News </span></h4>
                        @foreach ($random as $item)
                        <article class="card card-full hover-a mb-module m-1">
                            <div class="row">
                                <div class="col-3 pr-2 pr-md-0">
                                    <div class="ratio_180-123 image-wrapper m-2">
                                        <a href="{{route('post.view',$item->id)}}"><img width="160" height="123"
                                                src="{{asset($item->Images()->first()->path)}}"></a>
                                    </div>
                                </div>
                                <div class="col-9 ">
                                    <div class="card-body pt-0 ">
                                        <!--title-->
                                        <h2 class="card-title h5 h4-sm h3-lg">
                                            <a href="{{route('post.view',$item->id)}}">{{$item->title}}</a>
                                        </h2>
                                        <!--content text-->
                                        <p class="card-text mb-2 d-none d-md-block">{{$item->short_description}}</p>
                                        <div class="card-text text-muted small">
                                            <time
                                                class="news-date">{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endforeach

                        @foreach ($randomCat2 as $post)
                        <div class="block-area mt-5">
                            <div class="block-title-6">
                                <h4 class="h5 bg-secondary"><span class="bg text-white"
                                        style="font-family: Roboto,sans-serif;">{{$post->Posts()->first()->Cats()->first()->name}}</span>
                                </h4> 
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <article class="card card-full hover-a mb-4">
                                        <div class="ratio_360-202 image-wrapper">
                                            <a href="#"><img width="100%" height="400"
                                                    src="{{asset($post->Posts()->first()->Images()->first()->path)}}"></a>
                                        </div>
                                        <div class="card-body mt-2 mb-4">
                                            <h2 class="card-title h1-sm h3-lg">
                                                <a href="{{route('post.view',$post->Posts()->first()->id)}}">{{$post->Posts()->first()->title}}</a>
                                            </h2>
                                            <div class="card-text mb-2 text-muted small">
                                                <time class="news-date"
                                                    datetime="2021-08-28T06:46:58+00:00">{{\Carbon\Carbon::parse($post->Posts()->first()->created_at)->diffForHumans()}}</time>
                                            </div>
                                            <p class="card-text">{{$post->Posts()->first()->short_description}}</p>
                                        </div>
                                    </article>
                                </div>
                    
                            </div>
                        </div>
                        @endforeach



                       













                    </div>

                    <!-- Social media-->
                    <div class="col-4  mb-4">
                        <nav id="sidebar" style="position: sticky; top: 0;">
                            <div class="border border-left d-block  bg-light" style="top: 0rem;">
                                <div class="m-lg-3 mb-lg-3">
                                    <h4 class="fst-italic mb-3">Stay Connected</h4>
                                    <a class="btn btn-primary" style="background-color: #3b5998;" href="#!"
                                        role="button"><i class="fab fa-facebook"></i> </a>
                                    <a class="btn btn-primary" style="background-color: #ac2bac;" href="#!"
                                        role="button"><i class="fab fa-instagram"> </i></a>
                                    <a class="btn btn-primary" style="background-color: #ed302f;" href="#!"
                                        role="button"><i class="fab fa-youtube"> </i></a>
                                    <a class="btn btn-primary" style="background-color: #dd4b39;" href="#!"
                                        role="button"><i class="fab fa-google"></i></a>
                                    <a class="btn btn-primary" style="background-color: #ff4500;" href="#!"
                                        role="button"><i class="fab fa-reddit-alien"></i></a>
                                    <a class="btn btn-primary" style="background-color: #43a8ec;" href="#!"
                                        role="button"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-primary" style="background-color: #b60707;" href="#!"
                                        role="button"><i class="fab fa-pinterest"></i></a>
                                </div>
                            </div>

                            <div class="border border-left d-block  bg-light mt-3 mb-3" style="top: 0rem;">
                                <div class="m-lg-3 mb-lg-3">
                                    <h4 class="fst-italic m-2">Categories</h4>
                                    <ul class="list-group list-group-flush">
                                        @foreach($category as $item)
                                        <a href="{{route('category.get',$item->id)}}"
                                            class="list-group-item list-group-item-action">{{$item->name}}</a>
                                        @endforeach
                                    </ul>

                                </div>

                            </div>

                            <div class="col-4-md mt-2">
                                <h4 class="h5 bg-secondary mt-3"><span class="bg text-white"
                                        style="font-family: Roboto,sans-serif;"> DONT MISS!</span></h4>
                                @foreach ($oldPosts as $item)
                                <a href="{{route('post.view',$item->id)}}" style="text-decoration: none; color:black">
                                    <div class="card mt-2" style="width:26rem; height: 9rem;">
                                        <div class="card-body pt-0 ">
                                            <p class="card-text  d-none d-md-block mt-2">{{$item->short_description}}
                                            </p>
                                            <div class="card-text text-muted small">
                                                <time
                                                    class="news-date">{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</time>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endforeach

                            </div>


                        </nav>
                    </div>

                </div>

            </section>
        </div>
    </main>

</body>

@endsection