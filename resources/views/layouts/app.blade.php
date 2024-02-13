<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  @yield('css')
  </head>
<body>
      <div class="container" style="position: relative; min-height: 100vh">
        <header class="blog-header py-1 ">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="container pb-1  border-bottom">
                    <a class="navbar-brand" href="{{route('index')}}">
                      <i class="fas fa-home"></i>
                        3AZ BLOG</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                            <li class="" style="465px">
                                <form class="d-flex" method="get" action="{{route('post.search')}}" style="min-width: 474px">
                                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                                    <select name="cats" id="category" class="form-select me-2" style="100px">
                                        <option value="">Categories</option>
                                      @foreach ($categories as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                  </form>
                              </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        @yield('content')
    </div>
      
      <footer class="bg-light text-center text-lg-start mt-5">
        <div class="text-center p-3" style="background-color:white; position:relative; bottom:0; width:100%;">
          ©️ 2020 Copyright:
          <a class="text-dark" href="#">3AZBlog.com</a>
        </div>
      </footer>
        {{-- <footer class="bg-light text-center text-lg-start mt-5">
          <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            ©️ 2020 Copyright:
            <a class="text-dark" href="#">3AZBlog.com</a>
          </div>
        </footer> --}}
    
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@yield('script')
</body>
</html>