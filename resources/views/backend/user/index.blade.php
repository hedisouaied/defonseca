@extends('backend.layouts.master')


@section('content')

<style>
    .modal-backdrop {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 0;
        background-color: #000;
    }
</style>

<div class="main-content">
<div class="col-lg-12">
    @include('backend.layouts.notification')
</div>
    <table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
            <tr>
                <th>S.N</th>
                <th>Photo</th>
                <th>Full name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>S.N</th>
                <th>Photo</th>
                <th>Full name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($users as $item)



                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><img src="{{$item->photo}}" alt="{{$item->title}}" style="width:100px;border-radius:50%;" /></td>
                    <td>{{$item->full_name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->role}}</td>
                    <td>
                        <div class="switch success">

                           <input name="toogle" value="{{$item->id}}" type="checkbox" {{$item->status=='active' ? 'checked': ''}} id="switch-{{$item->id}}">
                            <label for="switch-{{$item->id}}">active</label>
                        </div>
                    </td>
                    <td>

                    <form action="{{route('user.destroy',$item->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="button" data-id="{{$item->id}}" class="float-left dltBtn btn btn-danger btn-sm waves-effect waves-light" style="color:#fff;background-color:#000;"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                    <a class="float-left" title="view" href="javascript:void(0);" data-toggle="modal" data-target="#userID{{$item->id}}"><i class="btn btn-secondary btn-sm waves-effect waves-light fas fa-eye" aria-hidden="true"></i></a>


                        <a class="float-left" href="{{route('user.edit',$item->id)}}"><i class="btn btn-warning btn-sm waves-effect waves-light fas fa-pencil-alt" aria-hidden="true"></i></a>
                    </td>

                    <div class="modal fade" id="userID{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        @php
                            $user=\App\Models\User::where('id',$item->id)->first();
                        @endphp
                            <div class="modal-content">
                                <div class="text-center">
                                    <img src="{{$user->photo}}" alt="{{$user->full_name}}" style="border-radius: 50%;margin: 6% 0;">
                                </div>
                                <div class="modal-header">
                                <h5 class="modal-title text-center" id="exampleModalLongTitle">{{$user->full_name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <strong>Username:</strong>
                                <p>{{$user->username}}</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Email:</strong>
                                        <p>{{$user->email}}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Phone:</strong>
                                        <p>{{$user->phone}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Address:</strong>
                                        <p>{{$user->address}}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Role:</strong>
                                        <p>{{$user->role}}</p>
                                    </div>
                                </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>Status:</strong>
                                            <p class="label label-warning">{{$user->status}}</p>
                                        </div>
                                    </div>
                    </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
            var dataID=$(this).data('id');
            e.preventDefault();

            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                    swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
                });
        });
</script>

    <script>
        $('input[name=toogle]').change(function(){
            var mode = $(this).prop('checked');
            var id = $(this).val();
            //alert(id);
            $.ajax({
                url:"{{route('user.status')}}",
                type:"POST",
                data:{
                    _token:'{{csrf_token()}}',
                    mode:mode,
                    id:id,
                },
                success:function(response){
                    if(response.status){
                        alert(response.msg);
                    }
                    else{
                        alert('Please try again!');
                    }
                }
            });
        });
    </script>

@endsection
