@extends('client_layout')
@section('client_content')
<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="{{URL::to('/')}}">Trang chủ<i class="ti-arrow-right"></i></a></li>
								<li><a href="{{URL::to('/show-cart')}}">Giỏ hàng<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="{{URL::to('/checkout')}}">Thanh toán</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
<section>
			<?php
				$content = Cart::content();
				$number_product = Cart::count();
			?>
			<div class="container">
				<div class ="col-lg-12" style="margin: 20px 0px 0px 0px; padding-right: 0px;padding-left: 0px;">
					<div class="panel panel-default">
						<div class="panel-body" style=" background-color: #77ACF1; color:white ; font-size: 14px;">
							Do ảnh hưởng của dịch Covid-19, một số khu vực có thể nhận hàng chậm hơn dự kiến. <br> 
							ITGoShop đang nỗ lực giao các đơn hàng trong thời gian sớm nhất. Cám ơn sự thông cảm của quý khách!
						</div>
					  </div>
				</div>
				<div class ="row">
					<div class="col-lg-8">
						<div class="panel panel-default">
							<div class="panel-heading" style="background-color: #77ACF1; "><h4 style="color: white;"><b>Thông tin đơn hàng</b></h4></div>
							<div class="panel-body">
								<table>
									<thead style="font-size: 16px;">
										<tr>
											<th colspan="2"><b>Sản phẩm</b></th>
											<th><b>Đơn giá</b></th>
											<th><b>Số lượng</b></th>
											<th><b>Thành tiền</b></th>
										</tr>
									</thead>
									
									<tbody>
										@foreach($content as $item)
										<tr style="font-size: 14px;">
											<td style=" height:80px">
												<img style="margin: auto; max-width: 60px; max-height: 60px; width: auto; height: auto; " src="{{URL::to('public/images_upload/product/'.$item->options->image)}}" alt="">
											</td>
											<td>{{$item->name}}</td>
											<td>{{number_format($item->price, 0, " ", ".").' ₫'}}</td>
											<td style="text-align:center">x{{$item->qty}}</td>
											<td><?php $subtotal = $item->price * $item->qty;  echo number_format($subtotal, 0, " ", ".").' ₫'; ?></td>
										</tr>
										@endforeach
									</tbody>
								</table>
								
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading" style="background-color: #77ACF1;"><h4 style="color: white;"><b>Chọn hình thức thanh toán</b></h4></div>
								<div class="panel-body" style="font-size: 14px;">
									<div class="form-group cheque">
										<div class="ps-radio">
										<input class="form-control" type="radio" id="rdo01" name="payment" checked>
										<label for="rdo01"><img src="{{URL::to('public/client/Images/thanh-toan-khi-nhan-hang.PNG')}}" alt="#">Thanh toán khi giao hàng</label>
										</div>
									</div>
									<div class="form-group paypal">
										<div class="ps-radio ps-radio--inline">
										<input class="form-control" type="radio" name="payment" id="rdo02">
										<label for="rdo02"><img src="{{URL::to('public/client/Images/thanh-toan-zalopay.PNG')}}" alt="#">Thanh toán bằng thẻ</label>
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
								<button type="button" style="float:right; padding: 6px; background-color: white;"><a href="{{URL::to('/show-shipping-address')}}">Sửa</a></button>
								<h4><div style="margin-bottom:20px;"> <i class="fa fa-map-marker" aria-hidden="true" ></i> <b>Địa chỉ giao hàng </b>  </div></h4>
								<div></div>
								<hr>
								<p><b>Tạ Quang Huy</b></p>
								<p>220/17A Khu phố 9, Phường Tam Hiệp, Thành phố Biên Hòa, Đồng Nai Việt Nam</p>
								<p>Điện thoại: 0365990290</p>
							</div>
							
						</div>
						 
						<div class="panel panel-default">
							<div class="panel-body">
								<button type="button" style="float:right; padding: 6px; background-color: white;"><a href="{{URL::to('/show-cart')}}">Sửa</a></button>
								<h4><b>Đơn hàng </b></h4>
								<p><i>{{$number_product}} sản phẩm</i></p>
								<hr>
								<p style="float:right">{{(Cart::subtotal(0, ',', '.')).' ₫'}}</p>
								<p>Tạm tính: </p> 
								<p style="float:right">0 đ</p>
								<p>Phí vận chuyển: </p> 
								<p style="float:right; color: red;">- 0 đ</p>
								<p>Giảm giá: </p> 
								<p style="float:right; color: red; font-size: 20px">{{(Cart::total(0, ',', '.')).' ₫'}}</p> 
								<p><b style="color:black">Thành tiền: </b> </p>  
								<p style="float:right;"><i>(Đã bao gồm VAT nếu có)</i></p> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>	
@endsection