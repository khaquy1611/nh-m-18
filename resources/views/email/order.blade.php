<h2>Hi {{$customer_name}}</h2>
<p>
	<b>Bạn Đã Đặt Hàng Thành Công Ở Cửa Hàng Của Chúng Tôi</b>
</p>
<h4>Thông Tin Đơn Hàng Của Bạn</h4>
<h4>Mã Đơn Hàng Của Bạn:{{$order->id}}</h4>
<h4>Ngày Đơn Hàng:{{$order->order_date</h4>
<h4>Chi Tiết Sản Phẩm</h4>
<table class="table" border="1" cellpadding="0" cellspacing="0" width="400"> 
	<thead>
		<tr>
			<th class="product-th">Product</th>
			<th class="total-th">Name</th>
			<th class="update">Quantity</th>
			<th class="price">Price</th>
		</tr>
	</thead>
	<tbody>
		<?php  $n  = 1; ?>
		@foreach($items as $key =>  $item)

		<tr>
			<td>{{$n}}</td>
			<td class="product-col">
				<img src="{{url('uploads')}}/{{$item['products_image']}}" alt="">
				<div class="pc-title">
					<h4>{{$item['products_name']}}</h4>

				</div>
			</td>
			<td class="quy-col">
				{{$item['quantity']}}"					
			</td>
			<td class="total-col"><h4>{{number_format($item['price'])*$item['quantity']}}$</h4></td>
		</tr>
		@endforeach
	</tbody>
</table>