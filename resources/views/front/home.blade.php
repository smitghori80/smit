
@extends('front.master')


@section('contect')




<br><br>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
     

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <main role="main">


      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            <div class="col-md-4">
            <?php $products=DB::table('products')->get();?>
            @foreach($products as $product)
              <div class="card mb-4 box-shadow">
<!-- <img class="card-img-top" class="card-img" alt="Card image cap" src="{{url('image',$product->image)}}" alt=""> -->

                <img class="card-img-top" class="card-img" src="{{url('image',$product->image)}}" alt="Card image cap">
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
