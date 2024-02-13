@extends('admin.layouts.master')

@section('content')
<section class="content-header">
    <h1>
        Edit Post
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
            <label for="">Edit Post</label>
        </div>
        <div class="box-body">
            
           <form action="{{route('admin.post.update', $post->id)}}" method="POST">
               @csrf
               {{-- <div class="form-group @error('category') has-error @enderror">
                <label>Category</label>
                <select name="category" id="category" class="form-select me-2" style="100px">
                    @foreach ($categories as $item)
                        <option value="{{$item->id}}" >{{$item->name}}</option>
                    @endforeach
                </select>
            </div> --}}
                <div class="form-group">
                    <label for="category"> Category </label>
                    <select name="category" id="category" class="form-control">
                        @foreach ($categories as $item)
                            <option value="{{$item->id}}" @if ($item->id==$post->category_id) selected @endif>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group @error('name') has-error @enderror">
                    <label>Title</label>
                    <input type="text" class="form-control" name="name" value="{{old('name',$post->title)}}" placeholder="Enter Name">
                    @error('name')
                    <span class="help-block" role="alert">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group @error('short_description') has-error @enderror">
                    <label>Short Description</label>
                    <input type="text" class="form-control" name="short_description" value="{{old('short_description',$post->short_description)}}">
                    @error('name')
                    <span class="help-block" role="alert">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group @error('description') has-error @enderror">
                    <label>Description</label>
                    <input type="textarea" class="form-control" name="description" value="{{old('description',$post->description)}}" placeholder="Enter Name">
                    @error('name')
                    <span class="help-block" role="alert">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
                </div>
                
            
                <div class="form-group">
                    <button class="btn btn-primary"> Edit </button>
                </div>
           </form>
        </div>
    </div>

    
    
    
</section>
@endsection
