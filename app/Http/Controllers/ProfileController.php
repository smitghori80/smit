<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

    use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use App\models\address;
use App\models\orders;
use App\models\Product;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{

    public function index()
    {
        return view('profile.index');
    }
public  function orders()
{
    $user_id=Auth::user()->id;
    $orders=DB::table('orders_product')->leftjoin('Products','Products.id','=','orders_product.Product_id')->leftJoin('orders','orders.id','=','orders_product.orders_id')->where('orders.user_id','=',$user_id)->get();
    return view('profile.orders',compact('orders'));
}


public function Address()
{
$user_id=Auth::user()->id;
$address_data=DB::table('address')->where('user_id','=',$user_id)->orderby('id','DESC')->get(); 
    return view('profile.address',compact('address_data'));
}
public function updateAddress(Request $request)
{
    // return 'hi';
    // dd($request->fullname);
$this->validate($request,[
'fullname'=>'required|min:5',
'pincode'=>'required|numeric',
'city'=>'required|min:5',
'state'=>'required|min:5',
'country'=>'required',

]);

$userid=Auth::user()->id;
DB::table('address')->where('user_id',$userid)->update($request->except('_token'));
return back()->with('msg','Your address has been update');


}

public function password()
{
    return view('profile.updatePassword');
}
public function updatePassword(Request $request)
{
// echo 'here';
$oldPassword=$request->oldPassword;
$newPassword=$request->newPassword;


if(!Hash::check($oldPassword,Auth::user()->password))
{
    return back()->with('msg','the specified password does not match the database password');

}
else{
        
    $request->user()->fill(['password'=>Hash::make($newPassword)])->save();
    return back()->with('msg','Your address has been update');

}

}

}
