<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">
!function(a,b,c,d,e){a[c]=a[c]||{},a[c].env="",a[c].id=d,a[c].st=(new Date).getTime(),a[c].env="test"==a[c].env||"test2"==a[c].env||"pre"==a[c].env?a[c].env:"";var f=[],g=b.createElement("script");g.onload=g.onreadystatechange=function(){if(!g.readyState||/loaded|complete/.test(g.readyState)){g.onload=g.onreadystatechange=null;var a=f.length;if(0==a)return!1;for(var b=0;b<a;b++)"[object Function]"===Object.prototype.toString.call(f[b])&&f[b]()}},g.src="//lc"+a[c].env+".ucarinc.com/lc.js";var h=b.getElementsByTagName("script")[0];h.parentNode.insertBefore(g,h),a[c].putEvt=function(b){return a[c].putBe?(b&&b(),!1):void f.push(b)},a[c].types=e;for(var i=0;i<a[c].types.length;i++)if("pe"==a[c].types[i]){var j=[];a.onerror=function(b,d,e,f){j.push("m="+b+"&u="+d+"&l="+e+"&r="+f),a[c].initPe=j.join(",")};break}}(window,document,"LCTJ","eeffffff",["rc","pe","rt","cl","se"]);
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="神州租车，周周有新车，新用户得150元！全国1000+服务网点,100+车型,100%车险,无限里程!周租月租6折起,24小时服务,手续便捷,还能免费上门送取.Tel:400-616-6666">
<meta name="keywords" content="租车，租车网，租车公司，汽车租赁">
<meta name="WT.cg_n" content="我的神州"> 
<meta name="WT.cg_s" content="订单管理"> 
<meta name="WT.cg_3" content="订单详情"> 
<title>神州租车——全球租车领导品牌</title>
<link rel="stylesheet" type="text/css" href="https://css.zuchecdn.com/newversion/global.css?v=201506301600"/>
<link rel="stylesheet" type="text/css" href="https://css.zuchecdn.com/newversion/order.css?v=201506301600"/>
<link rel="stylesheet" type="text/css" href="https://css.zuchecdn.com/newversion/orderxz.css?v=201506301600"/>
</head>
<body> 
<div class="printBody">
 <!--startprint-->
<div class="Wbanner980">
	<!--top start-->
    <script type="text/javascript">
	var carwrmURL='https://static.zuchecdn.com';
	var carwrmjsURL = 'https://js.zuchecdn.com';
	var carwrmimageURL = 'https://image.zuchecdn.com';
	var carwrmcssURL = 'https://css.zuchecdn.com';
	var carwlomURL = "https://changzu.zuche.com";
	var carwcmsURL='https://huodong.zuche.com';
	var carwdmURL = "https://service.zuche.com";
	var carwepmURL='https://carbusiness.zuche.com';
	var carwlmURL='https://passport.zuche.com';
	var carwmmURL = "https://mycar.zuche.com";
	var carwsomURL='https://www.zuche.com';
	var enURL='https://en.zuche.com';
	var orderURL='https://order.zuche.com';
	var leasingURL='https://leasing.zuche.com';
	var easyrideURL='https://easyride.zuche.com';
	var serviceURL='https://service.zuche.com';
	var protocol='https://';
</script><script type="text/javascript" src="https://js.zuchecdn.com/newversion/sea/seajs/sea.js?v=201409301800"></script>
<script type="text/javascript" src="https://js.zuchecdn.com/newversion/sea/seajs/seajs-preload.js?v=201409301800"></script>
<script type="text/javascript" src="https://js.zuchecdn.com/newversion/sea/seajs/seaconfig.js?v=2014093018001"></script><div class="orDeTop">
	<a href="https://www.zuche.com/" target="_blank" class="fl orlogo">神州租车</a>
	<div class="fr small_toolkit">
		<ul>
			<li style="position:relative;" class="telDown"><div class="phoneblack fl" style="cursor:pointer" >&nbsp;</div>
			<sapn  style="display:inline-block;width:20px;height:35px;background:url(https://image.zuchecdn.com/newversion/common/telDown2.png) no-repeat center;cursor:pointer;"></sapn>
				<img alt="" src="https://image.zuchecdn.com/newversion/common/telother2.png" style="display:none;position:absolute;z-index:1;right:0;top:30px;">
			</li>
			<li><a href="javascript:void(0)" id="memberName"></a></li>
			<li><a href="/order">我的订单</a></li>
			<li><a href="/login/loginout" style="border-right:none;">退出</a></li>
		</ul>
	</div>
