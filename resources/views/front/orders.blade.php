@extends('front.master')
@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh and Organic</p>
                        <h1>My Orders</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <div class="container mt-150 mb-150" >
        @if($orders->isEmpty())
            <h1>You have no orders yet. </h1>
                <a href="{{ url('products') }}">Continue Shopping</a>
        @else
            @foreach($orders as $order)
                <div class="card mb-3">
                    <div class="card-header">
                        <strong>Order #{{ $order->id }}</strong>
                        <span class="float-right">Total: ${{ number_format($order->total_price, 2) }}</span>
                    </div>
                    <div class="card-body">
                        <p><strong>Date:</strong> {{ $order->created_at->format('F d, Y') }}</p>
                        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                        <h5>Order Items:</h5>

                        <div class="row">
                            @foreach($order->products->all() as $item)
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <!-- Display product image -->
                                        <div class="card-body">
                                        <img src="{{ url( $item->image) }}" style="height: 100px; ">
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <p class="card-text">Quantity: {{ $item->pivot->quantity }}</p>
                                            <p class="card-text">Price: ${{ number_format($item->pivot->price, 2) }}</p>
                                            <p class="card-text">Total: ${{ number_format($item->pivot->quantity * $item->pivot->price, 2) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
{{--    <div class="container mt-150 mb-150" >--}}
{{--        @if($orders->isEmpty())--}}
{{--            <h1>You have no orders yet.</h1>--}}
{{--        @else--}}
{{--            @foreach ($orders as $order)--}}
{{--                <div class="card mb-4">--}}
{{--                    <div class="card-header">--}}
{{--                        <strong>Order #{{ $order->id }}</strong> - {{ $order->created_at->format('F d, Y') }}--}}
{{--                        <span class="float-right">Status: {{ ucfirst($order->status) }}</span>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <ul class="list-group">--}}
{{--                            @foreach ($order->products->all() as $item)--}}
{{--                                <li class="list-group-item d-flex justify-content-between align-items-center">--}}
{{--                                    <div class="row">--}}
{{--                                        <img src="{{url($item->image)}}" height="100px">--}}
{{--                                        <div class="col-md-4" >--}}
{{--                                            <h5>{{ $item->name }}</h5>--}}
{{--                                            <p>Quantity: {{ $item->pivot->quantity }}</p>--}}
{{--                                        </div>--}}
{{--                                       <div >--}}
{{--                                        <span>Price: ${{ number_format($item->price, 2) }}</span>--}}
{{--                                       </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="card-footer">--}}
{{--                        <strong>Total Price: ${{ number_format($order->total_price, 2) }}</strong>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        @endif--}}
{{--    </div>--}}
@endsection
