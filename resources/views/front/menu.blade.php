
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

      <a href="{{url('/')}}" class="navbar-brand">
    <img src="{{URL::asset('dist/img/1.png')}}" alt="no" width="50px" height="60px">
    </a>
 
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          
          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">home</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{url('/shop')}}">shop</a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin')}}">admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/create')}}">admin create</a>
          </li>

 <li class="nav-item dropdown">
 <a  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">categories <i class="fa fa-angle-down"></i></a>

<ul aria-lableledb="navbarDropdownMenuLink" class="dropdown-menu">
<?php $cats=DB::table('categories')->get();?>
@foreach($cats as $cat)
<li><a href="{{url('/')}}/products/{{$cat->id}}" class="dropdown-item">{{ucwords($cat->name)}}</a>
</li>
@endforeach
</ul>
</li>





          <li class="nav-item">
            <a class="nav-link disabled" href="{{url('/contact')}}">contact</a>
          </li>
     
        
        
      
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="dropdown01" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
          <?php if(Auth::check()){?>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">{{Auth::user()->name}}</a>
    
          <?php } if(Auth::check()) {?>


 
          
                                  
    <a class="dropdown-item" href="{{url('/profile')}}">profile</a>
                                 
      <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
    <?php } else {?>
      <div class="dropdown-menu" aria-labelledby="dropdown01">
 
    <a class="dropdown-item" href="{{url('/login')}}">login</a>
</div>
    <?php } ?>
            </div>
          
          </li>
        </ul>

<!-- <li class="list-inline-item"><a href="{{url('/login')}}">login</a></li> -->    
<li class="list-inline-item"><a href="{{url('/cart')}}"><i class="fa fa-shopping-cart">view cart </i> ({{Cart::count()}}) ({{Cart::total()}})</a></li>

</div>
        <form class="form-inline my-2 my-lg-0" method="post" action="/search" >
        @csrf
          <input class="form-control mr-sm-2" type="text" name="input" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
