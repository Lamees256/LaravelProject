@extends('admin.layouts.master')

@section('content')
<section class="content-header">
    <h1>
        Dashboard
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
            <label for="">Create a New Category</label>
        </div>
        <div class="box-body">
            
           <form action="{{route('admin.category.update', $category->id)}}" method="POST">
               @csrf
                <div class="form-group @error('name') has-error @enderror">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name',$category->name)}}" placeholder="Enter Name">
                    @error('name')
                    <span class="help-block" role="alert">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group @error('password') has-error @enderror">
                    <label>Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" @if(old('status',1)==1) selected @endif>Active</option>
                        <option value="0" @if(old('status',1)==0) selected @endif>Deactive</option>
                    </select>
                    @error('password')
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