</div>

<script type="text/javascript" >
	seajs.use(['jspath/som/order/order_top']);
</script><!--top end-->
	<!-- 判断会员是否为管理员 -->
	 <!--预订成功 start-->
    <!--普通订单（无需支付）或已支付成功-->
			<div class="greenbgbd sz_succeedB yellow">
				<div class="succeedinfo p10_0 sz_greenbbb bhgray">
					<span class="sz_suc_font">
		            	<?php 
		            	    if ($order_info['order_status'] ==1) {
		            	        $status ='预定成功';
		            	    } else if($order_info['order_status'] ==2){
		            	        $status ='等待付款';
		            	    }else if($order_info['order_status'] ==3){
		            	        $status ='租赁中';
		            	    }else if($order_info['order_status'] ==4){
		            	        $status ='已确认';
		            	    }else if($order_info['order_status'] ==5){
		            	        $status ='已取消';
		            	    }
		            	    echo $status;
		            	 ?>	
		            </span>
					<span class="f14">&nbsp;订单总价:</span>
	<span class="sz_priceOrange">
			<em class="rmb">¥</em>
			<em class="num"><?=$order_info['final_amount']?></em>
	</span>
	</div>
		<div class="f14 p10_0">
				<span>订单号：<?=$order_info['order_no']?></span>
		           <a>|</a>
		           <span>租车人：<?=$_COOKIE['user_name']?></span>
		           <a>|</a>
		           <span>租期：<?=$order_info['pre_days']?>天</span>
		           <a>|</a>
				        <span>取车时需要刷取预授权:</span>
						<span class="carPrice sz_priceOrangeSmall" >
							<em class="rmb" style="font:15px/15px '微软雅黑';">¥</em>
							<em class="num" style="font:15px/15px arial;">&nbsp;<?=$order_info['foregift']?></em>
						</span>
					</div>       
</div>
    <!--预订成功 end-->
