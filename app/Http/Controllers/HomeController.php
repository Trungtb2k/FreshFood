<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $cate_product1 = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->limit(4)->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderBy('product_id','desc')->limit(8)->get();
        return view('pages.home')->with('category',$cate_product)->with('category1',$cate_product1)->with('all_product',$all_product);
    }

    public function search(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $keywords = $request->keywords_submit;
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();
        return view('pages.product.search')->with('category',$cate_product)->with('search_product',$search_product);
    }

    public function show_contact(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        return view('pages.contact.show_contact')->with('category',$cate_product);
    }
}
