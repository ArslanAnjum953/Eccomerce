@extends('layouts.admin')


@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
          <form action="{{url('insert-Product')}}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="row">
                  <div class="col-md-12">
                    <select class="form-select"name='cate_id'>
                        <option value="">select a Category</option>
                        @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="col-md-6 mb-3">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label>Slug</label>
                    <input type="text" class="form-control" name="slug">
                   </div>
                   <div class="col-md-12 mb-3">
                    <label>small_description</label>
                    <textarea name="small_description" id="" row="3" class="form-control"></textarea>
                </div>
                   <div class="col-md-12 mb-3">
                       <label>description</label>
                       <textarea name="description" id="" row="3" class="form-control"></textarea>
                   </div>
                   <div class="col-md-6 mb-3">
                       <label>Orignal Price</label>
                       <input type="number" name="orignal_price"  class="form-control">
                   </div>
                   <div class="col-md-6 mb-3">
                    <label>Selling Price</label>
                    <input type="number" name="selling_price"  class="form-control">
                   </div>
                   <div class="col-md-6 mb-3">
                    <label>Tax</label>
                    <input type="number" name="tax" class="form-control">
                   </div>
                   <div class="col-md-6 mb-3">
                    <label>Quantity</label>
                    <input type="number" name="qty" row="3" class="form-control">
                   </div>
                   <div class="col-md-6 mb-3">
                    <label>Status</label>
                    <input type="checkbox" name="status"   row="3" >
                   </div>
                   <div class="col-md-6 mb-3">
                    <label>Trending</label>
                    <input type="checkbox" name="trending"  row="3" >
                   </div>
                   <div class="col-md-12 mb-3">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" row="3" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                      <label>Meta keywords</label>
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