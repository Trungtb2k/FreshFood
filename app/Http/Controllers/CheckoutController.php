<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

session_start();

class CheckoutController extends Controller
{
    public function login_checkout(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        return view('pages.checkout.login_checkout')->with('category',$cate_product);
    }
}
