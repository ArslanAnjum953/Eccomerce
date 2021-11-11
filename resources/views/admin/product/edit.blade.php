@extends('layouts.admin')


@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
          <form action="{{url('update-product/'.$products->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="row">
                  <div class="col-md-12">
                    <select class="form-select">
                        <option value="">{{$products->category->name}}</option>
                       
                      </select>
                  </div>
                  <div class="col-md-6 mb-3">
                      <label>Name</label>
                      <input type="text" class="form-control" value="{{ $products->name }}" name="name">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label>Slug</label>
                    <input type="text" class="form-control" value="{{ $products->slug }}" name="slug">
                   </div>
                   <div class="col-md-12 mb-3">
                    <label>small_description</label>
                    <textarea name="small_description" id="" row="3"  class="form-control">{{ $products->small_description }}</textarea>
                </div>
                   <div class="col-md-12 mb-3">
                       <label>description</label>
                       <textarea name="description" id="" row="3"   class="form-control">{{ $products->description }}</textarea>
                   </div>
                   <div class="col-md-6 mb-3">
                       <label>Orignal Price</label>
                       <input type="number" name="orignal_price"   value="{{ $products->orignal_price }}" class="form-control">
                   </div>
                   <div class="col-md-6 mb-3">
                    <label>Selling Price</label>
                    <input type="number" name="selling_price"  value="{{ $products->selling_price }}" class="form-control">
                   </div>
                   <div class="col-md-6 mb-3">
                    <label>Tax</label>
                    <input type="number" name="tax"  value="{{ $products->tax }}" class="form-control">
                   </div>
                   <div class="col-md-6 mb-3">
                    <label>Quantity</label>
                    <input type="number" name="qty" row="3"  value="{{ $products->qty}}" class="form-control">
                   </div>
                   <div class="col-md-6 mb-3">
                    <label>Status</label>
                    <input type="checkbox" name="status"   {{ $products->status == '1' ? 'checked' : ''}} row="3" >
                   </div>
                   <div class="col-md-6 mb-3">
                    <label>Trending</label>
                    <input type="checkbox" name="trending"  {{ $products->trending == '1' ? 'checked' : '' }}  row="3" >
                   </div>
                   <div class="col-md-12 mb-3">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title"  value="{{ $products->meta_title }}" row="3" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                      <label>Meta keywords</label>
                      <textarea type="text" name="meta_keywords"  row="3" class="form-control">{{ $products->meta_keywords }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Meta Description</label>
                        <textarea type="text" name="meta_description"  row="3" class="form-control">{{ $products->meta_description }}</textarea>
                      </div>
                      @if ($products->image)
                      <img src=" {{asset('assets/uploads/products/'.$products->image) }}" alt="">
                          
                      @endif
                    <div class="col-md-12">
                        <input type="file" name="image"   class="form-Control">
                    </div>
                    <div class="col-md-12">
                      <button type="submit"  class="btn btn-primary"> update</button>
                    </div>
                    
              </div>  
          </form>
        </div>
    </div>
@endsection