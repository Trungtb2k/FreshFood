@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
    </div>
    <div class="row w3-res-tb">

    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">

            </th>
            <th>Tên sản phẩm</th>
            <th>Hình sản phẩm</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_product as $key => $pro)
          <tr>
            <td></td>
            <td>{{$pro->product_name}}</td>
            <td><img src="public/Upload/Product/{{$pro->product_image}}" height="100px" width="100px"></td>
            <td>{{$pro->category_name}}</td>
            <td>{{$pro->product_price}}</td>
            <td><span class="text-ellipsis">
                <?php
                if($pro->product_status==0){
                   ?>
                <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}"><span>Ẩn</span></a>
                <?php
                }else{
                ?>
                <a href="{{URL::to('/active-product/'.$pro->product_id)}}"><span>Hiển thị</span></a>
                <?php
                }
                ?>
            </span></td>
            <td>
              <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có muốn xóa ?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

      {{$all_product->links()}}
      </div>
    </footer>
  </div>
</div>
@endsection
