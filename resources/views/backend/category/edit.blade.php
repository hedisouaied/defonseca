@extends('backend.layouts.master')


@section('content')


<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-9">
                <div class="box-content card white">
                    <h4 class="box-title">Edit Category</h4>
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
                        <form action="{{route('category.update',$category->id)}}" method="POST">
                            @csrf
                            @method('patch')

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" value="{{$category->title}}" name="title">
                            </div>

                            <div class="m-t-20">
                                <label for="">Is parent: <span class="text-danger">*</span></label>

                                <input id="is_parent" type="checkbox" name="is_parent" value="{{$category->is_parent}}" {{$category->is_parent==1 ? 'checked' : ''}}>Yes
                            </div>

                            <div class="form-group margin-bottom-20 {{$category->is_parent==1 ? 'display-none' : ''}}" id="parent_cat_div">
                                <label for="parent_id">Parent Category</label>
                                <select class="form-control" name="parent_id">
                                        <option value="">-- Parent Category ---</option>
                                    @foreach ($parent_cats as $pcats)
                                        <option value="{{$pcats->id}}" {{$pcats->id==$category->parent_id ? 'selected' : ''}}>{{$pcats->title}}</option>
                                    @endforeach
                                </select>
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

  <script>
    $('#is_parent').change(function(e){
        e.preventDefault();
        var is_checked=$('#is_parent').prop('checked');
        // alert(is_checked);
        if(is_checked){
            $('#parent_cat_div').addClass('display-none');
            $('#parent_cat_div').val('');
            $('#is_parent').val('1');
        }
        else {
            $('#parent_cat_div').removeClass('display-none');
            $('#is_parent').val('0');
        }
    });
</script>
@endsection