<br><div class="order_s_info index_bdb2 orDeBoxRight m20_0" style="background:#fff;">
		<!--基本信息 start-->
        <h3>基本信息</h3>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="f14">
          <tr>
            <td width="10">&nbsp;</td>
            <td colspan="3" rowspan="3" align="center" valign="middle" class="borderBlueB borderBlueR pre" height="99">
            	
            	<img src="../<?=$order_info['car_img']?>" width="138" height="80">
            	<span class="config-btn">配置信息</span>
            </td>
            <td width="240" align="center" class="borderBlueR borderBlueBda" rowspan="2"><strong>取车时间</strong>：<?=$order_info['pop_time']?></td>
            <td width="78" align="right" class="borderBlueBda " rowspan="2"><strong>取车地点</strong>：</td>
            <td rowspan="2" height="66" class="borderBlueBda" width="260">
            	<?=$order_info['pop_store']?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="borderBlueB">&nbsp;</td>
            <td rowspan="2" align="center" valign="middle" class="borderBlueR borderBlueB" height="66"><strong>还车时间</strong>：<?=$order_info['return_time']?></td>
            <td rowspan="2" align="right" class="borderBlueB"><strong>还车地点</strong>：</td>
            <td rowspan="2" align="left" valign="middle" class="borderBlueB">
            	<?=$order_info['return_store']?></td>
          </tr>
          <tr class="f16 borderBlueB" style="font-family:'微软雅黑';">
            <td>&nbsp;</td>
            <td height="33" align="center"colspan="3" valign="middle" class="borderBlueR"><?=$order_info['car_name']?></td>
            
          </tr>
          </table>
		<!--费用明细 start-->
        <h3 class="pink">费用明细</h3>
        <div class="orderFeeDetails">
        <div class="feeItem borderBlueBda">
			                	<div class="feePrice">
			                    	<span class="sz_OrderpOrangeM">
			                            <em class="rmb">¥</em>
			                            <em class="num"><?=$order_info['order_amount']?></em>
			                        </span>
			                    </div>
			                    
			                    <span class="feeName">车辆租赁费及门店服务费</span>
		                	</div>
	                	
	                	<div class="feeItem borderBlueBda selectabletotal" style="overflow:inherit;">                	
			                <div class="feePrice">
			                    <span class="sz_OrderpOrangeM">
			                        <em class="rmb">¥</em>
			                        <em class="num"><?=$order_info['coupon_amount']+$order_info['discount_amount']?></em>
			                    </span>
			                </div>
			                <div class="calculate">
			                    <span class="sz_priceGraySmall">
			                        <em class="unit">合计</em>	
			                    </span>
			                </div>
			                <span class="feeName">其他费用<b class="down"> </b><b class="up"> </b></span>
			        	</div>
                	<div class="feeline50 discount borderBlueBda">
				                <div class="feePrice">
				                    <span class="sz_OrderpOrangeM">
				                        <em class="rmb">¥</em>
				                        <em class="num"><?=$order_info['coupon_amount']?></em>
				                    </span>
				                </div>
				                
			                    <span class="feeName bold">优惠券金额</span>
	            			</div>
	            	<div class="feeline50 discount borderBlueBda">
				                <div class="feePrice">
				                    <span class="sz_OrderpOrangeM">
				                        <em class="rmb">¥</em>
				                        <em class="num"><?=$order_info['discount_amount']?></em>
				                    </span>
				                </div>
				                
			                    <span class="feeName bold">积分金额</span>
	            			</div>
	                	</div>
        <!--费用明细 end-->
        <!--费用总计 start-->
        <div class="orderFeeTotal">
        	<div class="total02">
        		<span class="yjtotal">订单总价：</span>
                <span class="sz_OrderpOrangeB">
                    <em class="rmb">¥</em>
                    <em class="num"><?=$order_info['final_amount']?></em>
                </span>
            </div>
        </div>
        	<!--费用总计 end--></div>
	<div class="ac">
		<div class="sz_dd_kjt d_none">
			<div class="yellow_box">
				<div class="yellow_sj"></div>
				快捷取还，优先办理！<br>
				A.取车时无需现场刷租车预授权，直接验车取车；<br>
				B.还车时无需现场刷违章预授权，只需验车即可完成还车手续；<br>
				C.在门店取还车时，无需等待，优先办理。
			</div>
		</div>
		<!-- 线下转线上 新加两个按钮start -->
		<?php if($order_info['order_status'] <3) { ?>
		<input id="" type="button" onclick="gotoPay('14966488331103',13)" value="支付预授权/押金" class="btn_orgwauto white f16">&nbsp;&nbsp;
					<div class="online-btn-p">
							<input id="" type="button" value="支付租金"  onclick="gotoPay('14966488331103',5)" class="btn_graywauto f16 newred"/>&nbsp;&nbsp;
							<div class="all-huitips">
								<i class="arrtop">◆</i>
								<i class="hui">惠</i>
								<span class="txt">支付全款，享到店快速取车</span>
							</div>
						</div>
					<!-- 线下转线上 新加两个按钮end -->
        <input id="orderCancel" type="button" value="取消订单" class="btn_graywauto gray f16">&nbsp;&nbsp;
		<?php  } ?>
		
		<input id="monitor_fifth_detail" type="button" value="订单中心" class="btn_graywauto gray f16"/>&nbsp;&nbsp;
		<script src="Home/Scripts/jquery-3.1.1.min.js"></script>
			<script>
			    //订单中心
				$('#monitor_fifth_detail').click(function(){
					 location.href ='/order';
				})
				//取消订单
				$('#orderCancel').click(function(){
					var order_id = <?=$order_info['order_id']?>;
					 location.href ='/order_del?id='+order_id;
				})

			</script>
			</div>
	<!-- 评价订单  不是管理员才能评价订单 -->
     <!-- 快捷通广告 -->
	<div class="index_bdb2 m20_0 p20 bg_white">
	<p class="f16 pb10">如何取车</p>
	<p class="f12 gray line_h24">1.取车时,出示以下证件的原件：本人二代身份证、本人国内有效驾驶证正副本、本人一张信用及可用额度均不低于3000元的国内有效信用卡，所有证件有效期须至少超过当次租期的一个月以上。</p>
		<p class="f12 gray line_h24">2.请您准时取车，超时取车，起租时间按预订取车时间起算。</p>
	</div>
<div class="index_bdb2 m20_0 p20 bg_white">
	<p class="f16 pb10">退改规则</p>
	<p class="f12 gray line_h24" style="padding-left:12px;">订单修改或取消：<br/>&nbsp;&nbsp;a)取车时间距当前时间≥2个工作小时，请提前致电400 616 6666：取车时间在门店的营业时间内，请提前2小时申请；取车时间在门店营业时间之外，请您尽早致电申请。<br/>&nbsp;&nbsp;b)取车时间距当前时间＜2个工作小时，不接受修改。</p>
		
	&nbsp;<font class="gray">（小贴士：如果您修改订单或取消订单重新预订，价格可能会发生变化。）</font><br />
    </div>
