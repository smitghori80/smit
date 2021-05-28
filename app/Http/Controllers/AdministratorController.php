<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\orders;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
class AdministratorController extends Controller
{
    public function status($id)
    {

return view("Administrator/status",compact(['id']));
   }
   
   public function statusn(Request $request)
   {
// return view("admin/status");
 $id= $request->input('id');
 $status= $request->input('status');

 DB::update('update orders set status=? where id = ?',[$status,$id]);

 $user_id=Auth::user()->id;

      $orders=DB::table('Products')
    ->where('Products.user_id','=',$user_id)
   ->leftjoin('orders_product','orders_product.product_id','=','Products.id')
    ->leftjoin('orders','orders.id','=','orders_product.orders_id')
    ->leftjoin('users','users.id','=','orders.user_id')
   ->leftjoin('address','address.user_id','=','orders.user_id')
   ->get();

 return view('Administrator.order',compact('orders'));


  }

    public function customer()
    {
      
        $customer = User::all();
        
        
        return view("Administrator/customer",compact(['customer']));
    }
    
    //
    public function seller()
{ 


    {
      
        $seller = User::whereNotNull('admin')
        ->get();
        
        return view("Administrator/seller",compact(['seller']));
    }}
    public function order()
{
   
    $user_id=Auth::user()->id;

    $orders=DB::table('Products')
//   ->where('Products.user_id','=',$user_id)
 ->leftjoin('orders_product','orders_product.product_id','=','Products.id')
  ->leftjoin('orders','orders.id','=','orders_product.orders_id')
  ->leftjoin('users','users.id','=','orders.user_id')
 ->leftjoin('address','address.user_id','=','orders.user_id')
 ->get();

return view('administrator.order',compact('orders'));   
  
}
public function details($id)
{
    $name = DB::select('select name from users where id = :id', ['id' => $id]);
   
    $user_id=$id;
    $orders=DB::table('orders_product')->leftjoin('Products','Products.id','=','orders_product.Product_id')->leftJoin('orders','orders.id','=','orders_product.orders_id')->where('orders.user_id','=',$user_id)->get();
    return view('Administrator.details',compact('orders','name'));
    //return $name; 
}

}
