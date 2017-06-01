<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>租呗</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- basic styles -->
		<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
		<link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css') }}" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome-ie7.min.css') }}" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!-- ace styles -->

		<link rel="stylesheet" href="{{ URL::asset('assets/css/ace.min.css') }}" />
		<link rel="stylesheet" href="{{ URL::asset('assets/css/ace-rtl.min.css') }}" />
		<link rel="stylesheet" href="{{ URL::asset('assets/css/ace-skins.min.css') }}" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="{{ URL::asset('assets/css/ace-ie.min.css') }}" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="{{ URL::asset('assets/js/ace-extra.min.js') }}"></script>

		<!-- HTML5 shim and Respond.js') }} IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="{{ URL::asset('assets/js/html5shiv.js') }}"></script>
		<script src="{{ URL::asset('assets/js/respond.min.js') }}"></script>
		<![endif]-->
	</head>

	<body>
		
		@include('Admin.layouts.header')
		

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->
					@include('admin.layouts.main')
					
					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">首页</a>
							</li>
							<li class="active">租呗控制台</li>
							<li class="active"><a href="{{URL('order_index')}}">订单管理</a></li>
							<li class="active">订单详情列表</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content">
							<div class="row">							

								<div class="content" style="height:379px;">
									
								<table class="border_table f_l" border="1" style="width:300px;margin-right:20px;float:left">
									<colgroup><col width="80px"><col></colgroup>
									<thead><tr><th colspan="2" style="text-align:center">订单金额明细</th></tr></thead>
									<tbody>
										<tr><th>订单总金额</th><td>{{ $one_info['order_amount'] }}</td></tr>
										<tr><th>优惠券金额</th><td>{{ $one_info['coupon_amount'] }}</td></tr>
										<tr><th>积分金额</th><td>{{ $one_info['discount_amount'] }}</td></tr>
										<tr><th>租车押金</th><td>{{ $one_info['foregift'] }}</td></tr>
										<tr><th>服务费</th><td>{{ $one_info['service_amount'] }}</td></tr>
										<tr><th>支付金额</th><td>{{ $one_info['final_amount'] }}</td></tr>
									</tbody>
								</table>

								<table class="border_table f_l" border="1" style="width:300px;margin-right:40px;float:left">
									<colgroup><col width="80px"><col></colgroup>
									<thead><tr><th colspan="2" style="text-align:center">订单详情</th></tr></thead>
									<tbody>
										<tr><th>订单号</th><td>{{ $one_info['order_no']}}</td></tr>
										<tr><th>订单状态</th>
										<td>
											@if($one_info['order_status'] ==1)
											租赁中
											@elseif($one_info['order_status'] ==2)
											已完成
											@elseif($one_info['order_status'] ==3)
											已取消
											@elseif($one_info['order_status'] == 4)
											预定成功
											@endif
										</td>
										</tr>
										<tr><th>支付状态</th>
										<td>
											@if($one_info['pay_status'] == 1)
											已支付
											@elseif($one_info['pay_status'] == 2)
											未支付
											@endif
										</td>
										</tr>
										<tr><th>订单时间</th><td>{{ $one_info['create_time']}}</td></tr>
										<tr><th>取车方式</th>
										<td>
											@if($one_info['pop_type'] == 0)
											门店自取
											@elseif($one_info['pop_type'] == 1)
											送车上门
											@endif
										</td>
										</tr>
										<tr><th>还车方式</th>
										<td>
											@if($one_info['return_type'] == 0)
											门店自还
											@elseif($one_info['return_type'] == 1)
											上门取车
											@endif
										</td>
										</tr>
										<tr><th>预定天数</th><td>{{ $one_info['pre_days']}}</td></tr>
									</tbody>
								</table>

								<table class="border_table f_l" border="1" style="width:300px;margin-right:40px;float:left">
									<colgroup><col width="80px"><col></colgroup>
									<thead><tr><th colspan="2" style="text-align:center">租车人信息</th></tr></thead>
									<tbody>
										<tr><th>姓名</th><td>{{ $user_info['user_name']}}</td></tr>
										<tr><th>手机号</th><td>{{ $user_info['user_phone']}}</td></tr>
										<tr><th>证件类型</th><td>{{ $user_info['id_type']}}</td></tr>
										<tr><th>证件号</th><td>{{ $user_info['id_number']}}</td></tr>
										<tr><th>取车时间</th><td>{{ $one_info['pop_time']}}</td></tr>
										<tr><th>送车地址</th><td>{{ $one_info['pop_address']}}</td></tr>
										<tr><th>还车时间</th><td>{{ $one_info['return_time']}}</td></tr>
										<tr><th>取车地址</th><td>{{ $one_info['return_address']}}</td></tr>
									</tbody>
								</table>
								
								</div><!-- /span -->
							</div><!-- /row -->

					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-skin="default" value="#438EB9">#438EB9</option>
									<option data-skin="skin-1" value="#222A2D">#222A2D</option>
									<option data-skin="skin-2" value="#C6487E">#C6487E</option>
									<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
								</select>
							</div>
							<span>&nbsp; 选择皮肤</span>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
							<label class="lbl" for="ace-settings-navbar"> 固定导航条</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> 固定滑动条</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs">固定面包屑</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl">切换到左边</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
							<label class="lbl" for="ace-settings-add-container">
								切换窄屏
								<b></b>
							</label>
						</div>
					</div>
				</div><!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

			<script src="{{ URL::asset('assets/js/jquery-2.0.3.min.js') }}"></script>
		<!-- <![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='{{ URL::asset('assets/js/jquery-2.0.3.min.js') }}'>"+"<"+"script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='{{ URL::asset('assets/js/jquery-1.10.2.min.js') }}'>"+"<"+"script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='{{ URL::asset('assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"script>");
		</script>
		<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/typeahead-bs2.min.js') }}"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="{{ URL::asset('assets/js/excanvas.min.js') }}"></script>
		<![endif]-->

		<script src="{{ URL::asset('assets/js/jquery-ui-1.10.3.custom.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/chosen.jquery.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/fuelux/fuelux.spinner.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/date-time/bootstrap-datepicker.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/date-time/bootstrap-timepicker.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/date-time/moment.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/date-time/daterangepicker.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/bootstrap-colorpicker.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/jquery.knob.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/jquery.autosize.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/jquery.inputlimiter.1.3.1.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/jquery.maskedinput.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/bootstrap-tag.min.js') }}"></script>

		<!-- ace scripts -->

		<script src="{{ URL::asset('assets/js/ace-elements.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/ace.min.js') }}"></script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			
		</script>
</body>
</html>

