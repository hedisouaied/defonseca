@extends('backend.layouts.master')


@section('content')


<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-9">
                <div class="box-content card white">
                    <h4 class="box-title">Edit User</h4>
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
                        <form action="{{route('user.update',$user->id)}}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Full name</label>
                                <input type="text" class="form-control" placeholder="Full name" value="{{$user->full_name}}" name="full_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" class="form-control" placeholder="Username" value="{{$user->username}}" name="username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control" placeholder="Email" value="{{$user->email}}" name="email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" class="form-control" placeholder="Phone" value="{{$user->phone}}" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" class="form-control" placeholder="Address" value="{{$user->address}}" name="address">
                            </div>

                            <div class="m-t-20">
                                <label>Photo</label>

                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                      </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$user->photo}}">
                                  </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                            </div>

                            <div class="form-group margin-bottom-20">
                                <label for="exampleInputEmail1">Role</label>
                                <select class="form-control" name="role">
                                        <option value="admin" {{$user->role=='admin' ? 'selected' : ''}}>Admin</option>
                                        <option value="customer" {{$user->role=='customer' ? 'selected' : ''}}>Customer</option>
                                        <option value="vendor" {{$user->role=='vendor' ? 'selected' : ''}}>Vendor</option>
                                </select>
                            </div>

                            <div class="form-group margin-bottom-20">
                                <label for="exampleInputEmail1">Status</label>
                                <select class="form-control" name="status">
                                        <option value="active" {{$user->status=='active' ? 'selected' : ''}}>Active</option>
                                        <option value="inactive" {{$user->status=='inactive' ? 'selected' : ''}}>Inactive</option>
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
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>

@endsection
