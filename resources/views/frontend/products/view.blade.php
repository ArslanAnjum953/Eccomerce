@extends('layouts.front')
@section('title', $products->name)
    
@section('content')

<div class="py-3 -mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
           <a href="{{ url('category') }}">
             collessions 
            </a> /
            <a href="{{ url('category/'.$products->category->slug)}}">
                {{ $products->category->name }}
            
            </a>/
            <a href="{{ url('category/'.$products->category->slug.'/'.$products->slug)}}">
                {{$products->name}} 
            
            </a>/
            
        </h6>
    </div>
</div>

<div class="container">
    <div class="card shadow mt-4 product_data" >
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{asset('assets/uploads/products/'.$products->image)}}" style="height:250px; width:350px; !important" alt="">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{$products->name}}
                        <label style="font-size:16;" class="float-end badge bg-danger trending_tag">{{ $products->trending == '1' ? 'Trending':''}}</label> 
                    </h2>
                       <hr> 
                    <label class="me-3">orignl_price : <s> Rs {{ $products->orignal_price }} </s> </label>
                    <label class="fw-bold">selling price :  Rs {{ $products->orignal_price }} </label>
                    <p class="mt-3">
                        {!! $products->small_description !!}

                    </p>
                      <hr>
                    @if ($products->qty > 0)
                    <label class="badge bg-success">in stock</label>
                    @else
                    <label class="badge bg-danger">out of stock</label>    
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <input type="hidden" value="{{ $products->id }}" id="id" class="prod_id">
                            <label for="quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width:130px;">
                                <button  class="input-group-text decrement-btn">-</button>
                                <input  type="text" name="quantity"  class="form-control qty-input text-center " value="1">
                                <button  class="input-group-text increment-btn">+</button>
                            </div>  
                        </div>
                        <div class="col-md-10 mt-4">
                            @if ($products->qty > 0)
                            <button id="addtocart" type="button" class="btn btn-success me-3 addToCartBtn float-start">Add to cart <i class="fa fa-cart"></i> </button>
                             
                            @endif
                            <button type="button" class="btn btn-primary me-3 float-start">Add to wishlist <i class="fa fa-heart"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <h3>Description</h3>
                <p class="mt-3">
                    {!! $products->description !!}
                </p>
            </div>

        </div>
    </div>
</div>

@endsection

@section('scripts')


        <script >
        // function inc()
        // {
        //     var inc_value = $('#qtyinput').val();
        
        //     value = parseInt(inc_value, 10);
        //     if(value<10)
        //     {
        //         value++;
        //         $('#qtyinput').val(value);
                
        //     }
        //     console.log(value);
            
        // }
            
            $(document).ready(function () {
                $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                            });
        
                $(".addToCartBtn").click(function (e) {
                    e.preventDefault();
                    var product_id = $(this).closest('.product_data').find('.prod_id').val();
                    var product_qty = $(this).closest('.product_data').find('.qty-input').val();
                    // var product_id=$('#id').val();
                    // var product_id = $(this).closest('Product_data').find('.prod_id').val(); 
                    // var product_qty =$('#qtyinput').val();
                
                    $.ajax({
                        method: "POST",
                        url: "/add-to-cart",
                        data: 
                        {
                            'product_id' :product_id,
                            'product_qty' :product_qty,

                        },
                        success: function (response){

                            swal(response.status);

                        }
                    }); 
                });

                $('.increment-btn').click(function (e) {
                    e.preventDefault();

                    var inc_value = $('.qty-input').val();
                    var value = parseInt(inc_value, 10);
                    value = isNaN(value) ? 0 : value;
                    if(value < 10)
                    {
                        value++;
                        console.log(value);
                        $('.qty-input').val(value);
                    }  
                });

                $('.decrement-btn').click(function (e) {
                    e.preventDefault();

                    var dec_value = $('.qty-input').val();
                    var value = parseInt(dec_value, 10);
                    value = isNaN(value) ? 0 : value;
                    if(value > 1)
                    {
                        value--;
                        $('.qty-input').val(value);
                    } 
                    console.log(value); 
                });

            });

        

        </script>
    
@endsection