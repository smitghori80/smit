@extends('administrator.master')

@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
<table class="table table-responsive">
                    <thead>
                        <tr>
						<th>pro_name</th>
                            <th>pro_code</th>
                            <th>pro_price</th>
                            <th>pro_code</th>
                            <th>qty</th>
                            <th>status</th>
				            <th>name</th>
                            <th>state</th>
                            <th>city</th>
                            <th>country</th>
                            <th>email</th>
                            <th>pincode</th>
                            <th>status chenge</th>


                           

                        </tr>
                    </thead>

                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ucwords($order->pro_name)}}</td>
                            <td>{{$order->pro_code}}</td>
                            <td>{{$order->pro_price}}</td>
                            <td>{{$order->pro_code}}</td>
                            <td>{{$order->qty}}</td>
                            <td>{{$order->status}}</td>
				            <td>{{$order->name}}</td>
                            <td>{{$order->state}}</td>
                            <td>{{$order->city}}</td>
                            <td>{{$order->country}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->pincode}}</td>


							<td><a href="{{url('/administrator/status',$order->orders_id)}}/"> status chenge  </a>  </td>

                           
                        </tr>
                        @endforeach
                    </tbody>

                </table>
@endsection
	





