<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Product;
use App\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products=Product::all();
        $Categories=Categorie::all();
        return view('front.home');
    }

    public function shop()
    {
        $products=Product::all();
        $Categories=Categorie::all();

        // return $products;

        return view('front.shop',['products'=>$products]);
        return view('front.shop',compact(['Categories','products']));

    }
    public function contact()
    {
        return view('front.contact');
    }
    public function product_details($id)
    {   
         $data = DB::select('select * from products where id = :id', ['id' => $id]);
  //$data= DB::table('products')->find($id);

    //   $data=Product::findOrfail($id);
        // $data=Product::all();
    //    return $products;
     //return view('front.product_details',['data'=>$data]);
//  return $data;
 return view('front.product_details',compact('data'));
    }
    public function search(Request $request )
{
    
   // $data = DB::select('select id from Categorie where pro_name = :pro_name', ['pro_name' => 'patel']);
   $products = DB::select('select * from products where pro_name = :pro_name', ['pro_name' => $request]);

  //  $products=Product::all();
     $Categories=Categorie::all();

 $name= $request->input('input');

     $products = DB::select('select * FROM products WHERE pro_name  like :pro_name', ['pro_name' => $name]);

  // return view('front.shop',['products'=>$products]);
    return view('front.shop',compact(['Categories','products']));
  
}
public function searc($name)
{
    
   // $data = DB::select('select id from Categorie where pro_name = :pro_name', ['pro_name' => 'patel']);
    $products = DB::select('select * from products where Categorie_id = :Categorie_id', ['Categorie_id' => $name]);

  //  $products=Product::all();
    $Categories=Categorie::all();

     //return $data;

   
    return view('front.shop',compact(['Categories','products']));
  
}
}
