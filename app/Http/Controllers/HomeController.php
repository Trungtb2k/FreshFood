<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderBy('product_id','desc')->limit(8)->get();
        return view('pages.home')->with('category',$cate_product)->with('all_product',$all_product);
    }
}
