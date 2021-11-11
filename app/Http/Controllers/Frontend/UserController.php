<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $orders = order::where('user_id', Auth::id())->get();
        return view('frontend.orders.index' , compact('orders'));
    }
    
    public function view($id)
    {
        $orders = order::where('id', $id )->where('user_id' , Auth::id())->first();
        return view('frontend.orders.view' , compact('orders'));
    }
}
