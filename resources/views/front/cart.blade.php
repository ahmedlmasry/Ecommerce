@extends('front.master')
@inject('categories','App\Models\Category')
@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh and Organic</p>
                        <h1>Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        @include('flash::message')
                        @if($items->isEmpty())
                            <h1>Your cart is empty</h1>
                        @else
                            <table class="cart-table">
                                <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove"></th>
                                    <th class="product-image">Product Image</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-action">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $cart)
                                    <tr class="table-body-row">
                                        <td class="product-remove"><a href="{{url('remove-cart',$cart->id)}}"><i
                                                    class="far fa-window-close"></i></a></td>
                                        <td class="product-image"><img src="{{url($cart->product->image)}}" alt=""></td>
                                        <td class="product-name">{{$cart->product->name}}</td>
                                        <td class="product-price">{{$cart->product->price}}</td>
                                        <form action="{{url('update-cart',$cart->id)}}" method="get"
                                              class="update-cart-form">
                                            @csrf
                                            <td class="product-quantity"><input id="quantity" name="quantity" min="1"
                                                                                type="number" placeholder="1"
                                                                                value="{{$cart->quantity}}"></td>
                                            <td class="product-quantity">
                                                <button type="submit" class="btn btn-outline-primary">Update cart
                                                </button>

                                            </td>
                                        </form>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
                @if(!$items->isEmpty())
                    <div class="col-lg-4">
                        <div class="total-section">
                            <table class="total-table">
                                <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Total</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="total-data">
                                    <td><strong>Subtotal: </strong></td>
                                    <td>{{$total}}</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Shipping: </strong></td>
                                    <td>$45</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>
                                    <td>{{$total+=50}} </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="cart-buttons">
                                <a href="{{url('checkout')}}" class="boxed-btn black">Check Out</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- end cart -->
@endsection
