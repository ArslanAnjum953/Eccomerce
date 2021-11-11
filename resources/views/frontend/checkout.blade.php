@extends('layouts.front')
@section('title')
    Welcome to E-Shop
@endsection
@section('content')
<div class="py-3 -mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
           <a href="{{ url('/') }}">
             Home
            </a> /
            <a href="{{ url('checkout')}}">
               Checkout
            
            </a>/
           
            
        </h6>
    </div>
</div>
<div class="container mt-5">
    <form action="{{url('place-order')}}" method="POST">
         @csrf
           <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                        <h6> Basic Details </h6>
                        <hr>
                        <div class="row  checkout-form">
                                <div class="col-md-6">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" vlaue="{{ Auth::user()->name }}" name="fname" placeholder="Enter First Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" vlaue="{{ Auth::user()->lname }}" name="lname" placeholder="Enter Last Name">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" vlaue="{{ Auth::user()->email }}" name="email" placeholder="Enter Email">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Phone Number</label>
                                    <input type="text" class="form-control" vlaue="{{ Auth::user()->phone }}" name="phone" placeholder="Phone Number">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 1</label>
                                    <input type="text" class="form-control" vlaue="{{ Auth::user()->address1 }}" name="address1" placeholder="Address 1">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 2</label>
                                    <input type="text" class="form-control" vlaue="{{ Auth::user()->address2}}" name="address2" placeholder="Address 2">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">City</label>
                                    <input type="text" class="form-control"  vlaue="{{ Auth::user()->city }}" name="city" placeholder="Enter City">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">State</label>
                                    <input type="text" class="form-control" vlaue="{{ Auth::user()->state}}" name="state" placeholder="Enter State">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control" vlaue="{{ Auth::user()->country }}" name="country" placeholder="Enter Country">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Pin Code</label>
                                    <input type="text" class="form-control" vlaue="{{ Auth::user()->pincode }}" name="pincode" placeholder="Enter pin Code">
                                </div>
                        </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">

                        <h6> Order Details </h6>
                        <hr>
                        
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($cartitems as $item)
                                <tr>

                                    <td>{{ $item->products->name }}</td>
                                    <td>{{ $item->pro_qty }}</td>
                                    <td>{{ $item->products->selling_price }}</td>
                                    

                                </tr>
                                @endforeach
                            </tbody>

                        </table>

                        <button type="submit" class="btn btn-primary float-end">Place order</button>

                        </div>
                    </div>
                </div>
            </div>
    </form> 
</div>
@endsection