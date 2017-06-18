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
		<!-- 日期插件 -->    
		<script src="{{ URL::asset('assets/date/jquery.1.7.2.min.js') }}"></script>
	    <script src="{{ URL::asset('assets/date/mobiscroll_002.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('assets/date/mobiscroll_004.js') }}" type="text/javascript"></script>
		<link href="{{ URL::asset('assets/date1/mobiscroll_002.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ URL::asset('assets/date1/mobiscroll.css') }}" rel="stylesheet" type="text/css">
		<script src="{{ URL::asset('assets/date/mobiscroll.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('assets/date/mobiscroll_003.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('assets/date/mobiscroll_005.js') }}" type="text/javascript"></script>
		<link href="{{ URL::asset('assets/date1/mobiscroll_003.css') }}" rel="stylesheet" type="text/css">
		<!-- 日期插件结束 -->
		<!-- 百度地图开始-->
		<style type="text/css">
		#allmap  {width: 400px;height: 400px;overflow: hidden;margin:0;font-family:"微软雅黑";}
		#allmap2 {width: 400px;height: 400px;overflow: hidden;margin:0;font-family:"微软雅黑";}
		</style>
		<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=98m3McbUd7pPtPq4yvQVwPMdlZxEwaE6"></script>
		<!-- 百度地图结束 -->

	</head>

	<body>
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			@include('admin.layouts.header')
		</div>

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
							<li class="active"><a href="{{ URL('order_index') }}">订单管理</a></li>
							<li class="active">添加订单</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content">
							<div class="row">
							
									<div class="col-xs-12">

									<form class="form-horizontal"  action="{{ URL::to('add_order_do') }}" method="post">
									<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 订单号 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="订单号" class="col-xs-10 col-sm-5" name="order_no"/>
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 用户名 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" placeholder="用户名" class="col-xs-10 col-sm-5" name="user_name"/>
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 订单生成时间 </label>

										<div class="col-sm-9">
											<input type="text"  placeholder="订单生成时间" class="col-xs-10 col-sm-5"  name="create_time" readonly="readonly" id="create_time"/>
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 取车时间 </label>

										<div class="col-sm-9">
											<input type="text"  placeholder="取车时间" class="col-xs-10 col-sm-5" name="pop_time" id="pop_time" readonly="readonly"/>
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 取车方式 </label>

										<div class="col-sm-9">
											<select name="pop_type">
												<option value="">&nbsp;</option>
												<option value="0">门店自取</option>
												<option value="1">送车上门</option>
											</select>
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 送车地址 </label>

										<div class="col-sm-9">
											<input type="text" id="pop" placeholder="送车地址" class="col-xs-10 col-sm-5" name="pop_address"/>
											<span asd="pop" obj="allmap" class="map">地图浏览</span>
										</div>
										<div id="allmap" style="display:none"></div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 取车门店 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" placeholder="取车门店" class="col-xs-10 col-sm-5" name="pop_store"/>
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 还车时间 </label>

										<div class="col-sm-9">
											<input type="text" readonly="readonly" placeholder="还车时间" class="col-xs-10 col-sm-5" name="return_time" id="return_time"/>
										</div>
									</div>
									
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 还车方式 </label>

										<div class="col-sm-9">
											<select name="return_type">
												<option value="">&nbsp;</option>
												<option value="0">门店自还</option>
												<option value="1">上门取车</option>
											</select>
										</div>
									</div>
									
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 取车地址 </label>

										<div class="col-sm-9">
											<input type="text" id="return" placeholder="取车地址" class="col-xs-10 col-sm-5" name="return_address"/>
											<span asd="return" obj="allmap2" class="map">地图浏览</span>
										</div>
										<div id="allmap2" style="display:none"></div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 还车门店 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" placeholder="还车门店" class="col-xs-10 col-sm-5" name="return_store"/>
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 预定天数 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" placeholder="预定天数" class="col-xs-10 col-sm-5" name="pre_days"/>
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 服务费 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" placeholder="服务费" class="col-xs-10 col-sm-5" name="service_amount"/>
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 订车押金 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" placeholder="订车押金" class="col-xs-10 col-sm-5" name="foregift"/>
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 订单总金额 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" placeholder="订单总金额" class="col-xs-10 col-sm-5" name="order_amount"/>
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 优惠券金额 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" placeholder="优惠券金额" class="col-xs-10 col-sm-5" name="coupon_amount"/>
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 积分金额 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" placeholder="积分金额" class="col-xs-10 col-sm-5" name="discount_amount"/>
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 支付金额 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" placeholder="支付金额" class="col-xs-10 col-sm-5" name="final_amount"/>
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 租赁车辆 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" placeholder="租赁车辆" class="col-xs-10 col-sm-5" name="plate_number"/>
										</div>
									</div>
									
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												增加
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												重置
											</button>
											
										</div>
									</div>

									<div class="hr hr-24"></div>

								</form>
									</div><!-- /span -->
								</div><!-- /row -->

					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

				
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		
		<script type="text/javascript">
		// 百度地图 
		$('.map').on('click', function(){
			var obj = $(this).attr('obj');    //获取名字
			var asd = $(this).attr('asd');

			if ($('#'+obj).css('display') == 'none') {
				$('#'+obj).show();

				var asd = $('#'+asd);
				map(obj,asd);
			} else {
				$('#'+obj).hide();
			}

		})

		// 百度地图API功能
		function map(obj,asd){
			var map = new BMap.Map(obj);
			var point = new BMap.Point(116.331398,39.897445);
			map.centerAndZoom(point,12);
			var geoc = new BMap.Geocoder();    

			map.addEventListener("click", function(e){        
				var pt = e.point;
				geoc.getLocation(pt, function(rs){
					var addComp = rs.addressComponents;
					var address = addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber;
					asd.val(address);
				});        
			});

			 var mapType2 = new BMap.MapTypeControl({anchor: BMAP_ANCHOR_TOP_RIGHT});
			
			 map.addControl(mapType2);          //左上角，默认地图控件
			 map.setCurrentCity("北京");        //由于有3D图，需要设置城市哦
			 //map.addControl(overView);          //添加默认缩略地图控件
			// map.addControl(overViewOpen);      //右下角，打开
			 //控件和比例尺
			 var top_left_control = new BMap.ScaleControl({anchor: BMAP_ANCHOR_TOP_LEFT});// 左上角，添加比例尺
			 var top_left_navigation = new BMap.NavigationControl();  //左上角，添加默认缩放平移控件
			 map.addControl(top_left_control);
			 map.addControl(top_left_navigation);
			 map.enableScrollWheelZoom();   //启用滚轮放大缩小，默认禁用
			 map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用
		}
		
		</script>
		<!-- 日期插件 -->
		<script type="text/javascript">
        
			var currYear = (new Date()).getFullYear();	
			var opt={};
			opt.datetime = {preset : 'datetime'};
			opt.default = {
				theme: 'android-ics light', //皮肤样式
		        display: 'modal', //显示方式 
		        mode: 'scroller', //日期选择模式
				dateFormat: 'yyyy-mm-dd',
				lang: 'zh',
				showNow: true,
				nowText: "今天",
		        startYear: currYear - 10, //开始年份   
		        endYear: currYear + 10 //结束年份
			};
		  	var create_time = $.extend(opt['datetime'], opt['default']);
		  	var pop_time = $.extend(opt['datetime'], opt['default']);
		  	var return_time = $.extend(opt['datetime'], opt['default']);
		    $("#create_time").mobiscroll(create_time).datetime(create_time);
		    $("#pop_time").mobiscroll(pop_time).datetime(pop_time);
		    $("#return_time").mobiscroll(return_time).datetime(return_time);
       
    	</script>
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
		

		<!-- inline scripts related to this page -->
	
</body>
</html>

