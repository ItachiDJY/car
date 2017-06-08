<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>租呗</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- basic styles -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{URL::asset('assets/css/font-awesome.min.css')}}" />

    <!--[if IE 7]>
    <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
    <![endif]-->

    <!-- page specific plugin styles -->

    <!-- fonts -->

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

    <!-- ace styles -->

    <link rel="stylesheet" href="{{URL::asset('assets/css/ace.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('assets/css/ace-rtl.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('assets/css/ace-skins.min.css')}}" />

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->

    <script src="{{URL::asset('assets/js/ace-extra.min.js')}}"></script>

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

            @include('admin.layouts.main')<!-- /.nav-list -->

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
                        <a href="/index.php/admin">首页</a>
                    </li>
                    <li class="active">租呗控制台</li>
                    <li class="active">修改密码</li>
                </ul><!-- .breadcrumb -->
            </div>

            <div class="page-content">
                <div class="row">


                    <div class="col-xs-12">

                        <form class="form-horizontal" id="form" role="form" method="post" action="/password_update_to" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 原密码 </label>
                                <div class="col-sm-9">
                                    <input type="text" name="old_pwd" id="form-field-1" placeholder="请输入原始密码" class="col-xs-10 col-sm-5" />
                                    <span id="old"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 新密码 </label>
                                <div class="col-sm-9">
                                    <input type="text" name="new_pwd" id="form-field-1" placeholder="请输入新密码" class="col-xs-10 col-sm-5" />
                                    <span id="new"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 确认新密码 </label>
                                <div class="col-sm-9">
                                    <input type="text" name="sure_pwd" id="form-field-1" placeholder="请重新输入新密码" class="col-xs-10 col-sm-5" />
                                    <span id="sure"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-info" type="submit" id="car_add">
                                        <i class="icon-ok bigger-110"></i>
                                        修改
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

        <!-- /#ace-settings-container -->
    </div><!-- /.main-container-inner -->

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="icon-double-angle-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->

<script src="{{URL::asset('assets/js/jquery-2.0.3.min.js')}}"></script>
<!-- <![endif]-->

<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

<!--[if !IE]> -->

<script type="text/javascript">
    window.jQuery || document.write("<script src={{URL::asset('assets/js/jquery-2.0.3.min.js')}}>"+"<"+"script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"script>");
</script>
<![endif]-->

<script type="text/javascript">
    if("ontouchend" in document) document.write("<script src={{URL::asset('assets/js/jquery.mobile.custom.min.js')}}>"+"<"+"script>");
</script>
<script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('assets/js/typeahead-bs2.min.js')}}"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="{{URL::asset('assets/js/excanvas.min.js')}}"></script>
<![endif]-->

<script src="{{URL::asset('assets/js/jquery-ui-1.10.3.custom.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.ui.touch-punch.min.js')}}"></script>
<script src="{{URL::asset('assets/js/chosen.jquery.min.js')}}"></script>
<script src="{{URL::asset('assets/js/fuelux/fuelux.spinner.min.js')}}"></script>
<script src="{{URL::asset('assets/js/date-time/bootstrap-datepicker.min.js')}}"></script>
<script src="{{URL::asset('assets/js/date-time/bootstrap-timepicker.min.js')}}"></script>
<script src="{{URL::asset('assets/js/date-time/moment.min.js')}}"></script>
<script src="{{URL::asset('assets/js/date-time/daterangepicker.min.js')}}"></script>
<script src="{{URL::asset('assets/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.knob.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.autosize.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.inputlimiter.1.3.1.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.maskedinput.min.js')}}"></script>
<script src="{{URL::asset('assets/js/bootstrap-tag.min.js')}}"></script>

<!-- ace scripts -->

<script src="{{URL::asset('assets/js/ace-elements.min.js')}}"></script>
<script src="{{URL::asset('assets/js/ace.min.js')}}"></script>

<!-- inline scripts related to this page -->

