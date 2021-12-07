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
                    <li class="breadcrumb-item active" aria-current="page">Add Category</li>
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
                        <h5 class="mb-0 text-primary">Create a new category</h5>
                    </div>
                    <hr>
                    <form action="{{route('category.store')}}" method="POST">
                        @csrf
                        <div class="col-md-10">
                            <label for="title" class="form-label"><b> Category Title <span style="color:#ff0000">*</span></b></label>
                            <input type="text" name="title" placeholder="Enter title here...." class="form-control" id="title" value="{{old('title')}}">
                        </div><br>
                        <div class="col-md-10">
                            <label for="summary" class="form-label"><b>Category Summary</b></label>
                              <div class="form-group">
                                <textarea name="summary" id="summary" placeholder="Enter summary here....">{{old('summary')}}</textarea>
                              <div>
                            </div><br>
                        <div class="col-md-10">
                            <label for="photo" class="form-label"><b>Select a picture</b></label>
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
                            <label for="is_parent"><b> Create a main category? : &nbsp;</b></label> &nbsp;
                            <input id="is_parent" class="form-check-input" name="is_parent" type="checkbox" value="1" checked> Yes
                           <br><small style="color: #ff0000">(Already have main category then untick and select a main category for your new sub-category.)</small>
                        </div><br>
                        <div class="col-md-10 d-none" id="parent_cat_div">
                            <label for="parent_id" class="form-label"><b>Select a main category for your sub-category</b></label>
                                <select class="form-select" id="parent_id" name="parent_id">
                                    <option value="">--Main Category--</option>
                                    @foreach ($parent_cats as $pcat )
                                        <option value="{{$pcat->id}}"{{old('parent_id')==$pcat->id ? 'selected' : ''}}>{{$pcat->title}}</option>
                                    @endforeach
                                </select>
                        </div><br>
                        <div class="col-md-10">
                            <label for="status" class="form-label"><b>Category Status <span style="color:#ff0000">*</span></b></label>
                                <select class="form-select" id="status" name="status">
                                    <option>--Choose Category Status--</option>
                                    <option value="active" {{old('status')=='active' ? 'selected':''}}>Active</option>
                                    <option value="inactive" {{old('status')=='inactive' ? 'selected':''}}>Inactive</option>
                                </select>
                        </div><br>
                        <div class="col-md-10">
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
        .create( document.querySelector( '#summary' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
$('#is_parent').change(function(e){
    e.preventDefault();
    var is_checked=$('#is_parent').prop('checked');
    if(is_checked){
        $('#parent_cat_div').addClass('d-none');
        $('#parent_cat_div').val('');
    }
    else{
        $('#parent_cat_div').removeClass('d-none');
    }
});   
</script>
@endsection
