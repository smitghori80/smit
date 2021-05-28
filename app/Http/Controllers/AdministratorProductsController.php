<?php


    //<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\about;
use App\Models\altimages;
use App\Models\pro_cat;
use App\Models\Categorie;
use App\Models\products_properties;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Storage;
use Images;




class AdministratorProductsController extends Controller
{
    //
   public function index()
   {
$products =Product::all();

      return view('Administrator.product.index',compact('products'));

   }


   public function create()
{
  

  
     $categories=Categorie::pluck('name','id');
     return view('Administrator.product.create',compact('categories'));
    
   // return view('Administrator.product.create');
}

public function store(Request $request)
{
    $formInput=$request->except('image');
    $this->validate($request,[
       'pro_name'=>'required',
       'pro_code'=>'required',
       'pro_price'=>'required',
       'pro_info'=>'required',
        'user_id'=>'required',
       'spl_price'=>'required',

    // 'image'=>'image|mimes:png,jpg,jpeg|max:10000'
    ]);
    $image=$request->image;
    if($image)
    {
        $imageName=$image->getClientOriginalName();
        $image->move('image',$imageName);
        $formInput['image']=$imageName;
    }
    
      $categories=Categorie::all();
 product::create($formInput);


//  //return $formInput;
    return redirect()->back();

// //   $pro_name=$request->input('pro_name');
// //   $pro_code=$request->input('pro_code');
// //   $pro_price=$request->input('pro_price');
// //   $pro_info=$request->input('pro_info');
// //   $categorie_id=$request->input('categorie_id');
// //   $spl_price=$request->input('spl_price');
// // echo $categorie_id;
// //   DB::insert('insert into products (pro_name,	pro_code,pro_price,pro_info,categorie_id,spl_price) values (?,?,?,?,?,?)',[$pro_name,$pro_code,$pro_price, $pro_info, 1,$spl_price]);
//return $formInput;
}

public function show($id)
{
    $product=Product::findOrFail($id);
    return view('product.show',compact('products'));
}

public function destroy($id)
{
    product::destroy($id);
    return redirect()->back();

  
}





}
