@extends('Administrator.master')
@section('content')


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


<h1>Display Radio Buttons</h1>

<form action="/statusn" method="post">
@csrf
  <p>Please select your gender:</p>
  <input type="radio" id="pending" name="status" value="pending">
  <label for="pending">pending</label><br>
  <input type="radio" id="female" name="status" value="complete">
  <label for="complete">complete</label><br>
  <input type="radio" id="failed" name="status" value="failed">
  <label for="failed">failed</label><br>
  <input type="radio" id="underprocess" name="status" value="underprocess">
  <label for="underprocess">underprocess</label>

<input id="invisible_id" name="id" type="hidden" value="{{$id}}">
  <input type="submit" value="Submit">
</form>
@endsection
