@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục sản phẩm
    </div>
    <div class="row w3-res-tb">

    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">

            </th>
            <th>Tên danh mục</th>
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_category_product as $key => $cate_pro)
          <tr>
            <td></td>
            <td>{{$cate_pro->category_name}}</td>
            <td><span class="text-ellipsis">
                <?php
                if($cate_pro->category_status==0){
                   ?>
                <a href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}"><span>Ẩn</span></a>
                <?php
                }else{
                ?>
                <a href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}"><span>Hiển thị</span></a>
                <?php
                }
                ?>
            </span></td>
            <td>
              <a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có muốn xóa ?')" href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

        </div>
      </div>
    </footer>
  </div>
</div>
@endsection
