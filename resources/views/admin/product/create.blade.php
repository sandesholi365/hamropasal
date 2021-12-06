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
                    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
                        <h5 class="mb-0 text-primary">Create a new product</h5>
                    </div>
                    <hr>
                    <form action="{{route('product.store')}}" method="POST">
                        @csrf
                        <div class="col-md-10">
                            <label for="title" class="form-label"><b> Title <span style="color:#ff0000">*</span></b></label>
                            <input type="text" name="title" placeholder="Enter title here...." class="form-control" id="title" value="{{old('title')}}">
                        </div><br>
                        <div class="col-12">
                            <label for="summary" class="form-label"><b>Summary <span style="color:#ff0000">*</span></b></label>
                              <div class="form-group">
                                <textarea name="summary" placeholder="Enter Summary here...." id="summary">{{old('summary')}}</textarea>
                                <div>
                            </div><br>
                         <div class="col-12">
                             <label for="description" class="form-label"><b>Description</b></label>
                                <div class="form-group">
                                  <textarea name="description" placeholder="Enter Description here...." id="description">{{old('description')}}</textarea>
                                <div>
                        </div><br>
                        <div class="col-md-10">
                            <label for="stock" class="form-label"><b> Stock <span style="color:#ff0000">*</span></b></label>
                            <input type="number" name="stock" placeholder="Enter stock here...." class="form-control" id="stock" value="{{old('stock')}}">
                        </div><br>
                        <div class="col-12">
                            <label for="photo" class="form-label"><b>Select a picture <span style="color:#ff0000">*</span></b></label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                  <a id="lfm" data-input="photo" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                  </a>
                                </span>
                                <input id="photo" class="form-control" type="text" name="photo">
                              </div>
                              <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        </div><br>
                        <div class="col-md-10">
                            <label for="price" class="form-label"><b> Price <span style="color:#ff0000">*</span></b></label>
                            <input type="number" step="any" name="price" placeholder="Enter price here...." class="form-control" id="price" value="{{old('price')}}">
                        </div><br>
                        <div class="col-md-10">
                            <label for="discount" class="form-label"><b> Discount(%) </b></label>
                            <input type="number" min="0" max="100" step="any" name="discount" placeholder="Enter discount here...." class="form-control" id="discount" value="{{old('discount')}}">
                        </div><br>
                        <div class="col-12">
                            <label for="brand_id" class="form-label"><b>Brands</b></label>
                                <select class="form-select" id="brand_id" name="brand_id">
                                    <option>--Brands--</option>
                                   @foreach (\App\Models\Brand::get() as $brand )
                                   <option value="{{$brand->id}}">{{$brand->title}}</option>
                                   @endforeach
                                </select>
                        </div><br>
                        <div class="col-12">
                            <label for="cat_id" class="form-label"><b>Category <span style="color:#ff0000">*</span></b></label>
                                <select class="form-select" id="cat_id" name="cat_id">
                                    <option>--Category--</option>
                                    @foreach (\App\Models\Category::where('is_parent',1)->get() as $category )
                                   <option value="{{$category->id}}">{{$category->title}}</option>
                                   @endforeach
                                </select>
                        </div><br>
                        <div class="col-12 d-none" id="child_cat_div">
                            <label for="child_cat_id" class="form-label"><b>Child Category </b></label>
                                <select class="form-select" id="child_cat_id" name="child_cat_id">                                    
                                </select>
                        </div><br>
                        <div class="col-12">
                            <label for="size" class="form-label"><b>Size</b></label>
                                <select class="form-select" id="size" name="size">
                                    <option value>--Size--</option>
                                    <option value="S" {{old('size')=='S' ? 'selected':''}}>Small</option>
                                    <option value="M" {{old('size')=='M' ? 'selected':''}}>Medium</option>
                                    <option value="L" {{old('size')=='L' ? 'selected':''}}>Large</option>
                                    <option value="XL" {{old('size')=='XL' ? 'selected':''}}>Extra Large</option>
                                </select>
                        </div><br>
                        <div class="col-12">
                            <label for="conditions" class="form-label"><b>Conditions</b></label>
                                <select class="form-select" id="conditions" name="conditions">
                                    <option>--Conditions--</option>
                                    <option value="new" {{old('conditions')=='new' ? 'selected':''}}>New</option>
                                    <option value="popular" {{old('conditions')=='popular' ? 'selected':''}}>Popular</option>
                                    <option value="winter" {{old('conditions')=='winter' ? 'selected':''}}>Winter</option>
                                </select>
                        </div><br>
                        <div class="col-12">
                            <label for="vendors" class="form-label"><b>Vendors</b></label>
                                <select class="form-select" id="vendors" name="vendors">
                                    <option>--Vendors--</option>
                                   @foreach (\App\Models\User::where('role','vendor')->get() as $vendor )
                                   <option value="{{$vendor->id}}">{{$vendor->full_name}}</option>
                                   @endforeach
                                </select>
                        </div><br>
                        <div class="col-12">
                            <label for="status" class="form-label"><b>Status <span style="color:#ff0000">*</span></b></label>
                                <select class="form-select" id="status" name="status">
                                    <option>--Status--</option>
                                    <option value="active" {{old('status')=='active' ? 'selected':''}}>Active</option>
                                    <option value="inactive" {{old('status')=='inactive' ? 'selected':''}}>Inactive</option>
                                </select>
                        </div><br>
                        <div class="col-12">
                               <button type="submit" class="btn btn-outline-success px-4">Save</button>
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
                    var show_html="<option value=''>--Child Category--</option>";
                    if (response.status){
                        $('#child_cat_div').removeClass('d-none');
                        $.each(response.data,function(id,title){
                            show_html+="<option value='"+id+"'>"+title+"</option>"
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
</script>
@endsection
