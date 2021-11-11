<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class HomeController extends Controller
{
    public function index()
    {
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
        $all_blog = DB::table('blog')->orderby('BlogId', 'desc')->limit(3)->get();
        $slider_list = DB::table('bannerslider')->where('SliderStatus', '=', 1)->orderby('SliderId', 'desc')->limit(4)->get();

        
        $all_product = DB::table('product')->where('status', 1)->orderby('Discount', 'desc')->limit(8)->get();
        $top_product = DB::table('product')->where('status', 1)->orderby('Sold', 'desc')->limit(3)->get();
        return view('client.home')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('product_category_list', $product_category_list)
        ->with('all_product', $all_product)
        ->with('top_product', $top_product)
        ->with('all_blog', $all_blog)
        ->with('slider_list', $slider_list);
    }

    public function check_password(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $result = DB::table('user')->where('email', $email)->where('password', $password)->where('Admin', 0)->first();
        if($result == true)
        {
            // Session::put('CustomerFirstName', $result->FirstName);
            // Session::put('CustomerLastName', $result->LastName);
            // Session::put('CustomerImage', $result->UserImage);
            Session::put('CustomerId', $result->UserId);
            return Redirect::to('/home');
        } 
        else{
            Session::put('message', 'Mật khẩu hoặc tài khoản sai. Xin nhập lại!');
            return Redirect::to('/login');
        }
    }

    public function login(Request $request)
    {
        return view('customer-login');
    }

    public function logout()
    {
        Session::put('CustomerId', null);
        return Redirect::to('home');
    }
}
