@extends('client.layouts.master')

@section('content')
<div class="col-md-9">
    <div class="card">
        <div class="card-header"> Create New Post</div>
        <form action="{{route('client.post.store')}}" method="POST" enctype="multipart/form-data">
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
                           <input type="text" name="title" id="title" class="form-control">
                       </div>
                   </div>
                   <div class="col-md-4">
                    <div class="form-group">
                        <label for="category"> Category </label>
                        <select name="category" id="category" class="form-control">
                            @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="short_description"> Short Description </label>
                        <input type="text" name="short_description" id="short_description" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Description </label>
                        <textarea type="text" name="description" id="description" cols="30" row="6" class="form-control"></textarea>
                    </div>
                </div>

                <div class="col-md-12" id="MoreContent">
                    <div class="form-group">
                        <label for="title"> Images </label>
                        <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="images[]" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                              <label class="custom-file-label" for="inputGroupFile04">Choose Image</label>
                            </div>
                          </div>
                    </div>
                </div>
                {{-- <div class="col-md-12 text-right">
                    <button type="button" onclick="AddMore()" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add More</button>
                </div> --}}
               </div>
            </div>
               <div class="card-footer">
                   <button type="submit" class="btn btn-info"> Create </button>
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
    </script>
@endsection