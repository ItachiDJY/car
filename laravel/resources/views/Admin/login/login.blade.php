<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap Core CSS -->
<!--    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />-->
    <link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{URL::asset('assets/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/font-awesome.min.css')}}" />


</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">租呗系统登录</h3>
                </div>
                <div class="panel-body">
                    <form role="form" id="form" method="post" action="/login_to" accept-charset="utf-8">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="用户名" name="admin_name" id="admin_name">
                                <span id="name"></span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="密码" name="admin_pwd" id="admin_pwd">
                                <span id="pwd"></span>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <div class="form-group">
                                <input type="submit" id="sub" class="btn btn-lg btn-success btn-block" value="登录"/>
                            </div>
                            {{--<a href="index.html" class="btn btn-lg btn-success btn-block">登录</a>--}}

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
    $(function(){
        var flag_name  = 0;
        var flag_pwd  = 0;
        //验证用户名
        $("#admin_name").blur(function()
        {
            //获取当前文本框内容
            var admin_name = $(this).val();
            //中文正则表达式
            var reg = /^[\u4e00-\u9fa5]{1,6}$/;
            //判断用户名不能为空
            if(admin_name=="")
            {
                //提示信息
                $("#name").html("<font color='red'>用户名不能为空</font>");
            //判断用户名不满足正则表达式
            }else if(!reg.test(admin_name))
            {
                //提示信息
                $("#name").html("<font color='red'>用户名必须为中文</font>");
            //全部满足条件
            }else
            {
                //提示信息
                $("#name").html("<font color='green'>√</font>");
                flag_name = 1;
            }
        });
        //验证密码
        $("#admin_pwd").blur(function()
        {
            //获取当前文本框内容
            var admin_pwd = $(this).val();
            //密码正则表达式
            var reg = /^\d{6,12}$/;
            //判断密码不能为空
            if(admin_pwd=="")
            {
                //提示信息
                $("#pwd").html("<font color='red'>密码不能为空</font>");
                //判断用户名不满足正则表达式
            }else if(!reg.test(admin_pwd))
            {
                //提示信息
                $("#pwd").html("<font color='red'>密码必须为6-12位纯数字</font>");
                //全部满足条件
            }else
            {
                //提示信息
                $("#pwd").html("<font color='green'>√</font>");
                flag_pwd = 1;
            }
        });
        //表单提交
        $("#sub").click(function()
        {
            //如果用户名和密码同时满足条件，表单提交
            if(flag_name==1 && flag_pwd==1)
            {
                return true;
            } else
            {
                return false;
            }
        });
    });
</script>
