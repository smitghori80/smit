@extends('administrator.master')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

<section id="cart_items">
    <div class="container">
            </ol>
        </div><!--/breadcrums-->



        <div class="row">


        <div class="col-md-4 well well-sm">


        </div>
           
            <div class="col-md-8">
               <h3 ><span style='color:green'>
               @foreach ($name as $device)
		{{$device->name}}
        @endforeach
               </span>,  Your Orders</h3>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Product name</th>
                            <th>Product Code</th>
                            <th>Order Total</th>
                            <th>Order Status</th>

                           

                        </tr>
                    </thead>

                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->created_at}}</td>
                            <td>{{ucwords($order->pro_name)}}</td>
                            <td>{{$order->pro_code}}</td>
                            <td>{{$order->total}}</td>
                            <td>{{$order->status}}</td>
                           
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</section>




@endsection

