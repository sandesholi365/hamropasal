@extends('admin.layouts.master')
@section('content')
<div class="page-content">
    <div class="col-lg-12">
        @include('admin.layouts.notification')
        </div>

    <div class="card">
        <div class="card-body d-lg-flex align-items-center">
            <div class="position-relative">
                <h6 class="mb-0 text-uppercase">Total Products : {{\App\Models\Product::count()}}</h6>
            </div>
          <div class="ms-auto"><a href="{{route('product.create')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Create a new product</a></div>
        </div>
        <div class="card-body border border-primary">
            <div class="table-responsive">
                <table id="allproduct" class="table table-striped table-bordered">
                    <thead class="table-primary border">
                        <tr style="text-align: center; vertical-align: middle;">
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Photo</th>
                            <th>Price (in Rs.)</th>
                            <th>Discount (%)</th>
                            <th>Size</th>
                            <th>Condition</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr style="text-align: center; vertical-align: middle;">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->title }}</td>
                            <td><img src="{{$product->photo }}" style="max-height: 50px; max-width:50px"></td>
                            <td>Rs. {{number_format($product->price,2)}}</td>
                            <td>{{$product->discount}}%</td>
                            <td>{{$product->size}}</td>
                            <td>
                                @if($product->conditions=='new')
                                <button type="button" class="btn btn-success btn-sm px-2">{{ $product->conditions }}</button>
                                @elseif ($product->conditions=='popular')
                                <button type="button" class="btn btn-warning btn-sm px-2">{{ $product->conditions }}</button>
                                @else
                                <button type="button" class="btn btn-info btn-sm px-2">{{ $product->conditions }}</button>
                                @endif
                            </td>
                            <td>
                                <input type="checkbox" name="toggle" value={{ $product->id }} data-size="sm" data-toggle="toggle" {{$product->status=='active' ? 'checked':''}} data-on="Active" data-off="Inactive" data-onstyle="danger" data-offstyle="dark">
                            </td>
                            <td>
                                <div class="d-flex order-actions justify-content-center">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#showID{{$product->id}}" title="view" class="btn-sm btn-primary" data-placement="button"><i class="lni lni-eye"></i></a>&nbsp;
                                <a href="{{route('product.edit', $product->id)}}" data-toggle="tooltip" title="edit" class="btn-sm btn-warning" data-placement="button"><i class="bx bxs-edit"></i></a>&nbsp;
                                <form action="{{route('product.destroy',$product->id)}}" method="POST">
                                    @csrf
                                    @method('Delete')
                                    <a href="" data-toggle="tooltip" title="delete" class="dltbtn btn-sm btn-danger" data-id="{{$product->id}}" data-placement="button"><i class="bx bxs-trash"></i></a>
                                </form>
                            </div>
                            </td>
                            <div class="modal fade" id="showID{{$product->id}}">
                              <div class="modal-dialog modal-xl">
                                    @php
                                    $productss=\App\Models\Product::where('id',$product->id)->first();
                                    @endphp
                                  <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">{{\Illuminate\Support\Str::upper($productss->title)}}</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <strong>Summary: </strong>
                                        <p>{!! html_entity_decode($productss->summary)!!}</p>  
                                        
                                        <strong>Description: </strong>
                                        <p>{!! html_entity_decode($productss->description)!!}</p>  

                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong>Price: </strong>
                                                <p>Rs. {!! number_format($productss->price,2)!!}</p>  
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Offer Price: </strong>
                                                <p>Rs. {!! number_format($productss->offerprice,2)!!}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Discount: </strong>   
                                                <p>{{$productss->discount}}%</p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Category: </strong>
                                                <p>{{\App\Models\Category::where('id',$product->cat_id)->value('title')}}</p>  
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Child Category: </strong>
                                                <p>{{\App\Models\Category::where('id',$product->child_cat_id)->value('title')}}</p>  
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Brand </strong>
                                                <p>{{\App\Models\Brand::where('id',$product->brand_id)->value('title')}}</p>  
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Size: </strong>
                                                <p class="badge bg-success">{{($productss->size)}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Conditions: </strong>
                                                <p class="badge bg-danger">{{($productss->conditions)}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Status: </strong>
                                                <p class="badge bg-primary">{{($productss->status)}}</p>
                                            </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                              </div>
                            </div>
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
        var table = $('#allproduct').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print']
        } );
     
        table.buttons().container()
            .appendTo( '#allproduct_wrapper .col-md-6:eq(0)' );
    } );
</script>
<script>
    $('input[name=toggle]').change(function(){
        var mode=$(this).prop('checked');
        var id=$(this).val();
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