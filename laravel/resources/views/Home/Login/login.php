<!DOCTYPE html>
<html>
<head>
    <base href="home/">
    <script type="text/javascript" src="Scripts/jquery.js"></script>

    <script>!function(a,b,c,d,e){a[c]=a[c]||{},a[c].env="",a[c].id=d,a[c].st=(new Date).getTime(),a[c].env="test"==a[c].env||"test2"==a[c].env||"pre"==a[c].env?a[c].env:"";var f=[],g=b.createElement("script");g.onload=g.onreadystatechange=function(){if(!g.readyState||/loaded|complete/.test(g.readyState)){g.onload=g.onreadystatechange=null;var a=f.length;if(0==a)return!1;for(var b=0;b<a;b++)"[object Function]"===Object.prototype.toString.call(f[b])&&f[b]()}},g.src="//lc"+a[c].env+".ucarinc.com/lc.js";var h=b.getElementsByTagName("script")[0];h.parentNode.insertBefore(g,h),a[c].putEvt=function(b){return a[c].putBe?(b&&b(),!1):void f.push(b)},a[c].types=e;for(var i=0;i<a[c].types.length;i++)if("pe"==a[c].types[i]){var j=[];a.onerror=function(b,d,e,f){j.push("m="+b+"&u="+d+"&l="+e+"&r="+f),a[c].initPe=j.join(",")};break}}(window,document,"LCTJ","eeffffff",["rc","pe","rt","cl","se"]);</script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="description" content="神州租车，周周有新车，新用户得150元！全国1000+服务网点,100+车型,100%车险,无限里程!周租月租6折起,24小时服务,手续便捷,还能免费上门送取.Tel:400-616-6666">
    <meta name="keywords" content="租车,租车网,租车公司,汽车租赁">
    <title>会员登录—神州租车——全球租车领导品牌</title>

    <!-- 新版所用css文件 -->
    <link rel="stylesheet" type="text/css" href="Content/main@a450c2160d.css" /></head>

<body>
<div class="zc_page_bd"><div class="zc_page_title">欢迎登录</div></div>
<!--head start -->
<div class="zc_head_bd">
    <div class="zc_main">
        <a href="/" class="zc_logo" alt="神州租车"></a>
        <div class="zc_phone_bd">
            <div class="p-re zc_p_h">
                <span class="zc-tel"></span>
                <div class="zc_ga_phonebox"><img src="Picture/zc_gaphone.png" alt="港澳台及海外电话861058209555"></div>
            </div>
        </div>
    </div>
</div>	<!--head end -->
<!--banner loginbox start -->
<div class="zc_login_bd">
    <div class="zc_main">
        <div class="zc_login_box">
            <ul class="tabs" style="align-content: center">

                <li id="normallogin" class="cur" style="align-content: center">登录</li>
                <!--	                <li id="mobilelogin">手机动态码登录</li>-->
                <input type="hidden" id="logintype" value="normal">
            </ul>
            <div class="boxremove" style="width:730px;position:relative;">
                <div class="tabcontents cur" style="float:left;">
                    <div class="zc_l_error" id="error_tips"></div>
                    <form action="/login/login" method="post">
                        <ul>
                            <li><label class="icon_wz"><span class="zc-iuser "></span></label>
                                <input type="text" class="wipt t_val" id="normal_id"maxlength="18" name="username" placeholder="请输入手机号或者真实姓名" >
                                <input type="text" class="wipt t_val" id="phone_id" placeholder="请输入注册手机号" maxlength="18" style="display:none">
                            </li>

                            <span class="span_name" style="align-content: center"></span>

                            <li class="pass_switchover"><label class="icon_wz"><span class="zc-ipsw "></span></label>
                                <input type="password" class="wipt"  placeholder="请输入密码" id="xpasstext" name="pwd">
                                <input type="password" class="wipt"  value="" id="xpassword" >
                            </li>

                            <span class="span_pwd" style="align-content: center"></span>

                            <li class="clearfix" id="imageYzmLi" style="display:none">
                                <label class="icon_wz"><span class="zc-iyzm"></span></label>
                                <span class="fl"><input class="zc-iptsht t_val" type="text" id="yzmVal" value="请输入右侧验证码" maxlength="6"></span>
                                <span class="pic-yzm fr"><img id="yzmImg" src="" width="108px" height="36px"><i id="yzmrefresh" class="zc-fresh"></i></span>
                            </li>
                            <li class="clearfix" id="phoneYzmLi" style="display:none">
                                <label class="icon_wz"><span class="zc-idtm"></span></label>
                                <span class="fl"><input id="idtmVal" class="zc-iptsht t_val" type="text" maxlength="6" value="请输入动态验证码"></span>
		                        <span class="fr"><input id="getidtm" class="btn-dtm btn-getdtm" type="button" value="获取手机动态码" onClick="dcsMultiTrack('DCS.dcsuri', '/zuchepc.event','WT.mc_click','获取手机动态码')">
		                        <input id="idtmcount" class="btn-dtm btn-dtmdao" type="button" value="60秒后可重发" style="display: none;"></span>
                                <input type="hidden" id="smsOverTime">
                            </li>
                            <li>
                                <input type="checkbox" checked  name="free" value="1">&nbsp;&nbsp;30天内自动登录
                                <a href="https://passport.zuche.com/member/loginandregist/getpassword.do" class="fr" onClick="dcsMultiTrack('DCS.dcsuri', '/zuchepc.event','WT.mc_click','忘记密码')">忘记密码？</a>
                            </li>
