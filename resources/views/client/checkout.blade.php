@extends('client_layout')
@section('client_content')
<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index.html">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="blog-single.html">Checkout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
<section>
			<div class="container">
				<div class ="col-lg-12" style="margin: 20px 0px 0px 0px; padding-right: 0px;padding-left: 0px;">
					<div class="panel panel-default">
						<div class="panel-body" style=" background-color: #77ACF1; color:white ; font-size: 14px;">
							Do ảnh hưởng của dịch Covid-19, một số khu vực có thể nhận hàng chậm hơn dự kiến. <br> 
							ITGoShop đang nỗ lực giao các đơn hàng trong thời gian sớm nhất. Cám ơn sự thông cảm của quý khách!
						</div>
					  </div>
				</div>
				<!-- <h4 style="margin: 5px 0px;">1. Thông tin đơn hàng</h4> -->
				<div class ="row">
					<div class="col-lg-8">
						<div class="panel panel-default">
							<div class="panel-heading" style="background-color: #77ACF1; "><h4 style="color: white;"></i>Thông tin đơn hàng</h4></div>
							<div class="panel-body">
								<table>
									<thead style="font-size: 16px;">
										<tr>
											<th><b>Sản phẩm</b></th>
											<th><b>Đơn giá</b></th>
											<th><b>Số lượng</b></th>
											<th><b>Thành tiền</b></th>
										</tr>
									</thead>
									
									<tbody>
										<tr style="font-size: 14px;">
											<td>
												Dell Latitude 3520 Intel (Chính hãng)
											</td>
											<td>
												13.000.000 đ
											</td>
											<td>
												x2
											</td>
											<td>
												26.000.000 đ
											</td>
										</tr>
									</tbody>
								</table>
								
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading" style="background-color: #77ACF1;"><h4 style="color: white;"></i>Chọn hình thức thanh toán</h4></div>
								<div class="panel-body" style="font-size: 14px;">
									<div class="form-group cheque">
										<div class="ps-radio">
										<input class="form-control" type="radio" id="rdo01" name="payment" checked>
										<label for="rdo01"><img src="./client/Images/payment/1.png" alt="">Thanh toán khi giao hàng</label>
										</div>
									</div>
									<div class="form-group paypal">
										<div class="ps-radio ps-radio--inline">
										<input class="form-control" type="radio" name="payment" id="rdo02">
										<label for="rdo02"><img src="./client/Images/payment/1.png" alt="">Thanh toán bằng thẻ</label>
										</div>
										
										
									</div>
								</div>
							</div>
						<button type="button" class="btn btn-primary btn-lg" style="width:320px;font-size:20px; background-color: #000; ">ĐẶT MUA</button>
						<p style="margin: 7px 0px;"><i>(Xin vui lòng kiểm tra lại đơn hàng trước khi Đặt Mua)</i></p>
					</div>

					<div class="col-lg-4">
						<div class="panel panel-default">
							<div class="panel-body">
								<button type="button" style="float:right; padding: 6px; background-color: white;">Sửa</button>
								<h5><i class="fa fa-map-marker" aria-hidden="true" ></i>  Địa chỉ giao hàng </h5>
								<hr>
								<p><b>Tạ Quang Huy</b></p>
								<p>220/17A Khu phố 9, Phường Tam Hiệp, Thành phố Biên Hòa, Đồng Nai Việt Nam</p>
								<p>Điện thoại: 0365990290</p>
							</div>
						</div>
						 
						<div class="panel panel-default">
							<div class="panel-body">
								<button type="button" style="float:right; padding: 6px; background-color: white;">Sửa</button>
								<h5></i>  Đơn hàng </h5>
								<p><i>4 sản phẩm</i></p>
								<hr>
								<p style="float:right">35.000 đ</p>
								<p>Tạm tính: </p> 
								<p style="float:right">0 đ</p>
								<p>Phí vận chuyển: </p> 
								<p style="float:right; color: red;">- 0 đ</p>
								<p>Giảm giá: </p> 
								<p style="float:right; color: red; font-size: 20px">35.000 đ</p> 
								<p><b style="color:black">Thành tiền: </b> </p>  
								<p style="float:right;"><i>(Đã bao gồm VAT nếu có)</i></p> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>	
@endsection