<script type="text/javascript">
    $(document).on('change','#reg_one',function(){
        var id = $(this).val();
        var reg = $('#reg_two');
        if(id == '') {
            return false;
        }
        $.ajax({
            type:'get',
            url:'reg_select',
            data:{parent_id:id},
            dataType:'json',
            success:function(msg) {
                var str = '<option value="">..请选择</option>';
                $.each(msg,function(k,v){
                    str += '<option value='+v.region_id+'>'+v.region_name+'</option>';
                });
                reg.html(str);
            }
        });
    });

    $(document).on('change','#reg_two',function(){
        var id = $(this).val();
        var reg = $('#reg_three');
        if(id == '') {
            return false;
        }
        $.ajax({
            type:'get',
            url:'reg_select',
            data:{parent_id:id},
            dataType:'json',
            success:function(msg) {
                var str = '<option value="">..请选择</option>';
                $.each(msg,function(k,v){
                    str += '<option value='+v.region_id+'>'+v.region_name+'</option>';
                });
                reg.html(str);
            }
        });
    });
    jQuery(function($) {
        $('#id-disable-check').on('click', function() {
            var inp = $('#form-input-readonly').get(0);
            if(inp.hasAttribute('disabled')) {
                inp.setAttribute('readonly' , 'true');
                inp.removeAttribute('disabled');
                inp.value="This text field is readonly!";
            }
            else {
                inp.setAttribute('disabled' , 'disabled');
                inp.removeAttribute('readonly');
                inp.value="This text field is disabled!";
            }
        });


        $(".chosen-select").chosen();
        $('#chosen-multiple-style').on('click', function(e){
            var target = $(e.target).find('input[type=radio]');
            var which = parseInt(target.val());
            if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
            else $('#form-field-select-4').removeClass('tag-input-style');
        });


        $('[data-rel=tooltip]').tooltip({container:'body'});
        $('[data-rel=popover]').popover({container:'body'});

        $('textarea[class*=autosize]').autosize({append: "\n"});
        $('textarea.limited').inputlimiter({
            remText: '%n character%s remaining...',
            limitText: 'max allowed : %n.'
        });

        $.mask.definitions['~']='[+-]';
        $('.input-mask-date').mask('99/99/9999');
        $('.input-mask-phone').mask('(999) 999-9999');
        $('.input-mask-eyescript').mask('~9.99 ~9.99 999');
        $(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});



        $( "#input-size-slider" ).css('width','200px').slider({
            value:1,
            range: "min",
            min: 1,
            max: 8,
            step: 1,
            slide: function( event, ui ) {
                var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
                var val = parseInt(ui.value);
                $('#form-field-4').attr('class', sizing[val]).val('.'+sizing[val]);
            }
        });

        $( "#input-span-slider" ).slider({
            value:1,
            range: "min",
            min: 1,
            max: 12,
            step: 1,
            slide: function( event, ui ) {
                var val = parseInt(ui.value);
                $('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
            }
        });


        $( "#slider-range" ).css('height','200px').slider({
            orientation: "vertical",
            range: true,
            min: 0,
            max: 100,
            values: [ 17, 67 ],
            slide: function( event, ui ) {
                var val = ui.values[$(ui.handle).index()-1]+"";

                if(! ui.handle.firstChild ) {
                    $(ui.handle).append("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>");
                }
                $(ui.handle.firstChild).show().children().eq(1).text(val);
            }
        }).find('a').on('blur', function(){
            $(this.firstChild).hide();
        });

        $( "#slider-range-max" ).slider({
            range: "max",
            min: 1,
            max: 10,
            value: 2
        });

        $( "#eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
            // read initial values from markup and remove that
            var value = parseInt( $( this ).text(), 10 );
            $( this ).empty().slider({
                value: value,
                range: "min",
                animate: true

            });
        });


        $('#id-input-file-1 , #id-input-file-2').ace_file_input({
            no_file:'No File ...',
            btn_choose:'Choose',
            btn_change:'Change',
            droppable:false,
            onchange:null,
            thumbnail:false //| true | large
            //whitelist:'gif|png|jpg|jpeg'
            //blacklist:'exe|php'
            //onchange:''
            //
        });

        $('#id-input-file-3').ace_file_input({
            style:'well',
            btn_choose:'Drop files here or click to choose',
            btn_change:null,
            no_icon:'icon-cloud-upload',
            droppable:true,
            thumbnail:'small'//large | fit
            //,icon_remove:null//set null, to hide remove/reset button
            /**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
            /**,before_remove : function() {
						return true;
					}*/
            ,
            preview_error : function(filename, error_code) {
                //name of the file that failed
                //error_code values
                //1 = 'FILE_LOAD_FAILED',
                //2 = 'IMAGE_LOAD_FAILED',
                //3 = 'THUMBNAIL_FAILED'
                //alert(error_code);
            }

        }).on('change', function(){
            //console.log($(this).data('ace_input_files'));
            //console.log($(this).data('ace_input_method'));
        });


        //dynamically change allowed formats by changing before_change callback function
        $('#id-file-format').removeAttr('checked').on('change', function() {
            var before_change
            var btn_choose
            var no_icon
            if(this.checked) {
                btn_choose = "Drop images here or click to choose";
                no_icon = "icon-picture";
                before_change = function(files, dropped) {
                    var allowed_files = [];
                    for(var i = 0 ; i < files.length; i++) {
                        var file = files[i];
                        if(typeof file === "string") {
                            //IE8 and browsers that don't support File Object
                            if(! (/\.(jpe?g|png|gif|bmp)$/i).test(file) ) return false;
                        }
                        else {
                            var type = $.trim(file.type);
                            if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif|bmp)$/i).test(type) )
                                    || ( type.length == 0 && ! (/\.(jpe?g|png|gif|bmp)$/i).test(file.name) )//for android's default browser which gives an empty string for file.type
                            ) continue;//not an image so don't keep this file
                        }

                        allowed_files.push(file);
                    }
                    if(allowed_files.length == 0) return false;

                    return allowed_files;
                }
            }
            else {
                btn_choose = "Drop files here or click to choose";
                no_icon = "icon-cloud-upload";
                before_change = function(files, dropped) {
                    return files;
                }
            }
            var file_input = $('#id-input-file-3');
            file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
            file_input.ace_file_input('reset_input');
        });




        $('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
                .on('change', function(){
                    //alert(this.value)
                });
        $('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'icon-caret-up', icon_down:'icon-caret-down'});
        $('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'icon-plus smaller-75', icon_down:'icon-minus smaller-75', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});



        $('.date-picker').datepicker({autoclose:true}).next().on(ace.click_event, function(){
            $(this).prev().focus();
        });
        $('input[name=date-range-picker]').daterangepicker().prev().on(ace.click_event, function(){
            $(this).next().focus();
        });

        $('#timepicker1').timepicker({
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false
        }).next().on(ace.click_event, function(){
            $(this).prev().focus();
        });

        $('#colorpicker1').colorpicker();
        $('#simple-colorpicker-1').ace_colorpicker();


        $(".knob").knob();


        //we could just set the data-provide="tag" of the element inside HTML, but IE8 fails!
        var tag_input = $('#form-field-tags');
        if(! ( /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase())) )
        {
            tag_input.tag(
                    {
                        placeholder:tag_input.attr('placeholder'),
                        //enable typeahead by specifying the source array
                        source: ace.variable_US_STATES,//defined in ace.js >> ace.enable_search_ahead
                    }
            );
        }
        else {
            //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
            tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
            //$('#form-field-tags').autosize({append: "\n"});
        }




        /////////
        $('#modal-form input[type=file]').ace_file_input({
            style:'well',
            btn_choose:'Drop files here or click to choose',
            btn_change:null,
            no_icon:'icon-cloud-upload',
            droppable:true,
            thumbnail:'large'
        })

        //chosen plugin inside a modal will have a zero width because the select element is originally hidden
        //and its width cannot be determined.
        //so we set the width after modal is show
        $('#modal-form').on('shown.bs.modal', function () {
            $(this).find('.chosen-container').each(function(){
                $(this).find('a:first-child').css('width' , '210px');
                $(this).find('.chosen-drop').css('width' , '210px');
                $(this).find('.chosen-search input').css('width' , '200px');
            });
        })
        /**
         //or you can activate the chosen plugin after modal is shown
         //this way select element becomes visible with dimensions and chosen works as expected
         $('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
         */

    });