<!--                            <li class="zc_list_che">-->
<!--                                <label class="fl"><span class="zc-blyes"></span><span class="zc_blyes_kong"></span>-->
<!--                                    <input type="checkbox" checked  name="free" value="1">30天内自动登录</label>-->
<!--                                <a href="https://passport.zuche.com/member/loginandregist/getpassword.do" class="fr" onClick="dcsMultiTrack('DCS.dcsuri', '/zuchepc.event','WT.mc_click','忘记密码')">忘记密码？</a>-->
<!--                                <div class="clear"></div>-->
<!--                            </li>-->
                        </ul>
                        <ul class="login_sub" id="login_sub">

                            <input type="hidden" name="_token" value="<?php echo csrf_token();?>">

                            <li><input type="submit" class="zc-btn btn-login" value="登录" id="loginBt" onClick="dcsMultiTrack('DCS.dcsuri', '/zuchepc.event','WT.mc_click','账户密码登录')"></li>
                            <li><div class="zc_login_rbox">还不是会员？<a href="/register" rel="nofollow" onClick="dcsMultiTrack('DCS.dcsuri', '/zuchepc.event','WT.mc_click','立即注册')">立即注册</a> </div></li>
                        </ul>
                    </form>

                    <script>
                        //定义全局变量
                        var flag_name = 0;
                        var flag_pwd = 0;
                        //验证用户名
                        $("#normal_id").blur(function(){
                            var username = $(this).val();
                            var reg_name = /^[\u4e00-\u9fa5]{2,5}$/;
                            var reg_phone=/^1[3,5,8,7]\d{9}$/

                            if(username == "") {
                                $(".span_name").html("<font color='red'>! ! ! 请输入注册时的手机号或者姓名</font>");
                            } else {
                                if(!reg_name.test(username) && !reg_phone.test(username)) {
                                    $(".span_name").html("<font color='red'>! ! ! 手机号或用户名输入有误</font>");
                                } else {
                                    $.ajax({
                                        type: "get",
                                        url: "/login/check_username",
                                        data: "username="+username,
                                        success: function(msg){
                                          if(msg == 1) {
                                              flag_name = 1;
                                              $(".span_name").html("<font color='green'>√</font>");
                                          } else {
                                              $(".span_name").html("<font color='red'>! ! ! 手机号或用户名输入有误</font>");
                                          }
                                        }
                                    });

                                }
                            }
                        })




                        //验证密码

                        $("#xpasstext").focus(function(){
                            var username = $("#normal_id").val();
                            if (username == "") {
                                $(".span_name").html("<font color='red'>! ! ! 请先输入手机号或者姓名</font>");
                            }
                        })


                        $("#xpasstext").blur(function(){
                            var pwd = $(this).val();
                            var username = $("#normal_id").val();
                            var reg_pwd =/^\w{6,18}$/;
                            if(pwd == "") {
                                $(".span_pwd").html("<font color='red'>! ! ! 请输入密码</font>")
                            } else {
                                if(!reg_pwd.test(pwd)) {
                                    $(".span_pwd").html("<font color='red'>! ! ! 密码输入有误</font>")
                                } else {
                                    $.ajax({
                                        type: "get",
                                        url: "/login/check_pwd",
                                        data: "username="+username+"&pwd="+pwd,
                                        success: function(msg){
                                            if(msg == 1) {
                                                flag_pwd = 1;
                                                $(".span_pwd").html("<font color='green'>√</font>")
                                            } else {
                                                $(".span_pwd").html("<font color='red'>! ! ! 密码输入有误</font>")
                                            }
                                        }
                                    });
                                }
                            }
                        })


                        //点击登录按钮时
                        $("#loginBt").click(function(){
                            if(flag_name==1 && flag_pwd==1) {
                                return true;
                            } else {
                                return false;
                            }
                        })
                    </script>














                    <input type="hidden" id="autoLogin" name="autoLogin"></input>
                </div>
                <div class="tabcontents cur" id="imgYzmDiv" style="float:left">
                    <div class="zc_l_error" id="error_tips_float"></div>
                    <ul>
                        <li><i class="zc_blue_yandown"></i> 请先输入以下验证码，获取手机动态码</li>
                        <li class="clearfix">
                            <label class="icon_wz"><span class="zc-iyzm"></span></label>
                            <span class="fl"><input id="yzm_float" class="zc-iptsht t_val" type="text" value="输入验证码" maxlength="6"></span>
                            <span class="pic-yzm fr"><img id="yzmImg_float" src="" width="108px" height="36px"><i id="fresh_float" class="zc-fresh"></i></span>
                        </li>
                    </ul>
                    <ul class="login_sub">
                        <li class="pt5"><input type="submit" class="zc-btn btn-login" value="确认" id="yzmconfirm"></li>
                        <li><div class="zc_login_rbox" id="yzmcancel">取消</div></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- 隐藏域 -->
    <input type="hidden" id="flag" value="">
    <input type="hidden" id="xuserName" value="">
    <div class="zc_brand">
        <div class="zc_main">
            <ul>
                <li>
                    <i class="zc-yecx"></i>
                    <p><b>100+</b>车型</p>
                </li>
                <li>
                    <i class="zc-yewd"></i>
                    <p><b>1000+</b>网点</p>
                </li>
                <li>
                    <i class="zc-yecxn"></i>
                    <p><b>100%</b>车险</p>
                </li>
                <li>
                    <i class="zc-yelc"></i>
                    <p>无限里程</p>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--banner loginbox end -->
