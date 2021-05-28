<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use hardevine\shoppingcart\Facades\DB;



// use Gloudemans\Shoppingcart\Facades\Cart;



class CartController extends Controller
{

    //


    public function index()
    {
       $cartItems=Cart::content();
      
        return view('cart.index',compact('cartItems'));
    }
    public function addItem($id)
    {
     
 $product= DB::table('products')->find($id);

        //    $product=products::find($id);
       Cart::add($id,$product->pro_name,1,$product->pro_price,['img'=>$product->image]);
        // return view('cart.index');
    //     echo $id;
    return back();

    }

    
    public function destroy($id)
    {
       Cart::remove($id);
        // echo $id;
        return back();

    }

    public function update(Request $request ,$id)
    {
       
      //  echo $id;
        // echo $request->qty;
        // echo $request->pro_qty;
// dd($request->qty);
        
Cart::update($id,$request->qty);

return back();

    }
}