</div>
<!--endprint-->
<!-- 取消开始 -->
		<div  id="dialogSE" class="orderDialog popup_block d_none" mask-data="#?w=540">
			<h3 class="f14 bold ac gray">取消订单</h3>
	    	<div class="p20_0">
	    		<span style="padding-left:30px;" class="cancelMsg d_none"><font color="red"></font></span>
	    		<ul>
					<li class="pb2 gray_666 pt10 " style="padding-left:30px">
						<strong>订单号：14966488331103可以取消</strong><br/>
						取消订单的原因：
					</li>
					<li class="pt10 ac">
						<table width="400" align="center">
							<tr>
								<td height="26" class="al pl20" nowrap><div name="__monitorCancel1"><input type="radio" value="3" name="cancelReason" id="monitor_cancel1" onclick=""/> 行程发生变更</div></td>
								<td class="al pl20" nowrap><div name="__monitorCancel2"><input onclick="" id='monitor_cancel2' type='radio' name='cancelReason' value='7'/> 不满意价格</div></td>
								<td class="al pl20" nowrap><div name="__monitorCancel3"><input onclick="" id='monitor_cancel3' type='radio' name='cancelReason' value='23'/> 选择其他租车公司</div></td>
							</tr>
							<tr>
								<td height="26" class="al pl20" nowrap><div name="__monitorCancel4"><input onclick="" id='monitor_cancel4' type='radio' name='cancelReason' value='24'/> 其它出行替代</div></td>
								<td class="al pl20" nowrap><div name="__monitorCancel5"><input onclick="" id='monitor_cancel5' type='radio' name='cancelReason' value='9'/> 天气原因</div></td>
								<td class="al pl20" nowrap><div name="__monitorCancel6"><input onclick="" id='monitor_cancel6' type='radio' name='cancelReason' value='10'/> 其它</div></td>
							</tr>
						</table>
					</li>
					<li class="ac pt15">
						<br>
						<input onclick="JavaScript:dcsMultiTrack('DCS.dcsuri', '/virtual/order/cancelOrder.event','WT.cancelOrderID', '14966488331103')"  type="button" value="取消并提交原因" data-id="22249214" data-mobile="18301465637" id="cancelOrder" class="btn_orgwauto white f14">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="button" value="不取消订单" id="closeBg_Button" class="btn_orgwauto white f14">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</li>
				</ul>
	    	</div>
		</div>
		<!-- 取消结束 -->
		<input type="hidden" id="stateName" name="stateName" value="预订成功"/>

<div class="sz_footer">
	<p>
		<a title="关于我们" href="https://huodong.zuche.com/gywm/">关于我们</a>
		|&nbsp;<a title="投资者关系" target="_blank" href="https://ir.zuche.com">投资者关系</a>
		|&nbsp;<a rel="nofollow" target="_parent" title="新闻中心" href="https://news.zuche.com/">新闻中心</a>
		|&nbsp;<a title="加盟合作" target="_blank" href="https://jiameng.zuche.com">加盟合作</a>
		|&nbsp;<a title="隐私保护" target="_parent" href="https://huodong.zuche.com/ysbh/">隐私保护</a>
		|&nbsp;<a title="网站导航" target="_parent" href="https://help.zuche.com/sitemap/">网站导航</a>
		|&nbsp;<a title="联系我们" target="_parent" href="https://huodong.zuche.com/lxwm/">联系我们</a>
		|&nbsp;<a title="招贤纳士" target="_blank" href="http://hr.zuche.com/">招贤纳士</a>
	</p>
	<p class="p10">
		<a target="_blank" href="https://ss.knet.cn/verifyseal.dll?sn=2011091400100014977&amp;ct=df&amp;pa=294005" tabindex="-1" id="urlknet" class="sz_k">&nbsp;</a>
		<a target="_blank" id="___szfw_logo___" href="https://search.szfw.org/cert/l/CX20121016001772002081" title="诚信网站" class="sz_c">&nbsp;</a>
	</p>
	<p>Copyright©2008-2017 www.zuche.com All Rights Reserved. </p>
	<p>如果您对神州租车网站有任何意见,欢迎发送邮件到 web@zuche.com </p>
	<p>北京神州汽车租赁有限公司 京ICP备10005002号&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;京公网安备号 11010502026705</p>
</div>
 <script type="text/javascript">
 	seajs.use(['jspath/dcs_tag_zc.js']);
 </script>
 <script type="text/javascript" src="https://js.zuchecdn.com/newversion/sea/common/bdshare.js?v=201409301800" ></script><!-- 订单详情车辆配置参数弹层显示start -->
