<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\address;
use App\models\orders;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;



class CheckoutController extends Controller
{
    //
    public function index()
    {
        if(Auth::check())
        {
            $cartItems=Cart::content();
            
            return view('front.checkout',compact('cartItems'));
        //    echo "checkout";

        }
    
        else
        {

           return redirect('login');
        }
        // return redirect('home');

    }
public function formvalidate(Request $request)
{
    // $this->validate($request,['fullname'=>'required|min:5|max:35'],['fullname.required'=>'enter full name']);


    $this->validate($request,[
    
   'fullname'=>'required|min:5|max:35',
        'pincode'=>'required|numeric',
        'city'=>'required|min:5|max:35',
        'state'=>'required|min:5|max:35',
        'country'=>'required'
        ]);
$userid=Auth::user()->id;

        $address=new address;
        
        $address->fullname=$request->fullname;
        $address->state=$request->state;
        $address->city=$request->city;
        $address->payment_type="";

        $address->pincode=$request->pincode;
        $address->country=$request->country;
        $address->user_id=$userid;
        $address->save();

        
// dd('done');
orders::createOrder();

Cart::destroy();
return redirect('thankyou');

// dd($request->all());


        // 'fullname'=>'required|min:5|max:35',
        // 'username'=>'required|min:5|max:35',
        // 'password'=>'required|min:5|max:35',
        // 'cpassword'=>'required|min:5|max:35|name:password'],
        // [
        //     'fullname.required'=>'enter full name',
        //     'username.required'=>'enter username ',
        //     'password.required'=>'please provide a password',
        //     'cpassword.required'=>'password dose not match',

}


    


}
