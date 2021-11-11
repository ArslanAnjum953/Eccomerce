@extends('layouts.front')
@section('title')
    My Cart
@endsection
@section('content')

<div class="py-3 -mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
           <a href="{{ url('/') }}">
             Home
            </a> /
            <a href="{{ url('cart')}}">
               cart
            
            </a>/
           
            
        </h6>
    </div>
</div>

<div class="container my-5">
    <div class="card shadow product_data">
        @if ($cartitems->count() > 0) 
        <div class="card-body">
            @php $total = 0; @endphp
            @foreach ($cartitems as $item)
                <div class="row product_data">
                    <div class="col-md-2">
                        <img src="{{ asset('assets/uploads/products/'.$item->products->image)}}" height="70px" width="70px" alt="image here">
                    </div>
                    <div class="col-md-3">
                       <h6> {{ $item->products->name }} </h6>    
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6>Rs {{ $item->products->selling_price }}</h6>

                    </div>
                    <div class="col-md-3">
                        <input type="hidden"  class="prod_id" value="{{ $item->prod_id }}">
                        @if ($item->products->qty >= $item->pro_qty)
                            <label for="quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width:130px;">
                                <button  class="input-group-text changeQuantity decrement-btn">-</button>
                                <input  type="text" name="quantity"  class="form-control qty-input text-center " value="{{ $item->pro_qty }}">
                                <button id="qty"  class="input-group-text changeQuantity increment-btn">+</button>
                            </div> 
                            @php $total += $item->products->selling_price * $item->pro_qty; @endphp
                            @else
                            <h6>Out of stock</h6>
                        @endif
                       
                    </div>
                    <div class="col-md-2">
                        <Button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
                    </div>
                </div>
               
            @endforeach
        </div>
        <div class="card-footer">
            <h6> Total price : {{$total}}
                <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end">proceed to checkout</a>
            
            </h6>
        </div>
        @else
          <div class="row">
                <div class="cart-body text-center">
                    
                        <h2 class="mt-5">Your <i class="fa fa-shopping-cart" ></i> Cart is empty</h2>
                        <a href="{{'category'}}" class="btn btn-outline-primary float-end m-3">continue to shopping</a>
                </div>
         </div>
        @endif

    </div>
</div>

@endsection