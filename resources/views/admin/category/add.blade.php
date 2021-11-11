@extends('layouts.admin')


@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Category</h4>
        </div>
        <div class="card-body">
          <form action="{{url('insert-category')}}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="row">
                  <div class="col-md-6 mb-3">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label>Slug</label>
                    <input type="text" class="form-control" name="slug">
                   </div>
                   <div class="col-md-12 mb-3">
                       <label>description</label>
                       <textarea name="description" id="" row="3" class="form-control"></textarea>
                   </div>
                   <div class="col-md-6 mb-3">
                       <label>Status</label>
                       <input type="checkbox" name="status">
                   </div>
                   <div class="col-md-6 mb-3">
                    <label>popular</label>
                    <input type="checkbox" name="polular">
                   </div>
                   <div class="col-md-12 mb-3">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" class="form-control">
                   </div>
                   <div class="col-md-12 mb-3">
                    <label>Meta Keywords</label>
                    <input type="text" name="meta_keywords" row="3" class="form-control">
                   </div>
                   <div class="col-md-12 mb-3">
                    <label>Meta Description</label>
                    <input type="text" name="meta_description" row="3" class="form-control">
                    </div>
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