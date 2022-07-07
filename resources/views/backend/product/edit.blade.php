@extends('backend.layouts.master')


@section('content')


<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-9">
                <div class="box-content card white">
                    <h4 class="box-title">Edit product</h4>
                    <!-- /.box-title -->
                    <div class="col-md-12">

                        @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)

                                        <li>{{$error}}</li>

                                        @endforeach

                                    </ul>
                                </div>
                        @endif
                    </div>
                    <div class="card-content">
                        <form action="{{route('product.update',$product->id)}}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" value="{{$product->title}}" name="title">
                            </div>
                            <div class="m-t-20">
                                <label for="exampleInputEmail1">Description</label>

                                <textarea name="description" id="description" class="form-control" maxlength="225" rows="2" placeholder="Write some text....">{{$product->description}}</textarea>
                            </div>
                            <div class="m-t-20">
                                <label>Photo</label>

                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                      </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$product->photo}}">
                                  </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                            </div>
                            <div class="form-group margin-bottom-20">
                                <label for="exampleInputEmail1">Category</label>
                                <select id="cat_id" class="form-control" name="cat_id">
                                    <option value="">--Category--</option>
                                    @foreach (\App\Models\Category::where('is_parent',1)->get() as $cat)
                                    <option value="{{$cat->id}}" {{$cat->id==$product->cat_id? 'selected': ''}}>{{$cat->title}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div id="child_cat_div" class="form-group margin-bottom-20 display-none">
                                <label for="exampleInputEmail1">Child category</label>
                                <select id="child_cat_id" class="form-control" name="child_cat_id">

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price</label>
                                <input type="number" step="any" class="form-control" placeholder="Price" value="{{$product->price}}" name="price">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Update</button>
                        </form>
                    </div>
                    <!-- /.card-content -->
                </div>
                <!-- /.box-content -->
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.main-content -->
</div>

@endsection

@section('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>

<script>
    $(document).ready(function() {
        $('#description').summernote();
    });
  </script>

  <script>
      var child_cat_id={{$product->child_cat_id}};
      $('#cat_id').change(function(){
        var cat_id=$(this).val();
       // alert(cat_id);
        if(cat_id != null){
            $.ajax({
                url: "/admin/category/"+cat_id+"/child",
                type: "POST",
                data:{
                    _token:"{{csrf_token()}}",
                    cat_id:cat_id
                },
                success:function(response){
                    if(response.status){
                        html_option ="";
                        $('#child_cat_div').removeClass('display-none');
                        $.each(response.data,function(id,title){
                            html_option +="<option value='"+id+"' "+(child_cat_id==id ? 'selected' : '')+">"+title+"</option>"
                        });
                    }
                    else{
                        $('#child_cat_div').addClass('display-none');
                    }
                    $('#child_cat_id').html(html_option);
                }
            })
        }


      });
      if(child_cat_id !=null){
         $('#cat_id').change();
     }
  </script>
@endsection
