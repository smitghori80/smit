<nav class="navbar navbar-dark sticky-top bg-dark  navbar-expand-md fixed-top flex-md-nowrap p-0">
<a href="{{url('/')}}" class="navbar-brand">
    <img src="{{URL::asset('dist/img/1.png')}}" alt="no" width="50px" height="25px" style="padding:0px;margin-left:30px">
    </a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
      
        <li class="nav-item dropdown " style="margin-right:100px">
            <a class="nav-link dropdown-toggle" href="" id="dropdown01" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">login </a>
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
    </nav>
    
  
  
