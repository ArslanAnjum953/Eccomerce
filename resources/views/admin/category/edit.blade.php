@extends('layouts.admin')


@section('content')
    <div class="card">
        <div class="card-header">
            <h4>edit/update Table</h4>
        </div>
        <div class="card-body">
          <form action="{{url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
           
              <div class="row">
                  <div class="col-md-6 mb-3">
                      <label>Name</label>
                      <input type="text" value="{{$category->name}}" class="form-control" name="name">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label>Slug</label>
                    <input type="text" value="{{$category->slug}}" class="form-control" name="slug">
                   </div>
                   <div class="col-md-12 mb-3">
                       <label>description</label>
                       <textarea name="description" id="" row="3" class="form-control">{{$category->description}}</textarea>
                   </div>
                   <div class="col-md-6 mb-3">
                       <label>Status</label>
                       <input type="checkbox" {{$category->status == "1" ? 'checked':''}} name="status">
                   </div>
                   <div class="col-md-6 mb-3">
                    <label>popular</label>
                    <input type="checkbox" {{$category->popular == "1" ? 'checked':''}} name="popular">
                   </div>
                   <div class="col-md-12 mb-3">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" value="{{$category->meta_title}}" class="form-control">
                   </div>
                   <div class="col-md-12 mb-3">
                    <label>Meta Keywords</label>
                    <textarea name="meta_keywords" id="" row="3" class="form-control">{{$category->meta_keywords}}</textarea>
                   </div>
                   <div class="col-md-12 mb-3">
                    <label>Meta Description</label>
                    <textarea name="meta_description" id="" row="3" class="form-control">{{$category->meta_descrip}}</textarea>
                    </div>
                    @if ($category->image)
                    <img src="{{asset('assets/uploads/category'.$category->image)}}" alt="category image">

                        
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-Control">
                    </div>
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-primary"> submit</button>
                    </div>
                    
              </div>  
          </form>
        </div>
    </div>
@endsection