<!--foot start -->
<div class="zc_footmenu">
    <div class="zc_main">
        <dl class="wyd">
            <dt>租车预订说明</dt>
            <dd>
                <a target="_blank" href="https://help.zuche.com/jsp/newhelp/fwgz.jsp#fwgz01">服务时间</a>
                <a target="_blank" href="https://help.zuche.com/jsp/newhelp/fwgz.jsp#fwgz03">待租车况</a>
                <a target="_blank" href="https://help.zuche.com/jsp/newhelp/fwgz.jsp#fwgz05">服务预订</a>
                <a target="_blank" href="https://help.zuche.com/jsp/newhelp/fwgz.jsp#fwgz02">短租产品</a>
                <a target="_blank" href="https://help.zuche.com/jsp/newhelp/fwgz.jsp#fwgz04">租车资格</a>
                <a target="_blank" href="https://help.zuche.com/jsp/newhelp/fwgz.jsp#fwgz06">取还车说明</a>
            </dd>
        </dl>
        <dl class="why">
            <dt>会员管理</dt>
            <dd>
                <a target="_blank" href="https://mycar.zuche.com/member/person/personinfo/memberNotify.do">会员章程</a>
                <a target="_blank" href="https://mycar.zuche.com/member/person/personinfo/memberRule.do">会员细则</a>
                <a target="_blank" href="https://mycar.zuche.com/member/getMemberLevel.do">定级积分</a>
            </dd>
        </dl>
        <dl class="wsj">
            <dt>紧急事务处理</dt>
            <dd>
                <a target="_blank" href="https://help.zuche.com/jsp/newhelp/fwgz.jsp#fwgz07">保险责任</a>
                <a target="_blank" href="https://help.zuche.com/jsp/newhelp/fwgz.jsp#fwgz08">理赔说明</a>
                <a target="_blank" href="https://help.zuche.com/jsp/newhelp/fwgz.jsp#fwgz09">事故处理</a>
                <a target="_blank" href="https://help.zuche.com/jsp/newhelp/fwgz.jsp#fwgz10" style="clear:both;">救援及备用车</a>
            </dd>
        </dl>
        <dl class="wfy">
            <dt>租车费用及结算</dt>
            <dd>
                <a target="_blank" href="https://help.zuche.com/jsp/newhelp/fwgz.jsp#fwgz11">价格说明</a>
                <a target="_blank" href="https://help.zuche.com/jsp/newhelp/fwgz.jsp#fwgz13">结算流程</a>
                <a target="_blank" href="https://help.zuche.com/jsp/newhelp/fwgz.jsp#fwgz14">储值卡</a>
                <a target="_blank" href="https://help.zuche.com/jsp/newhelp/fwgz.jsp#fwgz15">积分</a>
            </dd>
        </dl>
        <dl class="wbz">
            <dt>帮助中心</dt>
            <dd>
                <a target="_blank" href="https://help.zuche.com/jsp/newhelp/cjwt1.jsp">常见问题</a>
                <a target="_blank" href="https://help.zuche.com/jsp/newhelp/xssl.jsp">新手上路</a>
                <a target="_blank" href="https://help.zuche.com/jsp/newhelp/fwgz.jsp">服务规则</a>
            </dd>
        </dl>
    </div>
