@extends('shop.includes.home')
@section('blog')
@include('sweetalert::alert')
<br>
<br>
<br>
<style>
	.section_title {
		margin: 0px 120px 0px 0px;
	}
</style>
<div class="deal_ofthe_week">
@include('sweetalert::alert')
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="deal_ofthe_week_img">
						<img src="{{asset('admin/assets/img/messages-3.jpg')}}" alt="">
					</div>
				</div>
				<div class="col-lg-6 text-right deal_ofthe_week_col">
					<div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
						<div class="section_title">
							<h2>Mua Sắm Mỗi Ngày</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection