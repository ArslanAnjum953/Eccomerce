@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3>product Page</h3>
           </div>
        <div class="card-body" >
          <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>selling price</th>
                    <th>image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                
                <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->category->name }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->selling_price }}</td>
                <td> <img src="{{ asset('assets/uploads/products/'. $item->image ) }}" alt="image here" class="cate-image"> </td>
                <td>
                <a href="{{ url('edit-product/'.$item->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ url('delete-product/'.$item->id) }}" class="btn btn-danger">Delete</a>    
                </td>
                  
                </tr>      
                <br>
                
                @endforeach
                 
            </tbody>
              </table>
          </div>
        </div>
    </div>
@endsection