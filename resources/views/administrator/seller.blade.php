@extends('administrator.master')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
<table class="table table-condensed">
	<tr>
	
	<th>name</th>
	<th>email</th>

	</tr>

		
	

    @foreach ($seller as $device)
	<tr>
	<td>{{$device->name}}</td>
	<td>{{$device->email}}</td>
	</tr>
@endforeach





	
  </table>
@endsection
