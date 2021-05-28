<?php

namespace App\Http\Controllers;
use App\models\Categorie;
use App\models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    //

public function index()
{
    $categories=Categorie::all();
// return $categoriess
     return view('administrator.category.index',compact(['categories'])); 
}

public function create()
{
}

public function store(Request $request)
{
    // $user= Categories::all();
    // $user = new User;
    
    // $user->name = 'name';
    // $user->save();
  $name=$request->input('name');
     DB::insert('insert into categories (name) values (?)',[$name]);
   // echo $request;

   // Categorie::create($request->all());
     return back();
}
public function show($id)
{

  // $products=Categorie::find($id)->products;

    //$categories=Categorie::all();
    
    //eturn view('admin.category.index',compact(['categories','products']));
    
}


public function edit($id)
{

  
}

public function update(Request $request,$id)
{

  
}
public function destory($id)
{

  
}

}
