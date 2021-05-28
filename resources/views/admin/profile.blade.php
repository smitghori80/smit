@extends('admin.master')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
<table class="table table-condensed">
	<tr>
	
	<th>name</th>
	<th>email</th>
	<th>state</th>
	<th>city</th>
	<th>country</th>
	<th>pincode</th>
	</tr>
	<tr>
		
	

    @foreach ($profile as $device)

	<td>{{$device->name}}</td>
	<td>{{$device->email}}</td>
@endforeach

    @foreach ($add as $device)
	
	<td>{{$device->state}}</td>
	<td>{{$device->city}}</td>
	<td>{{$device->country}}</td>
	<td>{{$device->pincode}}</td>
		

@endforeach



	</tr>
  </table>
@endsection
