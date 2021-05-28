@extends('admin.master')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

@forelse($products as $product)

<li>
    <h4>Name of protected:{{$product->pro_name}}</h4>
<form action="{{route('product.destroy',$product->id)}}" method="POST">
  @csrf
    {{method_field('DElETE')}}
    <input class="btn btn-sm btn-danger" type="submit" value="Delete">
</form>

</li>
@empty
<h3>Nom Products</h3>

@endforelse
@endsection