<style>
.cffade{display:none;background:#000;position:fixed;left:0;top:0;z-index:1999999;width:100%;height:100%;opacity:.3;filter:alpha(opacity=30);}
.config-btn{position:absolute;top:10px;right:10px;z-index:10;display:inline-block;width:70px;height:24px;line-height:24px;background-color:#2b99ff;color:#fff;font-size:12px;border-radius:3px;cursor:pointer;}
.config-btn:hover{background-color:#609fe6;}
.configbox{display:none;width:600px;height:380px;position:absolute;z-index:2000009;top:50%;left:50%;margin-top:-190px;margin-left:-300px;background-color:#fff;}
.cftitle{position:relative;height:47px;line-height:47px;background-color:#f3f4f6;font-size:16px;color:#60606c;border-bottom:1px solid #e9ebee;}
.cftitle > span{display:block;padding-left:15px;}
.cfclose{cursor:pointer;display:inline-block;position:absolute;top:7px;right:7px;width:34px;height:34px;background:url(https://image.zuchecdn.com/newversion/common/close.png) no-repeat;z-index:2000019;}
.cflist{height:332px;overflow-y:auto;}
.cflist ul{width:560px;margin:0 auto;overflow:hidden;}
.cflist ul li{float:left;width:280px;border-bottom:1px dashed #e4e6e9;font-size:14px;height:39px;line-height:39px;color:#93939e;}
.cflist ul li span{color:#2f2f39;}
.cflist ul li b{ display:inline-block;width:20px;margin-right:5px; vertical-align:middle;}
.cflist ul li.nonebd{border-bottom:1px solid #fff;}
</style>
<div class="cffade"></div>
<div class="configbox">
	<div class="cftitle">
		<span>
		<?=$order_info['car_name']?>配置信息</span>
		<i class="cfclose"></i>
	</div>
	<div class="cflist">
		<ul>
			<li><b class="zws">&nbsp;</b>座 位 数：<span>
				<?=$deploy_info['seat_num']?></span></li>
			<li><b class="cms">&nbsp;</b>车 门 数：<span>
				<?=$deploy_info['doors_num']?>
			</span></li>
			<li><b class="rllx">&nbsp;</b>燃料类型：<span>
				<?=$deploy_info['fuel_type']?>
			</span></li>
			<li><b class="bsxlx">&nbsp;</b>变速箱类型：<span>
				<?=$deploy_info['tran_type']?>
				</span></li>
			<li><b class="pl">&nbsp;</b>排　　量：<span>
				<?=$deploy_info['output']?>
				</span></li>
			<li><b class="rybh">&nbsp;</b>燃油标号：<span>
				<?=$deploy_info['roz']?>
				汽油</span></li>
			<li><b class="qdfs">&nbsp;</b>驱动方式：<span>
				<?=$deploy_info['dirver_type']?>
				</span></li>
			<li><b class="fdjjqxs">&nbsp;</b>发动机进气形式：<span>
				<?=$deploy_info['motor_form']?>
				</span></li>
			<li><b class="tc">&nbsp;</b>天　　窗：<span>
				<?=$deploy_info['skylight']?>
				</span></li>
			<li><b class="yxrl">&nbsp;</b>油箱容量：<span>
				<?=$deploy_info['tank_capacity']?>
				</span></li>
			
			
			<li><b class="dcld">&nbsp;</b>倒车雷达：<span>
				<?=$deploy_info['reversing_radar']?>
				</span></li>
			<li><b class="qin">&nbsp;</b>气　　囊：<span>
				<?=$deploy_info['air']?>
			</span></li>
			<li class="nonebd"><b class="dvd">&nbsp;</b>DVD / CD：<span>
				<?=$deploy_info['DVD']?>
				</span></li>
			<li class="nonebd"><b class="gps">&nbsp;</b>GPS导航：<span>
				<?=$deploy_info['navigation']?>
				</span></li>
			</ul>
	</div>
</div><!-- 订单详情车辆配置参数弹层显示end -->
</div>
<div class="order-success-alertbox">
	<div class="s-aboxin">
		<a href="javascript:void(0);" class="close"></a>
		<p><span>恭喜您</span><br>订单提交成功</p>
		<a class="zc-btn btn-know">我知道了</a>
	</div>
</div>
<input type="hidden" id="reqtype" value="">
<input type="hidden" id="isAdmin" value="false">
<script type="text/javascript" >
	seajs.use(['jspath/jquery/jcarousellite_1.0.1.min','jspath/som/order/ordercommon','jspath/som/order/detail']);
</script>
</body>
</html>