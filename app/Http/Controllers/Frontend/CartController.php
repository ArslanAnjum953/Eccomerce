<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\Product;
use illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addproduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty =  $request->input('product_qty');
        //return response()->json(['status'=>$product_id]);
         
        if(Auth::check())
        {
            $prod_check = Product::find($product_id);

            if($prod_check)
            {
                if(cart::where('prod_id',$product_id)->where('user_id', Auth::id())->exists()) 
                {
                    return response()->json(['status'=>$prod_check->name." Already Added to cart"]);

                }
                else{
                    $cartItem = new cart();
                    $cartItem->prod_id =  $product_id;
                    $cartItem->user_id = Auth::user()->id;
                    $cartItem->pro_qty =   $product_qty;
                    $cartItem->save();
                    return response()->json(['status'=>$prod_check->name." Added to cart"]);
                }
              
            }

        }
        else{
            return response()->json(['status' => "login to continue"]);
        }

    }

    public function viewcart()
    {
        $cartitems = cart::where('user_id', Auth::id())->get();
        
        return view('frontend.cart' , compact('cartitems'));
    }


    Public function updatecart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('pro_qty');
        
        if(Auth::check())
        {
            if(cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                 $cart = cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                 $cart->pro_qty = $product_qty;
                 $cart->update();
                 return response()->json(['status'=> "Quantity updated"]);
            }

        }

    }


    public function deleteproduct(Request $request)
    {
        if(Auth::check())
        {
        $prod_id = $request->input('prod_id');
        if(cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
        {
            $cartitem = cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
            $cartitem->delete();
            return response()->json(['status' => "Product deleted successfully"]);

        }
        }
        else{
            return response()->json(['status' => "login to continue"]);
        }

    }


}
