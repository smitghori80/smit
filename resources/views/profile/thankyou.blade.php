@extends('front.master')

@section('contect')


<style>

table td {
    padding:10px
}
</style>
<br><br>
<br><br>
<br><br>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="active">
                    dashboard
                </li>
                <h3>
                    <samp style='color:green'>{{ucwords(Auth::user()->name)}}</samp>
               welcome
                </h3>
            </ol>
        </div>
    </div>
</section>

@endsection
