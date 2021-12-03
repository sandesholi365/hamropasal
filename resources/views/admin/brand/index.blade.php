@extends('admin.layouts.master')
@section('content')
<div class="page-content">
    <div class="col-lg-12">
        @include('admin.layouts.notification')
        </div>

    <div class="card">
        <div class="card-body d-lg-flex align-items-center">
            <div class="position-relative">
                <h6 class="mb-0 text-uppercase">Total Brands : {{\App\Models\Brand::count()}}</h6>
            </div>
          <div class="ms-auto"><a href="{{route('brand.create')}}" class=" btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Create a new brand</a></div>
        </div>
        <div class="card-body border border-primary">
            <div class="table-responsive">
                <table id="allbrand" class="table table-striped table-bordered">
                    <thead class="table-primary border">
                        <tr style="text-align: center; vertical-align: middle;">
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                        <tr style="text-align: center; vertical-align: middle;">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $brand->title }}</td>
                            <td>{{ $brand->slug }}</td>
                            <td><img src="{{$brand->photo }}" style="max-height: 50px; max-width:50px"></td>
                            <td>
                                <input type="checkbox" name="toggle" value={{ $brand->id }} data-size="sm" data-toggle="toggle" {{$brand->status=='active' ? 'checked':''}} data-on="Active" data-off="Inactive" data-onstyle="danger" data-offstyle="dark">
                            </td>
                            <td>
                                <div class="d-flex order-actions justify-content-center">
                                <a href="{{route('brand.edit', $brand->id)}}" data-toggle="tooltip" title="edit" class="btn-sm btn-warning" data-placement="button"><i class="bx bxs-edit"></i></a>&nbsp;
                                <form action="{{route('brand.destroy',$brand->id)}}" method="POST">
                                    @csrf
                                    @method('Delete')
                                    <a href="" data-toggle="tooltip" title="delete" class="dltbtn btn-sm btn-danger" data-id="{{$brand->id}}" data-placement="button"><i class="bx bxs-trash"></i></a>
                                </form>
                            </div>
                            </td>
                        </tr>  
                        @endforeach  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        var table = $('#allbrand').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print']
        } );
     
        table.buttons().container()
            .appendTo( '#allbrand_wrapper .col-md-6:eq(0)' );
    } );
</script>
<script>
    $('input[name=toggle]').change(function(){
        var mode=$(this).prop('checked');
        var id=$(this).val();
    $.ajax({
        url:"{{route('brand.status')}}",
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
                alert('Please try again.')
            }
        }
            })
      });
</script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
    $('.dltbtn').click(function(e){
        var form=$(this).closest('form');
        var dataID=$(this).data('id');
        e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                form.submit();
                swal("Your data has been deleted successfully!", {
                icon: "success",
                });
            } else {
                swal("Your data is safe!");
            }
        });
    })
</script>
@endsection