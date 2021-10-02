@extends('admin.layouts.master')
@section('content')
<div class="page-content">  
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Banner</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Banner</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <div class="card-title d-flex align-items-center">
                        <h5 class="mb-0 text-primary">Create a new banner</h5>
                    </div>
                    <hr>
                    <form class="row g-3">
                        <div class="col-md-10">
                            <label for="title" class="form-label"><b> Title</b></label>
                            <input type="text" name="title" placeholder="Enter title here...." class="form-control" id="title" value="{{old('title')}}">
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label"><b>Description</b></label>
                              <div class="form-group">
                                <textarea class="form-control" name="description" id="description" placeholder="Enter Description here...." rows="3" value="{{old('description')}}"></textarea>
                              <div>
                            </div><br>

                        <div class="col-12">
                            <label for="picture" class="form-label"><b>Select a picture</b></label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                  </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="filepath">
                              </div>
                              <img id="holder" style="margin-top:15px;max-height:100px;">
                            </div>

                        <div class="col-12">
                            <label for="condition" class="form-label"><b>Condition</b></label>
                                <select class="form-select" id="condition" name="condition">
                                    <option>--Condition--</option>
                                    <option value="banner" {{old('condition')=='banner' ? 'selected':''}}>Banner</option>
                                    <option value="promo" {{old('condition')=='promo' ? 'selected':''}}>Promote</option>
                                </select>
                        </div>
                        <div class="col-12">
                            <label for="status" class="form-label"><b>Status</b></label>
                                <select class="form-select" id="status" name="status">
                                    <option>--Status--</option>
                                    <option value="1" {{old('status')=='active' ? 'selected':''}}>Active</option>
                                    <option value="2" {{old('status')=='inactive' ? 'selected':''}}>Inactive</option>
                                </select>
                        </div>
                        <div class="col-12">
                               <button type="submit" class="btn btn-outline-primary px-4">Save</button>
                               <button type="submit" class="btn btn-outline-secondary px-4">Cancel</button>
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
    var quill = new Quill('#description', {
      theme: 'snow'
    });
  </script>
@endsection
