<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;

class FrontendController extends Controller
{
   public function index()
   {
       $featured_products = Product::where('trending','1')->take(15)->get();
       $trending_category = category::where('popular', '1')->take(15)->get();
       return view('frontend.index', compact('featured_products' ,'trending_category'));
   }
   public function category()
   {
       $category = category::where('status','0')->get();
       return view('frontend.category', compact('category'));
   }
   public function viewcategory($slug)
   {
       if(category::where('slug',$slug)->exists())
       {
           $category = category::where('slug', $slug)->first();
           $products = product::where('cate_id', $category->id)->where('status', '0')->get();
        return view('frontend.products.index',compact('category','products'));

       }
       else
       {
           return redirect('/')->with('status','slug does not exist');
       }
    
   }

   public function productview($cate_slug , $prod_slug)
   {
    if(category::where('slug',$cate_slug)->exists())
    {
        if(product::where('slug',$prod_slug)->exists())
       {
        $products = product::where('slug',$prod_slug)->first();
        return view('frontend.products.view', compact('products'));

       }
       else
       {
        return redirect('/')->with('status',"The link was broken");
       }
    }
    else 
    {
        return redirect('/')->with('status',"No search category found");
    }

   }


}
