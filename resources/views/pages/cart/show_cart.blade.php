@extends('layout')
@section('content')

 <!-- Shoping Cart Section Begin -->
 <section class="shoping-cart spad">

        <div class="container">
        <form action="{{url('/update-cart')}}" method="POST">
            {{csrf_field()}}
            <div class="row">
                <div class="col-lg-12">

                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                               @foreach(Session::get('cart') as $key => $cart)
                                    @php
                                            $subtotal = $cart['product_price']*$cart['product_qty'];
                                            $total+=$subtotal;
                                    @endphp
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="{{asset('public/upload/product/'.$cart['product_image'])}}" alt="{{$cart['product_name']}}" width="100px" height="100px">
                                            <h5>{{$cart['product_name']}}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{$cart['product_price']}}
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" name="cart_qty[{{$cart['session_id']}}]"
                                                    value="{{$cart['product_qty']}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            {{$subtotal}}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a class="icon_close" href="{{url('/del-product/'.$cart['session_id'])}}"></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{URL::to('/')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <input type="submit" value="Update Cart" name="update_qty" class="primary-btn cart-btn cart-btn-right">
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" name="coupon" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn check_coupon">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                </form>

                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>{{$total}}</span></li>
                            <li>Total <span>{{$total}}</span></li>
                        </ul>
                        <a href="{{URL::to('/login-checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>

            </div>
        </form>
        </div>

    </section>
    <!-- Shoping Cart Section End -->

@endsection

