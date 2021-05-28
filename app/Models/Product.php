<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $primearyKey='id';
    protected $fillable=['pro_name','pro_code','pro_price','image','pro_info','categorie_id','spl_price','user_id'   ];
    use HasFactory;

public function categories()
{
    return $this->belongsToMany('Categorie','categories');

}

public function category()

{
    return $this->belongsTo(category::class);  
}


}

