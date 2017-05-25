<?php $__env->startSection('content'); ?>
<div class="page-content">
                        <div class="page-header">
                            <h1>
                                控制台
                                <small>
                                    <i class="icon-double-angle-right"></i>
                                     查看
                                </small>
                            </h1>
                        </div><!-- /.page-header -->

                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->

                                <div class="alert alert-block alert-success">
                                    <button type="button" class="close" data-dismiss="alert">
                                        <i class="icon-remove"></i>
                                    </button>

                                    <i class="icon-ok green"></i>

                                    欢迎使用
                                    <strong class="green">
                                        租呗汽车租赁系统
                                    <small>(v1.0)</small>
                                    </strong>
                                    ,这里为你提供全面的汽车租赁服务信息管理. 
                              </div>





                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>