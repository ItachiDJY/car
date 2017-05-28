<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>租呗</title>
		<!-- 引入css -->
		<link rel="shortcut icon" href="favicon.ico"> <link href="{{ URL::asset('assets/css/bootstraps.min.css?v=3.3.6') }}" rel="stylesheet">
	    <link href="{{ URL::asset('assets/css/font-awesome.css?v=4.4.0') }}" rel="stylesheet">
	    <link href="{{ URL::asset('assets/css/animate.css') }}" rel="stylesheet">
	    <!-- <link href="{{ URL::asset('assets/css/style.css?v=4.1.0') }}" rel="stylesheet"> -->

	    <!-- 全局js -->
	    <script src="{{ URL::asset('assets/js/jquery.min.js?v=2.1.4') }}"></script>
	    <script src="{{ URL::asset('assets/js/bootstraps.min.js?v=3.3.6') }}"></script>
	    <!-- 自定义js -->
	   
		<!-- 结束 -->

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- basic styles -->
		<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
		<link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css') }}" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!-- ace styles -->

		<link rel="stylesheet" href="{{ URL::asset('assets/css/ace.min.css') }}" />
		<link rel="stylesheet" href="{{ URL::asset('assets/css/ace-rtl.min.css') }}" />
		<link rel="stylesheet" href="{{ URL::asset('assets/css/ace-skins.min.css') }}" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="{{ URL::asset('assets/js/ace-extra.min.js') }}"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		@include('admin.layouts.header')

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
							<li class="active">回收站管理</li>
							<li class="active">回收站列表</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content">
				<div class="row">
				
				<!-- 主体开始 -->
						<div class="col-xs-12">
												
							<div class="table-responsive">
								<table id="sample-table-1" class="table table-striped table-bordered table-hover">
									<thead>

									<div>
										<span class="fa-hover col-md-3 col-sm-4" style="width: 8%;" id="restore"><a href="javascript:;"><i class="fa fa-mail-reply"></i>还原</a></span>
										<span class="fa-hover col-md-3 col-sm-4" style="width: 7%;" id="delete"><a href="javascript:;"><i class="fa fa-trash-o"></i>删除</a></span>
										<span class="fa-hover col-md-3 col-sm-4" style="width: 13%;" id="empty_recycle"><a href="javascript:;" ><i class="fa fa-times-circle"></i>清空回收站</a></span>		
									</div>

										<tr>
											<th class="center">
												<label>
													<input type="checkbox" class="ace" />
													<span class="lbl"></span>
												</label>
											</th>
											<th>编号</th>
											<th>订单号</th>
											<th>客户姓名</th>
											<th>取车时间</th>
											<th>还车时间</th>
											<th>租期</th>
											<th>订单状态</th>
											<th>支付状态</th>
											<th>下单时间</th>
											<th>租赁车辆</th>
											<th>订单金额</th>
										</tr>
									</thead>

									<tbody id="tbody">
									@foreach($arr as $k=>$v)
										<tr>
											<td class="center">
												<label>
													<input type="checkbox" class="ace" name="box" ids="{{ $v['order_id'] }}"/>
													<span class="lbl"></span>
												</label>
											</td>

											<td>{{ $v['order_id'] }}</td>
											<td>{{ $v['order_no'] }}</td>
											<td>{{ $v['user_name'] }}</td>
											<td>{{ $v['pop_time'] }}</td>
											<td>{{ $v['return_time'] }}</td>
											<td>{{ $v['pre_days'] }}天</td>
											<td>
												@if($v['order_status'] ==1)
												租赁中
												@elseif($v['order_status'] ==2)
												已完成
												@elseif($v['order_status'] ==3)
												已取消
												@elseif($v['order_status'] == 4)
												预定成功
												@endif
											</td>
											<td>
												@if($v['pay_status'] == 1)
												已支付
												@elseif($v['pay_status'] == 2)
												未支付
												@endif
											</td>
											<td>{{ $v['create_time'] }}</td>
											<td>{{ $v['plate_number'] }}</td>
											<td>{{ $v['order_amount'] }}</td>
										</tr>
									@endforeach	
									</tbody>
								</table>
							</div><!-- /.table-responsive -->
						</div><!-- /span -->
					</div><!-- /row -->

					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='{{ URL::asset('assets/js/jquery-2.0.3.min.js') }}>"+"<"+"script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='{{ URL::asset('assets/js/jquery.mobile.custom.min.js') }}>"+"<"+"script>");
		</script>
		<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/typeahead-bs2.min.js') }}"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
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

<script>
//回收站还原
	$(document).on('click','#restore',function(){
		var _this = $(this);
		var order_id = '';
		$('[name=box]:checkbox:checked').each(function(){
			order_id+= ','+$(this).attr('ids');
		})
		order_id = order_id.substr(1);
		$.ajax({
			type:"GET",
			data:{id:order_id},
			url:"restore",
			dataType:"json",
			success:function(msg){
				data(msg);
			}
		})

	})

//删除回收站数据
	$(document).on('click','#delete',function(){
		var _this = $(this);
		var order_id = '';
		$('[name=box]:checkbox:checked').each(function(){
			order_id+= ','+$(this).attr('ids');
		})
		order_id = order_id.substr(1);
		$.ajax({
			type:"GET",
			data:{id:order_id},
			url:"delete",
			success:function(msg){
			if(msg)
	    	{
		    	$('[name=box]:checkbox:checked').each(function(msg)
		    	{
		    		$(this).parent().parent().parent().remove();
		    	})
	    	}	
			}
		})
	})

//清空回收站
	$(document).on('click','#empty_recycle',function(event)
	{
		$.ajax({
			url:"empty_recycle",
			success:function(msg){
				if (msg) {
					$('#tbody').empty(); 
				}
			}
		})
	})

//封装公共数据
	function data(msg)
	{
		var str = '';
		$.each(msg,function(k,v){
			var pay_sta = '';
			if (v.pay_status ==1) {
				pay_sta+='已支付';
			} else {
				pay_sta+='未支付';
			}
			var order_sta = '';
			if (v.order_status == 1) {
				order_sta+='租赁中';
			} else if (v.order_status == 2) {
				order_sta+='已完成';
			} else if (v.order_status == 3) {
				order_sta+='已取消';
			} else {
				order_sta+='预定成功';
			}
			str+='<tr>';
			str+='<td class="center"><label><input type="checkbox" class="ace" name="box" ids="'+v.order_id+'"/><span class="lbl"></span></label></td>';
			str+='<td>'+v.order_id+'</td>';
			str+='<td>'+v.order_no+'</td>';
			str+='<td>'+v.user_name+'</td>';
			str+='<td>'+v.pop_time+'</td>';
			str+='<td>'+v.return_time+'</td>';
			str+='<td>'+v.pre_days+'天</td>';
			str+='<td>'+order_sta+'</td>';
			str+='<td>'+pay_sta+'</td>';
			str+='<td>'+v.create_time+'</td>';
			str+='<td>'+v.plate_number+'</td>';
			str+='<td>'+v.order_amount+'</td>';
			str+='</tr>';
		})
		$('tbody').html(str);
	}
</script>
</html>
	
											
											
											
											
											
											
										

