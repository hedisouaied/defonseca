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
                <th>Title</th>
                <th>Photo</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Photo</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($products as $item)

@php
$photo= explode(',',$item->photo);
@endphp

                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->title}}</td>
                    <td><img src="{{$photo[0]}}" alt="{{$item->title}}" style="width:100px;" /></td>
                    <td>$ {{number_format($item->price,2)}}</td>
                    <td>
                        <div class="switch success">

                           <input name="toogle" value="{{$item->id}}" type="checkbox" {{$item->status=='active' ? 'checked': ''}} id="switch-{{$item->id}}">
                            <label for="switch-{{$item->id}}">active</label>
                        </div>
                    </td>
                    <td>

                    <form action="{{route('product.destroy',$item->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="button" data-id="{{$item->id}}" class="float-left dltBtn btn btn-danger btn-sm waves-effect waves-light" style="color:#fff;background-color:#000;"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                        <a class="float-left" href="{{route('product.edit',$item->id)}}"><i class="btn btn-warning btn-sm waves-effect waves-light fas fa-pencil-alt" aria-hidden="true"></i></a>
                    </td>


    
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
                url:"{{route('product.status')}}",
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
