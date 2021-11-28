@extends('layout')
 @section('content')
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">

                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="0" data-max="100">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9 col-md-7">


                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <form>
                                    {{csrf_field()}}
                                    <span>Sort By</span>
                                        <select name="sort" id="sort">
                                            <option value="{{Request::url()}}?sort_by=none">Default</option>
                                            <option value="{{Request::url()}}?sort_by=tang_dan">Ascending</option>
                                            <option value="{{Request::url()}}?sort_by=giam_dan">Descending</option>
                                            <option value="{{Request::url()}}?sort_by=kytu_az">Name A->Z</option>
                                            <option value="{{Request::url()}}?sort_by=kytu_za">Name Z->A</option>
                                        </select>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                &nbsp;
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    @foreach($product as $key => $product1)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                            <form>
                        {{csrf_field()}}
                            <input type="hidden" value="{{$product1->product_id}}" class="cart_product_id_{{$product1->product_id}}">
                            <input type="hidden" value="{{$product1->product_name}}" class="cart_product_name_{{$product1->product_id}}">
                            <input type="hidden" value="{{$product1->product_image}}" class="cart_product_image_{{$product1->product_id}}">
                            <input type="hidden" value="{{$product1->product_price}}" class="cart_product_price_{{$product1->product_id}}">
                            <input type="hidden" value="1" class="cart_product_qty_{{$product1->product_id}}">
                                <div class="product__item__pic set-bg" data-setbg="{{URL::to('public/Upload/Product/'.$product1->product_image)}}">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a><i type="button" data-id_product="{{$product1->product_id}}" class="fa fa-shopping-cart add-to-cart" name="add-to-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{URL::to('/Chi-tiet-san-pham/'.$product1->product_id)}}">{{$product1->product_name}}</a></h6>
                                    <h5>${{$product1->product_price}}</h5>
                                </div>
                            </form>
                            </div>

                    </div>
                    @endforeach
                    </div>
                    {{$product->links()}}

                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

 @endsection
