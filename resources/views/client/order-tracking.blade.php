@extends('client_layout')
@section('title', 'Theo dõi đơn hàng # - ITGoShop')
@section('client_content')
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>	
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="{{URL::to('/')}}">Trang chủ<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="{{URL::to('/')}}">Tài khoản<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="{{URL::to('/my-orders')}}">Đơn hàng của tôi<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="{{URL::to('/my-orders')}}">Chi tiết đơn hàng</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
	<!-- End Breadcrumbs -->
	<?php   
            $CustomerId = Session::get('CustomerId');
            $avt = Session::get('CustomerImage');
			if($avt == '')
				$avt = 'default-user-icon.png';
			$firstName = Session::get('CustomerFirstName');
			$lastName = Session::get('CustomerLastName');
            $fullname = $lastName.' '.$firstName ;
	?>

	<!-- Start Contact -->
	<div class="row gutters-sm pt-45 pl-60 pr-60 pb-80">
            <div class="col-md-3 mb-4">
              <div class="card">
			  <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{URL::to('public/images_upload/user/'.$avt)}}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                        <h4>Xin chào, {{$fullname}}!</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-4" >
                <ul class="list-group list-group-flush">
				  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h4 class="mb-0" >
						<i style="font-size: 20px; padding-right: 15px; font-weight:bold;" class="fa fa-user-circle-o" class="fa fa-user-circle-o" ></i> 
						<a href="{{URL::to('/profile/'.$CustomerId)}}" style="color:#333; font-weight:500;">Tài khoản</a>
					</h4>
                    
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h4 class="mb-0" >
						<i  style="font-size: 20px; padding-right: 15px; font-weight:bold;" class="fa fa-heart-o"  ></i>
						<?php
                            if($CustomerId) { ?>
                            <a href="{{URL::to('/wishlist')}}" style="color:#333; font-weight:500;">Sản phẩm yêu thích</a>
                        <?php } ?>
					</h4>
                    
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h4 class="mb-0">
						<i style="font-size: 20px; padding-right: 18px;" class="fa fa-history" class="fa fa-history" ></i>
						<a href="{{URL::to('/my-orders')}}" style="color:#333; font-weight:500;">Lịch sử mua hàng</a>
					</h4>
                  </li>
                  
                </ul>
              </div>
            </div>
            <div class="col-md-9">
            	<h3 style="margin: 20px 0px;">Theo dõi đơn hàng #{{$order_info->OrderId}}<p style="float:right;">Ngày đặt hàng: {{date("h:i d/m/Y", strtotime($order_info->OrderDate))}} </p></h3>
				<input type="text" class="OrderId" value="{{$order_info->OrderId}}" hidden>
				<div class="row">
					<div class="col-sm-8">
						<div class="card panel-default">
							<div class="panel-heading" style="background-color: white;line-height: 2.5;">
                                <b class="OrderStatus" style="font-size:18px; color:red">{{$order_info->OrderStatus}}</b>
                                <p>Được giao bởi ITGoFast</p>
                            </div>
							<div class="panel-body">
                            <table class="track_tbl">
                                <tbody>
                                    <tr class="active">
                                        <td class="track_dot">
                                            <span class="track_line"></span>
                                        </td>
                                        <td>
                                            <b>Dispatched from distibutor address</b><br>
                                            31/07/2018 22:24:PM
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="track_dot">
                                            <span class="track_line"></span>
                                        </td>
                                        <td>
                                            <b>Dispatched from distibutor address</b><br>
                                            31/07/2018 22:24:PM
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="track_dot">
                                            <span class="track_line"></span>
                                        </td>
                                        <td>
                                            <b>Dispatched from distibutor address</b><br>
                                            31/07/2018 22:24:PM
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="track_dot">
                                            <span class="track_line"></span>
                                        </td>
                                        <td>
                                            <b>Dispatched from distibutor address</b><br>
                                            31/07/2018 22:24:PM
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="track_dot">
                                            <span class="track_line"></span>
                                        </td>
                                        <td>
                                            <b>Dispatched from distibutor address</b><br>
                                            31/07/2018 22:24:PM
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="track_dot">
                                            <span class="track_line"></span>
                                        </td>
                                        <td>
                                            <b>Dispatched from distibutor address</b><br>
                                            31/07/2018 22:24:PM
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="track_dot">
                                            <span class="track_line"></span>
                                        </td>
                                        <td>
                                            <b>Dispatched from distibutor address</b><br>
                                            31/07/2018 22:24:PM
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="card panel-default" >
							<div class="panel-heading" style="background-color: white;"><h5><b style="font-size:16px;">Kiện hàng gồm</b></h5></div>
							<div class="panel-body" style="height:200px">
								
							</div>
						</div>
					</div>
				</div>
				
				<p><a href="{{URL::to('/my-orders')}}" style="text-decoration:none"><< Quay lại đơn hàng của tôi</a></p>
			</div>
            </div>
        </div>
	<!--/ End Contact -->
	<style type="text/css">
body{
    
    color: #1a202c;
    text-align: left;  
}
.card {
    box-shadow: 0 1px 3px 0 rgb(176, 190, 197), 0 1px 2px 0 rgb(144, 164, 174);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .5rem;
	font-size: 14px;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1.5rem;
}



.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
.modal-content p{
	color:black;
	font-size: 16px;
	line-height: 1.5;
}
</style>	


<style>
    @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css");
.track_tbl td.track_dot {
    width: 50px;
    position: relative;
    padding: 0;
    text-align: center;
}
.track_tbl td.track_dot:after {
    content: "\f111";
    font-family: FontAwesome;
    position: absolute;
    margin-left: -5px;
    top: 11px;
    color: #CCEBCC;
}
.track_tbl td.track_dot span.track_line {
    background: #CCEBCC;
    width: 1px;
    min-height: 50px;
    position: absolute;
    height: 150%;
}
.track_tbl tbody tr:first-child td.track_dot span.track_line {
    top: 30px;
    min-height: 25px;
}
.track_tbl tbody tr:last-child td.track_dot span.track_line {
    top: 0;
    min-height: 25px;
    height: 10%;
}
.track_tbl tr{
    height:70px;
}
.track_tbl tr:first-child td.track_dot:after{
    color: red;
    background: #CCEBCC;
    padding: 0px 5px;
    border-radius: 100%;
    margin-left: -9px;
}
</style>
@endsection