</div>
<!--footmenu end -->
<!--footcopyright start -->
<div class="zc_footcopyright">
    <div class="zc_main">
        <div class="ainfor">
            <a title="关于我们" href="https://huodong.zuche.com/gywm/">关于我们</a>
            <a title="投资者关系" target="_blank" href="https://ir.zuche.com">投资者关系</a>
            <a target="_parent" title="新闻中心" href="https://news.zuche.com/">新闻中心</a>
            <a title="加盟合作" target="_blank" href="https://jiameng.zuche.com">加盟合作</a>
            <a title="隐私保护" target="_parent" href="https://huodong.zuche.com/ysbh/">隐私保护</a>
            <a title="网站导航" target="_parent" href="https://help.zuche.com/sitemap/">网站导航</a>
            <a title="联系我们" target="_parent" href="https://huodong.zuche.com/lxwm/">联系我们</a>
            <a title="招贤纳士" target="_blank" href="http://hr.zuche.com/">招贤纳士</a>
            <a target="_blank" href="https://en.zuche.com" class="eng_wz">English<i class="eng_icon"></i></a>
        </div>
        <div class="zc_copyright">
            <p class="fl">Copyright©2008-2017 www.zuche.com All Rights Reserved.&#12288;神州租车官网 京ICP备10005002号   京公网安备号 11010502026705</p>
            <p class="fr">如果您对神州租车网站有任何意见，欢迎发送邮件到 <a href="Mailto:web@zuche.com" class="yellowmailt">web@zuche.com</a></p>
            <p class="clear pt10">
                <a target="_blank" href="https://ss.knet.cn/verifyseal.dll?sn=2011091400100014977&amp;ct=df&amp;pa=294005" tabindex="-1" id="urlknet" class="sz_k"></a>
                <a target="_blank" id="___szfw_logo___" href="https://search.szfw.org/cert/l/CX20121016001772002081" title="诚信网站" class="sz_c"></a>
            </p>
        </div>
    </div>
</div>
<!--foot end -->

<script type="text/javascript">
    //	var carwrmjsURL = 'https://js.zuchecdn.com';
    //	var carwrmimageURL = 'https://image.zuchecdn.com';
    //	var carwrmcssURL = 'https://css.zuchecdn.com';
    //	var carwlomURL = "https://changzu.zuche.com";
    //	var carwcmsURL='https://huodong.zuche.com';
    //	var carwdmURL = "https://service.zuche.com";
    //	var carwepmURL='https://carbusiness.zuche.com';
    //	var carwlmURL='https://passport.zuche.com';
    //	var carwmmURL = "https://mycar.zuche.com";
    //	var carwsomURL='https://www.zuche.com';
    //	var enURL='https://en.zuche.com';
    //	var orderURL='https://order.zuche.com';
    //	var leasingURL='https://leasing.zuche.com';
    //	var easyrideURL='https://easyride.zuche.com';
    //	var serviceURL='https://service.zuche.com';
    //	var carbusinessURL='';
    //	var jiamengURL='https://jiameng.zuche.com';
    //	var irURL='https://ir.zuche.com';
    //	var carwnewsURL='https://news.zuche.com';
    //	var shoujiURL='https://shouji.zuche.com';
</script>
<script type="text/javascript" src="Scripts/sea@89b3a8eaa1.js"></script>
<script type="text/javascript" src="Scripts/seajs-preload@11b2cc155e.js"></script>
<script type="text/javascript" src="Scripts/seajs-css@3bfd82fbc3.js"></script>
<script type="text/javascript" src="Scripts/seaconfig@6ecc8d0dfe.js"></script>
<!-- 新版公用js文件start -->
<!-- 新版公用js文件end -->
<script type="text/javascript" >
    seajs.use([
        'divided/lm/entry/lib@eb8e0cf87c',
        'divided/lm/entry/common@14c975b071'
    ]);
    seajs.use(['divided/lm/dcs_tag_zc.js']);
</script>
<script>
    seajs.use(['divided/lm/entry/lib@eb8e0cf87c'],function(){
        seajs.use('divided/lm/entry/login@61f05d5140');
    });
</script>
</body>
</html>