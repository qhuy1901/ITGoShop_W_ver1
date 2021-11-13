<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class ProductListingController extends Controller
{
    public function product_listing()
    {
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
        $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->select('product.*', 'Category.*', 'brand.*','subbrand.*')
        ->orderby('productId', 'desc')->get();

        return view('client.product-listing')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('product_category_list', $product_category_list)
        ->with('all_product', $all_product);
    }
    public function product_listing2($CategoryId)
    {
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('subbrand')->orderby('SubBrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
        $all_product = DB::table('product')
        ->join('Category','Category.CategoryId','=','product.CategoryId')
        ->join('brand','brand.BrandId','=','product.BrandId')
        ->join('subbrand','subbrand.SubBrandId','=','product.SubBrandId')
        ->where('product.CategoryId',$CategoryId)->get();

        return view('client.product-listing2')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('product_category_list', $product_category_list)
        ->with('all_product', $all_product);
    }
}
