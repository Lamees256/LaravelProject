@extends('client.layouts.master')

@section('content')
<div class="col-md-9">
    <div class="card">
        <div class="card-header"> Edit Post</div>
        <form action="{{route('client.post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            @if(session()->has('message_success'))
            <div class="alert alert-success">
                <strong>Success: </strong>{{session()->get('message_success')}}
            </div>
            @endif
               @csrf
               <div class="row">
                   <div class="col-md-8">
                       <div class="form-group">
                           <label for="title"> Title </label>
                           <input type="text" name="title"value="{{old('title',$post->title)}}" id="title" class="form-control">
                       </div>
                   </div>
                   <div class="col-md-4">
                    <div class="form-group">
                        <label for="category"> Category </label>
                        <select name="category" id="category" class="form-control">
                            @foreach ($category as $item)
                                <option value="{{$item->id}}" @if ($item->id==$post->category_id) selected @endif>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Short Description</label>
                        <input type="text" class="form-control" name="short_description" value="{{old('name',$post->short_description)}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="text" cols="50" rows="6" class="form-control" name="description">{{old('name',$post->description)}}</textarea>
                    </div>


                <div class="col-md-12" id="MoreContent">
                    <table class="table table-bordered">
                        <thead>
                            <th>Images</th>
                            <th style="width: 80px">Options</th>
                        </thead>
                        <tbody>
                            
                            {{-- @if($item->Images()->count()==1) --}}
                            @foreach ($post->Images()->get() as $item)
                            @if ($post->Images()->count()==1)
                            <tr>
                                <td><img src="{{asset($item->path)}}" style="width: 120px; height:120px" alt=""></td>
                                <td><button class="btn btn-sm btn-danger" onclick="DeleteImage(event);AddMore()">Delete</button></td>
                            </tr>                          
                            @endif
                                                   
                            @endforeach
                        
                        </tbody>
                    </table>
                </div>
               </div>
            </div>
               <div class="card-footer">
                   <button type="submit" class="btn btn-info"> Edit </button>
               </div>
      
    </form>
    </div>
</div>
</div>
</div>
@endsection

@section('script')
    <script>
        function AddMore(){
            var tmp='<div class="form-group"><label for="title"> Images </label><div class="input-group"><div class="custom-file"><input type="file" name="images[]" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"><label class="custom-file-label" for="inputGroupFile04">Choose Image</label></div></div></div>';
            $('#MoreContent').append(tmp);
            $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
        }
        $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    function DeleteImage(){
        $(event.target).closest('tr').remove();
    }

    </script>
@endsection