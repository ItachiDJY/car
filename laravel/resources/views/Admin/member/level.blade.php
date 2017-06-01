<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>租呗</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- basic styles -->
    <link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
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
                    <li class="active">会员管理</li>
                    <li class="active">会员级别列表</li>

                </ul><!-- .breadcrumb -->
            </div>

            <div class="page-content">
                <div class="row">


                    <div class="col-xs-12">



                        <div class="table-responsive">
                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <thead>
                                <tr>
                                    <th>选择</th>
                                    <th>级别编号</th>
                                    <th>级别名称</th>
                                    <th>最低消费金额</th>
                                    <th>最高消费金额</th>
                                    <th>积分兑换比例</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($arr as $val)
                                    <tr>
                                        <td><input type="checkbox" name="check" value="<?php echo $val['member_id']?>"/></td>
                                        <td><?php echo $val['member_id']?></td>
                                        <td>
                                            <span id="change_name"><?php echo $val['member_name']?></span>
                                            <input type="text" id="write_name" style="display: none"/>
                                        </td>
                                        <td>
                                            <span id="change_min"><?php echo $val['min_consum']?></span>
                                            <input type="text" id="write_min" style="display: none;"/>
                                        </td>
                                        <td>
                                            <span id="change_max"><?php echo $val['max_consum']?></span>
                                            <input type="text" id="write_max" style="display: none;"/>
                                        </td>
                                        <td>
                                            <span id="change_point"><?php echo $val['point_change']?></span>
                                            <input type="text" id="write_point" style="display: none;"/>
                                        </td>
                                        <td>
                                            <button class="delete" ids="<?php echo $val['member_id']?>">删除</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <button id="all">全选</button>&nbsp;&nbsp;&nbsp;
                            <button id="no">不选</button>&nbsp;&nbsp;&nbsp;
                            <button id="other">反选</button>&nbsp;&nbsp;&nbsp;
                            <button id="del">批删</button>
                        </div><!-- /.table-responsive -->
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
<script src="assets/js/excanvas.min.js"></script>
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
        //全选
        $("#all").click(function() {
            $("input[name='check']").prop("checked",true);
        });
        //不选
        $("#no").click(function() {
            $("input[name='check']").prop("checked",false);
        });
        //反选
        $("#other").click(function() {
            $("input[name='check']").each(function() {
                $(this).prop("checked",!$(this).prop("checked"));
            });
        });
        //单删
        $(".delete").click(function() {
            var ids = $(this).attr("ids");
            var rm = $(this);
            $.ajax({
                type:"get",
                url:"/level_delete",
                data:
                {
                    ids:ids
                },
                success:function(data)
                {
                    if(data==1)
                    {
                        rm.parent().parent().remove();
                    }
                }
            });
        });
        //批删
        $("#del").click(function() {
            var str = "";
            $("input[name='check']:checked").each(function() {
                str += ","+$(this).val();
            });
            var newstr = str.substr(1);
            $.ajax({
                url:"/level_delete",
                data:
                {
                    ids:newstr
                },
                success:function(data) {
                    if(data==1)
                    {
                        $("input[name='check']:checked").each(function() {
                            $(this).parent().parent().remove();
                        });
                    }
                }
            });
        });
        //级别名称即点即改
        $(document).on("click","#change_name",function() {
            var name = $(this);
            var name_value = $(this).html();
            name.next().css('display','block').val(name_value);
            name.html("");
        });
        $(document).on("blur","#write_name",function() {
            var name = $(this);
            var name_value = name.val();
            name.prev().html(name_value);
            name.css("display","none");
            var name_id = name.parent().prev().html();
            $.ajax( {
                type:"get",
                url:"/level_name",
                data: {
                    name_value:name_value,
                    name_id:name_id
                },
                success:function(data) {
                    if(data==0)
                    {
                        alert("修改失败");
                    }
                }
            });
        });
        //最低消费金额即点即改
        $(document).on("click","#change_min",function() {
            var min = $(this);
            var min_value = $(this).html();
            min.next().css('display','block').val(min_value);
            min.html("");
        });
        $(document).on("blur","#write_min",function() {
            var min = $(this);
            var min_value = min.val();
            min.prev().html(min_value);
            min.css("display","none");
            var min_id = min.parent().prev().prev().html();
            $.ajax( {
                type:"get",
                url:"/level_min",
                data: {
                    min_value:min_value,
                    min_id:min_id
                },
                success:function(data) {
                    if(data==0)
                    {
                        alert("修改失败");
                    }
                }
            });
        });
        //最高消费金额即点即改
        $(document).on("click","#change_max",function() {
            var max = $(this);
            var max_value = $(this).html();
            max.next().css('display','block').val(max_value);
            max.html("");
        });
        $(document).on("blur","#write_max",function() {
            var max = $(this);
            var max_value = max.val();
            max.prev().html(max_value);
            max.css("display","none");
            var max_id = max.parent().prev().prev().prev().html();
            $.ajax( {
                type:"get",
                url:"/level_max",
                data: {
                    max_value:max_value,
                    max_id:max_id
                },
                success:function(data) {
                    if(data==0)
                    {
                        alert("修改失败");
                    }
                }
            });
        });
        //积分兑换比例即点即改
        $(document).on("click","#change_point",function() {
            var point = $(this);
            var point_value = $(this).html();
            point.next().css('display','block').val(point_value);
            point.html("");
        });
        $(document).on("blur","#write_point",function() {
            var point = $(this);
            var point_value = point.val();
            point.prev().html(point_value);
            point.css("display","none");
            var email_id = point.parent().prev().prev().prev().prev().html();
            $.ajax( {
                type:"get",
                url:"/level_point",
                data: {
                    point_value:point_value,
                    point_id:point_id
                },
                success:function(data) {
                    if(data==0)
                    {
                        alert("修改失败");
                    }
                }
            });
        });
    });
</script>

