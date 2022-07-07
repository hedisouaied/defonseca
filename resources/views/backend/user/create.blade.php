@extends('backend.layouts.master')


@section('content')


<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-9">
                <div class="box-content card white">
                    <h4 class="box-title">Add User</h4>
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
                        <form action="{{route('user.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Full name</label>
                                <input type="text" class="form-control" placeholder="Full name" value="{{old('full_name')}}" name="full_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" class="form-control" placeholder="Username" value="{{old('username')}}" name="username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control" placeholder="Email" value="{{old('email')}}" name="email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control" placeholder="Password" value="{{old('password')}}" name="password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" class="form-control" placeholder="Phone" value="{{old('phone')}}" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" class="form-control" placeholder="Address" value="{{old('address')}}" name="address">
                            </div>

                            <div class="m-t-20">
                                <label>Photo</label>

                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                      </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="photo">
                                  </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                            </div>

                            <div class="form-group margin-bottom-20">
                                <label for="exampleInputEmail1">Role</label>
                                <select class="form-control" name="role">
                                        <option value="admin" {{old('role')=='admin' ? 'selected' : ''}}>Admin</option>
                                        <option value="customer" {{old('role')=='customer' ? 'selected' : ''}}>Customer</option>
                                        <option value="vendor" {{old('role')=='vendor' ? 'selected' : ''}}>Vendor</option>
                                </select>
                            </div>

                            <div class="form-group margin-bottom-20">
                                <label for="exampleInputEmail1">Status</label>
                                <select class="form-control" name="status">
                                        <option value="active" {{old('status')=='active' ? 'selected' : ''}}>Active</option>
                                        <option value="inactive" {{old('status')=='inactive' ? 'selected' : ''}}>Inactive</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Submit</button>
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
