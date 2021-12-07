<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class BrandController extends Controller
{
    public function auth_login() //Kiểm tra việc đăng nhập, không để user truy cập vô hệ thống bằng đường dẫn mà chưa đăng nhập
    {
        // Hàm kiểm tra có admin_id hay không
        $UserId = Session::get('UserId');
        if($UserId)
        {
            return Redirect::to('dashboard');
        }
        else
        {
            return Redirect::to('admin')->send(); // Nếu chưa đăng nhập thì quay lại trang login
        }
    }

    public function add_brand()
    {
        $this->auth_login();
        return view('admin.add_brand');
    }
    public function add_subbrand()
    {
        $this->auth_login();
        $brand_list = DB::table('brand')->orderby('BrandId', 'desc')->get();
        return view('admin.add_subbrand')
        ->with('brand_list', $brand_list);
    }
    public function view_brand()
    {
        // // Lấy hết dữ liệu trong bảng brand
        $all_brand = DB::table('brand')->get();
        $manager_brand = view('admin.view_brand')->with('all_brand', $all_brand);
        // // biến chứa dữ liệu  $all_brand đc gán cho all_brand'
        return view('admin_layout')->with('admin.view_brand', $manager_brand);
    }
    public function view_subbrand()
    {
        // // Lấy hết dữ liệu trong bảng subbrand
        $all_subbrand = DB::table('subbrand')
        ->join('brand','brand.BrandId','=','subbrand.BrandId')->get();
        $manager_subbrand = view('admin.view_subbrand')->with('all_subbrand', $all_subbrand);
        return view('admin_layout')->with('admin.view_subbrand', $manager_subbrand);
    }
    public function save_brand(Request $request)
    {
        $data = array();
        $data['BrandName'] = $request->BrandName;
        $data['description'] = $request->description;
        $data['status'] = $request->status;

        DB::table('brand')->insert($data);
        Session::put('message', 'Thêm thương hiệu sản phẩm thành công');
        return Redirect::to('add-brand');
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
    }

    public function save_subbrand(Request $request)
    {
        $data = array();
        $data['SubBrandId'] = $request->SubBrandId;
        $data['SubBrandName'] = $request->SubBrandName;
        $data['BrandId'] = $request->BrandId;

        DB::table('brand')->insert($data);
        Session::put('message', 'Thêm thương hiệu nhánh thành công');
        return Redirect::to('add-subbrand');
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
    }

    public function active_brand($BrandId)
    {
        // Câu truy vấn SQL  WHERE 
        DB::table('brand')->where('id', $BrandId)->update(['status'=>1]); // [ ] là cái cột, cái mảng
        Session::put('message','Hiển thị thương hiệu sản phẩm thành công');
        return Redirect::to('view-brand');

    }

    public function unactive_brand($BrandId)
    {
        DB::table('brand')->where('BrandId', $BrandId)->update(['status'=>0]); 
        Session::put('message','Ẩn danh mục sản phẩm thành công');
        return Redirect::to('view-brand');
    }

    public function active_subbrand($SubBrandId)
    {
        // Câu truy vấn SQL  WHERE 
        DB::table('subbrand')->where('id', $SubBrandId)->update(['status'=>1]); // [ ] là cái cột, cái mảng
        Session::put('message','Hiển thị thương hiệu thành công');
        return Redirect::to('view-subbrand');

    }

    public function unactive_subbrand($SubBrandId)
    {
        DB::table('subbrand')->where('SubBrandId', $SubBrandId)->update(['status'=>0]); 
        Session::put('message','Ẩn danh mục sản phẩm thành công');
        return Redirect::to('view-subbrand');
    }


    public function get_brand_info($BrandId)
    {
        // // Lấy hết dữ liệu trong bảng brand
        $update_brand = DB::table('brand')->where('id',$BrandId)->get();  // first: lấy dòng đầu tiên
        $manager_brand = view('admin.update_brand')->with('update_brand', $update_brand);
        // // biến chứa dữ liệu  $all_brand đc gán cho all_brand'
        return view('admin_layout')->with('admin.update_brand', $manager_brand);
    }

    public function update_brand(Request $request, $BrandId)
    {
        $data = array();
        $data['BrandName'] = $request->BrandName;
        $data['description'] = $request->description;

        DB::table('brand')->where('id', $BrandId)->update($data);
        Session::put('message', 'Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('view-brand');
    }

    public function delete_brand($BrandId)
    {
        DB::table('brand')->where('id', $BrandId)->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công');
        return Redirect::to('view-brand');
    }

    public function delete_subbrand($SubBrandId)
    {
        DB::table('subbrand')->where('id', $SubBrandId)->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công');
        return Redirect::to('view-subbrand');
    }
}
