
@extends('front.master')
@section('contect')
    <main role="main">

     

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
          <div class="col-md-4">

          @foreach ($products as $product)
          <div class="card mb-4 box-shadow">
<!-- <img class="card-img-top" class="card-img" alt="Card image cap" src="{{url('image',$product->image)}}" alt=""> -->

                <img class="card-img-top" class="card-img" src="{{url('image',$product->image)}}" alt="Card image cap" >
                <div class="card-body">
                  <p class="card-text">{{$product->pro_name}}</p>
                  <hr>
                  <p class="card-text">₹{{$product->pro_price}}</p>

                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                
    
                    <a href="{{url('/product_detils')}}/<?php echo $product->id; ?>" class="add-to-cart addcart"> <button type="button" class="btn btn-sm btn-outline-secondary">view product</button></a>
                   
                    <a href="{{('/cart/addItem')}}/<?php echo $product->id;?>" class="add-to-cart addcart"> <button type="button" class="btn btn-sm btn-outline-secondary">Add to cart <i class="fa fa-shopping-cart"></i></button></a>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>  
               
@endforeach
</div>
         
         </div>
       </div>
     </div>       
      
        
            
    </main>

    @endsection