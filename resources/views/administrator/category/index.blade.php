@extends('administrator.master')
@section('content')
 

<main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">


<a href="#" class="navbar-brand">Categories =></a>


@if(!empty($categories))

@foreach($categories as $category)
<ul >
<li class="active">
<a href="{{route('category.show',$category->id)}}">{{$category->name}}</a></li>
</ul>


@endforeach
<main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">

@endif
<div class="row">
  <br>
<br>
<br>
<br>
    <div class="col-md-6">

<h3>Categories</h3>


</div>
  

      <div class="col-md-4">

  
           <div class="card card-body bg-success text-white py-5">
       <h2>Create Category</h2>
       <p class="lead">Lorem Ipsum has been the industry's standard dummy text ever since the</p>
          {!! Form::open(['route' => 'category.store', 'method' => 'POST']) !!}
            <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>

            <td>Category Status</td>

         
   
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Category</button>

          {!! Form::close() !!}

     </div>
        
                {!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}
              
                    
                </div>
                {!! Form::close() !!}
            </div><!-- /.modal-content -->
            {{--products--}}
    @if(isset($products))

    <h3>Products</h3>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Products</th>
            </tr>
        </thead>
        <tbody>
@forelse($products as $product)
    <tr><td>{{$product->name}}</td></tr>
        @empty
        <tr><td>no data</td></tr>
        @endforelse

        </tbody>
    </table>
    </main>
    @endif
    </div>

</div>


  
@endsection
