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
							<li class="active">订单管理</li>
							<li class="active"><a href="{{ URL('order_index')}}">订单列表</a></li>
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
										<span class="fa-hover col-md-3 col-sm-4" style="width: 8%;"><a href="{{ URL('add_order')}}"><i class="fa fa-plus-square"></i>添加订单</a></span>
										<span class="fa-hover col-md-3 col-sm-4" style="width: 7%;" id="recycle"><a href="javascript:;"><i class="fa fa-trash-o"></i>回收站</a></span>
										<span class="fa-hover col-md-3 col-sm-4" style="width: 13%;" id="delAll"><a href="javascript:;" ><i class="fa fa-remove"></i>批量删除</a></span>
										
											<select name="" id="pay_status">
												<option value="">选择支付状态</option>
												<option value="1">已支付</option>
												<option value="2">未支付</option>
											</select>
										
											<select name="" id="order_status">
												<option value="">选择订单状态</option>
												<option value="1">租赁中</option>
												<option value="2">已完成</option>
												<option value="3">已取消</option>
												<option value="4">预定成功</option>
											</select>
											
											<select name="" id="term">
												<option value="">选择订单条件</option>
												<option value="1">客户姓名</option>
												<option value="2">订单号</option>
											</select>

											<input type="text" name="search" >
											<div class="fa-hover col-md-3 col-sm-4" style="float:right;width:268px;margin-top: 5px;" id="search_order"><a href="javascript:;"><i class="fa fa-search"></i>筛选</a></div>
											
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
											<th>操作</th>											
										</tr>
									</thead>

									<tbody id="tbody">
									@foreach($order_info as $k=>$v)
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
											<td>
											<a href="order_detail?order_id={{$v['order_id']}}"><button class="upda btn-primary btn-circle" type="button" ><i class="fa fa-list"></i>
                            				</button></a>
                            				<button class="dele btn-warning btn-circle" type="button" ids="{{ $v['order_id']}}"><i class="fa fa-times"></i>
                            				</button>
											</td>
										</tr>
									@endforeach	
									</tbody>
								</table>
								<div style="text-align:center">{{ $order->links() }}</div>
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
//加入回收站
	$(document).on('click','#recycle',function(){
		var _this = $(this);
		var order_id = '';
		$('[name=box]:checkbox:checked').each(function(){
			order_id+= ','+$(this).attr('ids');
		})
		order_id = order_id.substr(1);
		$.ajax({
			type:"GET",
			data:{id:order_id},
			url:"recycle_add",
			dataType:"json",
			success:function(msg){
				data(msg);
			}
		})

	})

//删除单个订单
	$(document).on('click','.dele',function(){
		var _this = $(this);
		var order_id = _this.attr('ids'); //获取id值
		//alert(id);
		$.ajax({
	   	type: "GET",
	   	url: "dele_order",
	   	data: {order_id:order_id},
	   	success: function(msg){
	    //alert(msg);
		    if(msg['success'] == 1)
		    {
		    	_this.parents('tr').remove();
		    } else{
		    	alert(msg['msg']);
		    }
	   }
	   })
	})

//批量删除订单
	$(document).on('click','#delAll',function(event)
	{
		var _this = $(this);
		var ids = ''; //获取id值
		//alert(id);
		$('[name=box]:checkbox:checked').each(function(){
			ids+= ','+$(this).attr('ids');
		})
		ids = ids.substr(1);
		//alert(ids);
		$.ajax({
	   	type: "GET",
	   	url: "dele_order",
	   	data: {order_id:ids},
	   	success: function(msg){
	    //alert(msg);
	    if(msg)
	    {
	    	$('[name=box]:checkbox:checked').each(function(msg)
	    	{
	    		$(this).parent().parent().parent().remove();
	    	})
	    } else {
	    	alert(msg['msg']);
	    }
	    }
	   })
	})

//筛选订单
	$(document).on('click','#search_order',function(){

		var pay_status = $('#pay_status').val();
		var order_status = $('#order_status').val();
		var term = $('#term').val();
		if (term == 1) {
			var user_name = $('input[name="search"]').val();
		} else {
			var order_no = $('input[name="search"]').val();
		}
		// alert(user_name+order_no);

		$.ajax({
	   		type: "GET",
	   		url: "search_order",
	   		data: {pay_status:pay_status,order_status:order_status,user_name:user_name,order_no:order_no},
	   		dataType:'json',
	   		success: function(msg){
	   			// console.log(msg);return;
	   			data(msg);	   			
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
			str+='<td><button class="upda btn-primary btn-circle" type="button" ids="'+v.order_id+'"><i class="fa fa-list"></i></button><button class="dele btn-warning btn-circle" type="button" ids="'+v.order_id+'"><i class="fa fa-times"></i></button></td>';
			str+='</tr>';
		})
		$('tbody').html(str);
	}
</script>
</html>
	
											
											
											
											
											
											
										

