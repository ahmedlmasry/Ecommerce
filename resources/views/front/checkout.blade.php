@extends('front.master')
@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh and Organic</p>
                        <h1>Check Out Product</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- check out section -->

    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-accordion-wrap">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                            Billing Address
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                     data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="billing-address-form">
                                            <form action="{{url('create-order')}}" method="post">
                                                @csrf
                                                {{--                                                <p><input type="text" placeholder="Name"></p>--}}
                                                {{--                                                <p><input type="email" placeholder="Email"></p>--}}
                                                <p><input name="address" type="text" placeholder="Address"></p>
                                                {{--                                                <p><input  type="tel" placeholder="Phone"></p>--}}
                                                <p><textarea name="note" id="bill" cols="30" rows="10"
                                                             placeholder="note"></textarea></p>
                                                <div class="form-group">
                                                    <label for="payment_method">Payment Method</label>
                                                    <select class="form-control" id="payment_method" name="payment_method" required>
                                                        <option value="credit_card">Credit Card</option>
                                                        <option value="paypal">PayPal</option>
                                                    </select>
                                                </div>
                                                <br>
                                                <button type="submit" class="btn btn-primary  mt-4">Place Order</button>


                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="order-details-wrap">
                        <table class="order-details">
                            <thead>
                            <tr>
                                <th>Your order Details</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody class="order-details-body">
                            <tr>
                                <td>Product</td>
                                <td>Total</td>
                            </tr>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item->product->name}}</td>
                                    <td>{{$item->total_price}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tbody class="checkout-details">
                            <tr>
                                <td>Subtotal</td>
                                <td>{{$total}}</td>
                            </tr>
                            <tr>
                                <td>Shipping</td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>{{$total+=50}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <a href="{{url('order')}}" class="boxed-btn">Place Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end check out section -->
@endsection
