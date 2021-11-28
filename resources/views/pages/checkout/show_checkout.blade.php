@extends('layout')
@section('content')
     <!-- Checkout Section Begin -->
     <section class="checkout spad">
        <div class="container">

            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="{{URL::to('/save-checkout-customer')}}" method="POST">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="checkout__input">
                                <p>Name<span>*</span></p>
                                <input type="text" name="shipping_name">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="shipping_address">
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="shipping_phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="shipping_email">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text" name="shipping_notes"
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">

                            <div class="checkout__order">
                                <h4>Your Order</h4>

                                <div class="checkout__order__products">Products <span>Total</span></div>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach(Session::get('cart') as $key => $cart)
                                    @php
                                        $subtotal = $cart['product_price']*$cart['product_qty'];
                                        $total+=$subtotal;
                                    @endphp
                                    <ul>
                                        <li>{{$cart['product_name']}}<span>{{$cart['product_price']*$cart['product_qty']}}</span></li>
                                    </ul>
                                @endforeach
                                    <div class="checkout__order__total">Total <span>{{$total}}</span></div>

                                <form method="POST" action="{{URL::to('/save-checkout-customer')}}">
                                    {{csrf_field()}}
                                    <div class="checkout__input__checkbox">
                                        <label for="payment">
                                            Payment on delivery
                                            <input type="checkbox" name="payment_option" value="1" id="payment">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="checkout__input__checkbox">
                                        <label for="paypal">
                                        Credit Card
                                            <input type="checkbox" name="payment_option" value="2" id="paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </form>
                                <button type="submit" name="send_order" class="site-btn">PLACE ORDER</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
