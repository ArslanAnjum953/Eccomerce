@extends('layouts.front')
@section('title')
    orders
@endsection
@section('content')
<div class="container py-5   ">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    Order view
                    <a href="{{ url('my-orders') }}" class="btn btn-warning text-white float-end">Back</a>

                </div>
                <div class="card-body">
                    <div class="row">
                        <h4>Shipping Details</h4>
                        <hr> 
                        <div class="col-md-6 order-details">
                            <label for="">First Name</label>
                            <div class="border py-2">{{ $orders->fname}}</div>
                            <label for="">Last Name</label>
                            <div class="border py-2">{{ $orders->lname}}</div>
                            <label for="">Email</label>
                            <div class="border py-2">{{ $orders->email}}</div>
                            <label for="">Contact Number</label>
                            <div class="border py-2">{{ $orders->phone}}</div>
                            <label for=""> Shipping Address</label>
                            <div class="border py-2">
                                {{ $orders->address1 }} ,<br>
                                {{ $orders->address2 }},<br>
                                {{ $orders->city }},<br>
                                {{ $orders->state }},<br>
                                {{ $orders->country }},<br>
                            </div>
                            <label for="">Zip code</label>
                            <div class="border py-2">{{ $orders->pincode}}</div>
                
                        </div>
                        <div class="col-md-6">
                            <h4>Orders Details</h4>
                            <hr>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>price</th>
                                        <th>image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderitems as $item )
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>
                                                <img src="{{ asset('assets/uploads/products/'.$item->products->image)  }}" width="50px" alt="product image">
                                                
                                            </td>

                                            
                                        </tr>
                                    @endforeach 
                                </tbody>
                
                            </table>
                            <h4 class="px-2">Grand Total:<span class="float-end"> {{ $orders->total_price }} </span> </h4>
                              
                              <div class="mt-5 px-2">
                                <label for=""> <h5>Order Status</h5></label>
                                <hr>
                                <form action="{{url('update-order/'.$orders->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select class="form-select" name="order_status">
                                        
                                        <option {{$orders->status == '0' ? 'selected' : ''}} >pending</option>
                                        <option {{ $orders->status == '0' ? 'selected' : ''}} >completed</option>

                                    </select>
                                    <button type="submit" class="btn btn-primary float-end mt-3" >Update</button>
                                </form>

                              </div>

                                
                        </div>
                    </div>
                    

                </div>
            </div>
          
        </div>
    </div>
</div>
@endsection