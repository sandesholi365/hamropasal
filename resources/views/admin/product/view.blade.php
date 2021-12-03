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
                                    <a href="{{route('product.view', $product->id)}}" data-toggle="tooltip" title="view" class="btn-sm btn-warning" data-placement="button"><i class="lni lni-eye"></i></a>&nbsp;
                                <a href="{{route('product.edit', $product->id)}}" data-toggle="tooltip" title="edit" class="btn-sm btn-warning" data-placement="button"><i class="bx bxs-edit"></i></a>&nbsp;
                                <form action="{{route('product.destroy',$product->id)}}" method="POST">
                                    @csrf
                                    @method('Delete')
                                    <a href="" data-toggle="tooltip" title="delete" class="dltbtn btn-sm btn-danger" data-id="{{$product->id}}" data-placement="button"><i class="bx bxs-trash"></i></a>
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