</script>
</body>
</html>
<script src="jquery-1.10.2.min.js"></script>
<script type="text/javascript">
    $(function() {
        /*
        * 定义三个全局变量
        * */
        var flag_old = 0;
        var flag_new = 0;
        var flag_sure = 0;
        /*
        * 验证原密码
        * */
        //原密码框失去焦点事件
         $("input[name='old_pwd']").blur(function() {
             //获取原密码框里面输入的值
            var old_pwd = $("input[name='old_pwd']").val();
             //判断原密码框为空
            if(old_pwd == "") {
                //为空就给出提示
                $("#old").html("<font color='red'>您还没有输入原始密码</font>");
            }else {
                //不为空就发送数据到后台，与数据库查出的密码作对比，并给出相应提示
                $.ajax( {
                    type:"get",
                    url:"/sure_old_pwd",
                    data: {
                        old_pwd:old_pwd
                    },
                    dataType:"json",
                    success:function(data) {
                        $.each(data,function(k,v) {
                            if(v.status == 201) {
                                $("#old").html("<font color='red'>您输入的原始密码有误</font>");
                            }else {
                                $("#old").html("<font color='green'>输入正确</font>");
                                flag_old = 1;
                            }
                        });
                    }
                });
            }
        });
        /*
        * 验证新密码
        * */
        //新密码框失去焦点事件
         $("input[name='new_pwd']").blur(function() {
             //获取新密码框里面的值
            var new_pwd = $("input[name='new_pwd']").val();
            //密码正则表达式
            var reg = /^\w{6,12}$/;
             //判断
            if(new_pwd == "") {
                $("#new").html("<font color='red'>您还没有输入新密码</font>");
            }else if(!reg.test(new_pwd)) {
                $("#new").html("<font color='red'>您输入的新密码必须为6-12位数字或字母</font>");
            }else {
                $("#new").html("<font color='green'>符合要求，您可以使用</font>");
                flag_new = 1;
            }
        });
        /*
        * 验证确认密码
        * */
        //确认密码框失去焦点事件
         $("input[name='sure_pwd']").blur(function() {
             //获取确认密码框里面的值
            var sure_pwd = $("input[name='sure_pwd']").val();
             //获取新密码框里面的值
            var new_pwd = $("input[name='new_pwd']").val();
             //判断
            if(sure_pwd == "") {
                $("#sure").html("<font color='red'>您还没有重新输入新密码</font>");
            }else if(sure_pwd != new_pwd) {
                $("#sure").html("<font color='red'>您输入的密码与新密码不符</font>");
            }else {
                $("#sure").html("<font color='green'>与新密码一致</font>");
                flag_sure = 1;
            }
        });
        //阻止表单提交
        $("#car_add").click(function() {
            if(flag_old==1 && flag_new==1 && flag_sure==1) {
                return true;
            }else {
                return false;
            }
        });
    });
</script>