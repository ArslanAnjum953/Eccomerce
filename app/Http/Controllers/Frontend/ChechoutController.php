<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;
use App\Models\order;
use App\Models\orderItem;
use App\Models\product;
use App\Models\user;

class ChechoutController extends Controller
{
    public function index()
    {
        $old_cartitems = cart::where('user_id' , Auth::id())->get();
        foreach($old_cartitems as $item)
        {
            if(!Product::where('id',$item->prod_id)->where('qty', '>=',$item->pro_qty)->exists())
            {
                $removeitem = Cart::where('User_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeitem->delete();
            }
        }
          $cartitems = cart::where('user_id' ,Auth::id())->get();
        return view('frontend.checkout', compact('cartitems')); 
    }

    public function placeorder(Request $request)
    {
        $order = new order();
        $order->user_id = Auth::id();   
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');

        // TO calculate the total price
        $total = 0;
        $cartitems_total = cart::where('user_id' , Auth::id())->get();
        foreach($cartitems_total as $prod)
        {
            $total += $prod->products->selling_price;
        }
        $order->total_price = $total;

        $order->tracking_no = 'customer'.rand(1111,9999);
        $order->save();

      
        $cartitems = cart::where('user_id',Auth::id())->get();
        foreach($cartitems as $item)
        {
            orderItem::create([
                'order_id' =>  $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->pro_qty,
                'price' => $item->products->selling_price,
            ]);
            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->pro_qty;
            $prod->update();

        }

        if(Auth::user()->address1 == NULL)
        {
            $user = User::where('id',Auth::id())->first();

            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            // $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();

        }
        $cartitems = cart::where('user_id',Auth::id())->get();
        cart::destroy($cartitems);

        return redirect('/')->with('status', "order placed successfully");

    

    }
}
