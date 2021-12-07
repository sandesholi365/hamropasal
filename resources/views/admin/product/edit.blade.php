@extends('admin.layouts.master')
@section('content')
<div class="page-content">  
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        {{-- <div class="breadcrumb-title pe-3">Banner</div> --}}
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mx-auto">
        @if($errors->any())
            <ul class="alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="col-md-12 mx-auto">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <div class="card-title d-flex align-items-center">
                        <h5 class="mb-0 text-primary">Edit a product</h5>
                    </div>
                    <hr>
                    <form action="{{route('product.update',$product->id)}}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="col-md-10">
                            <label for="title" class="form-label"><b> Edit Product Title <span style="color:#ff0000">*</span></b></label>
                            <input type="text" name="title" placeholder="Enter title here...." class="form-control" id="title" value="{{$product->title}}">
                        </div><br>
                        <div class="col-12">
                            <label for="summary" class="form-label"><b>Edit Product Summary <span style="color:#ff0000">*</span></b></label>
                              <div class="form-group">
                                <textarea name="summary" placeholder="Enter Summary here...." id="summary">{{$product->summary}}</textarea>
                                <div>
                            </div><br>
                         <div class="col-12">
                             <label for="description" class="form-label"><b>Edit Product Description</b></label>
                                <div class="form-group">
                                  <textarea name="description" placeholder="Enter Description here...." id="description">{{$product->description}}</textarea>
                                <div>
                        </div><br>
                        <div class="col-md-10">
                            <label for="stock" class="form-label"><b> Edit Number of Stocks <span style="color:#ff0000">*</span></b></label>
                            <input type="number" name="stock" placeholder="Enter stock here...." class="form-control" id="stock" value="{{$product->stock}}">
                        </div><br>
                        <div class="col-12">
                            <label for="photo" class="form-label"><b>Select a picture <span style="color:#ff0000">*</span></b></label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                  <a id="lfm" data-input="photo" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                  </a>
                                </span>
                                <input id="photo" class="form-control" type="text" name="photo" value="{{$product->photo}}">
                              </div>
                              <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        </div><br>
                        <div class="col-md-10">
                            <label for="price" class="form-label"><b> Edit Product Price <span style="color:#ff0000">*</span></b></label>
                            <input type="number" step="any" name="price" placeholder="Enter price here...." class="form-control" id="price" value="{{$product->price}}">
                        </div><br>
                        <div class="col-md-10">
                            <label for="discount" class="form-label"><b> Edit Product Discount(%) </b></label>
                            <input type="number" min="0" max="100" step="any" name="discount" placeholder="Enter discount here...." class="form-control" id="discount" value="{{$product->discount}}">
                        </div><br>
                        <div class="col-12">
                            <label for="brand_id" class="form-label"><b>Edit Product Brands</b></label>
                                <select class="form-select" id="brand_id" name="brand_id">
                                    <option>--Brands--</option>
                                   @foreach (\App\Models\Brand::get() as $brand )
                                   <option value="{{$brand->id}}"{{$brand->id==$product->brand_id ? 'selected':''}}>{{$brand->title}}</option>
                                   @endforeach
                                </select>
                        </div><br>
                        <div class="col-12">
                            <label for="cat_id" class="form-label"><b>Product Main Category <span style="color:#ff0000">*</span></b></label>
                                <select class="form-select" id="cat_id" name="cat_id">
                                    <option>--Choose Product Main Category--</option>
                                    @foreach (\App\Models\Category::where('is_parent',1)->get() as $category )
                                   <option value="{{$category->id}}"{{$category->id==$product->cat_id ? 'selected':''}}>{{$category->title}}</option>
                                   @endforeach
                                </select>
                        </div><br>
                        <div class="col-12 d-none" id="child_cat_div">
                            <label for="child_cat_id" class="form-label"><b>Product Sub-Category </b></label>
                                <select class="form-select" id="child_cat_id" name="child_cat_id">                                    
                                </select>
                        </div><br>
                        <div class="col-12">
                            <label for="size" class="form-label"><b>Product Size</b></label>
                                <select class="form-select" id="size" name="size">
                                    <option value>--Choose Product Size--</option>
                                    <option value="S" {{$product->size=='S' ? 'selected':''}}>Small</option>
                                    <option value="M" {{$product->size=='M' ? 'selected':''}}>Medium</option>
                                    <option value="L" {{$product->size=='L' ? 'selected':''}}>Large</option>
                                    <option value="XL" {{$product->size=='XL' ? 'selected':''}}>Extra Large</option>
                                </select>
                        </div><br>
                        <div class="col-12">
                            <label for="conditions" class="form-label"><b>Product Conditions</b></label>
                                <select class="form-select" id="conditions" name="conditions">
                                    <option>--Choose Product Conditions--</option>
                                    <option value="new" {{$product->conditions=='new' ? 'selected':''}}>New</option>
                                    <option value="popular" {{$product->conditions=='popular' ? 'selected':''}}>Popular</option>
                                    <option value="winter" {{$product->conditions=='winter' ? 'selected':''}}>Winter</option>
                                </select>
                        </div><br>
                        <div class="col-12">
                            <label for="vendor_id" class="form-label"><b>Product Vendors</b></label>
                                <select class="form-select" id="vendor_id" name="vendor_id">
                                    <option>--Choose Product Vendors--</option>
                                   @foreach (\App\Models\User::where('role','vendor')->get() as $vendor )
                                   <option value="{{$vendor->id}}"{{$vendor->id==$product->vendor_id ? 'selected':''}}>{{$vendor->full_name}}</option>
                                   @endforeach
                                </select>
                        </div><br>
                        <div class="col-12">
                            <label for="status" class="form-label"><b>Product Status <span style="color:#ff0000">*</span></b></label>
                                <select class="form-select" id="status" name="status">
                                    <option>--Choose Product Status--</option>
                                    <option value="active" {{$product->status=='active' ? 'selected':''}}>Active</option>
                                    <option value="inactive" {{$product->status=='inactive' ? 'selected':''}}>Inactive</option>
                                </select>
                        </div><br>
                        <div class="col-12">
                               <button type="submit" class="btn btn-outline-success px-4">Update</button>
                               <a href="{{url()->previous()}}" class="btn btn-outline-danger px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script>$('#lfm').filemanager('image');</script>
<script>
    ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
</script>
<script>
    ClassicEditor
            .create( document.querySelector( '#summary' ) )
            .catch( error => {
                console.error( error );
            } );
</script>
<script>
    var child_cat_id={{$product->child_cat_id}};
    $('#cat_id').change(function(){
        var category=$(this).val();
        if(category !=null){
            $.ajax({
                url:"/category/"+category+"/child",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    category:"category",
                },
                success:function(response){
                    var show_html="<option value=''>--Choose Product Sub-Category--</option>";
                    if (response.status){
                        $('#child_cat_div').removeClass('d-none');
                        $.each(response.data,function(id,title){
                            show_html+="<option value='"+id+"' "+(child_cat_id==id ? 'selected': '')+">"+title+"</option>"
                        });
                     }
                        else{
                            $('#child_cat_div').addClass('d-none');

                        }
                        $('#child_cat_id').html(show_html);
                }
            });
        }
    });
    if(child_cat_id!=null){
        $('#cat_id').change();
    }
</script>
@endsection
