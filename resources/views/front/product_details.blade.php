@extends('front.master')


@section('contect')
    <main role="main">



<br>
<br>
<br>
<br> 



<div class="container align-vertical hero">
<div class="row">
<div class="col-md-5 text-left">


</div>
</div><!--end of row-->
</div><!--end of container-->
</header>


  

  <section id="index-amazon">

 
    <div class="amazon">
<div class="container">

<div class="row">
<div class="col-md-12">
<div class="product">
<div class="row">
<div class="col-md-6 col-xs-12">

@foreach ($data as $product)



<div class="thumbnail">
             <img src="{{url('image',$product->image)}}" class="card-img">
                                <br>



</div>



<!-- ALT IMAGE  -->

 <div id="similar-product" class="carousel slide" data-ride="carousel">
                                
                                  <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                      <div class="d-flex justify-content-between align-items-center">
                                        <div class="item active">
                                          <a href=""><img src="{{url('images',$product->image)}}" alt=""></a>
                                          
                                        </div>
                                        <div class="item">
                                          <a href=""><img src="{{url('images',$product->image)}}" alt=""></a>
                                          
                                        </div>
                                        <div class="item">
                                          <a href=""><img src="{{url('images',$product->image)}}" alt=""></a>
                                         
                                        </div>
                                        
                                    </div>

                                  <!-- Controls -->
                                  <a class="left item-control" href="#similar-product" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                  </a>
                                  <a class="right item-control" href="#similar-product" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                  </a>
                                  </div>
                            </div>

    




</div>
<div class="col-md-5 col-md-offset-1">

<div class="product-details">

<h2 class="product-title">
 <h2><?php echo ucwords($product->pro_name);?></h2>
 <h5>{{$product->pro_info}}</h5>






 <form action="{{url('/cart/addItem')}}/<?php echo $product->id; ?>">


 @if($product->spl_price ==0)

 <span id="price">

 ₹{{$product->pro_price}}
  
  <input type="hidden" value="<?php echo $product->pro_price;?>" name="newPrice"/>


  @else


  <div class="d-flex justify-content-between align-items-center">

          <input type="hidden" value="<?php echo $product->spl_price;?>" name="newPrice"/>
            <p class="" style="text-decoration:line-through; color:#333">₹{{$product->spl_price}}</p>
             <img src="{{URL::asset('dist/images/shop/sale.png')}}" alt="..."  style="width:60px">
             <p class="">₹{{$product->pro_price}}</p>

             
           </div>


  @endif

 </span>
 </h2>
 <p><b>Availability:</b> In Stock</p>


  <select name="size" id='size'>



  </select>



  
 
<button class="btn btn-fefault cart" id="addToCart">
   <i class="fa fa-shopping-cart"></i>
   Add to cart
</button>


<input type="hidden" value="<?php echo $product->id; ?>" id="proDum"/>


</form>

<?php
  ?>

 
    
  <?php ?>
     <h3 style="color:green">Already Added to Wishlist <a href="{{url('/WishList')}}">wishlist</a></h3>
<?php ?>
<p class="">
 


</div>
</div>


  <!-- Start Review -->

  <!-- End of Review -->

@endforeach
</div>
</div>
</div>
</div><!-- /.row -->

        </div>
        </div>
      </section>


      <div class="no-padding-top section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#" class="load-more"><i class="fa fa-ellipsis-h"></i></a>
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </div>

                <!-- Recommends table -->


               <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>


                  </div><!--/recommended_items-->
                    
                </div>

@endsection