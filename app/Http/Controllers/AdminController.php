<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\orders;
use App\Models\users;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $products=Product::all();
        $Categories=Categorie::all();
        return view('front.home');
    }

    public function login()
    {
        // $id=Auth::user()->admin  
        
        // DB::update('update users set admin = ? where id = ?',[1,$id]);
      //  return view('admin');
    }
    public function order()
    {
      $user_id=Auth::user()->id;
      //  $orders=DB::table('orders_product')
      //  ->leftjoin('Products','Products.id','=','orders_product.Product_id')
      //  ->leftJoin('orders','orders.id','=','orders_product.orders_id')
      //   ->where('orders.user_id','=',$user_id)->get();
      // $orders=DB::table('Products')->leftjoin('Products','Products.user_id','=',$user_id)
      // ->get();
           $orders=DB::table('Products')
         ->where('Products.user_id','=',$user_id)
        ->leftjoin('orders_product','orders_product.product_id','=','Products.id')
       
         ->leftjoin('orders','orders.id','=','orders_product.orders_id')

         ->leftjoin('users','users.id','=','orders.user_id')
        ->leftjoin('address','address.user_id','=','orders.user_id')

      //  ->leftJoin('orders','orders.id','=','orders_product.orders_id')
        // ->where('orders.user_id','=',$user_id)
        ->get();
     
      return view('admin.order',compact('orders'));
    //return $orders;
    }
      
  public function info($id)

    {

    }
      public function status($id)
     {

return view("admin/status",compact(['id']));
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
 
  return view('admin.order',compact('orders'));


   }
    public function profile()
    {
$id=Auth::user()->id;
$add = DB::select('select * from address where user_id = :user_id', ['user_id' => $id]);

$profile = DB::select('select * from users where id = :id', ['id' => $id]);

return view("admin/profile",compact(['profile','add']));
   }
   public function create()
   {
$id=Auth::user()->id;
       
    DB::update('update users set admin=? where id = ?',[1,$id]);
    return redirect()->back();

  } 
  public function delete()
  {
$id=Auth::user()->id;
DB::update('update users set admin=? where id = ?',[null,$id]);

      
   return redirect()->back();

 } 
}
