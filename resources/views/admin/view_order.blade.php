@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin khách hàng
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>

            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <td>{{$order_1->customer_name}}</td>
            <td>{{$order_1->customer_phone}}</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</div>
<br></br>

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin vận chuyển
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên người mua</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
          </tr>
        </thead>
        <tbody>
          <tr>

            <td>{{$order_2->shipping_name}}</td>
            <td>{{$order_2->shipping_address}}</td>
            <td>{{$order_2->shipping_phone}}</td>

          </tr>
        </tbody>
      </table>
    </div>

  </div>
</div>

<br></br>

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê chi tiết đơn hàng
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>

            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thành tiền</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($order_by_Id as $v_content)
          <tr>
            <td>{{$v_content->product_name}}</td>
            <td>{{$v_content->product_quantity}}</td>
            <td>{{$v_content->product_price}}</td>
            <td>{{$v_content->product_price*$v_content->product_quantity}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection
