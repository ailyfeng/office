<?php $__env->startSection("content"); ?>

    <script src="<?php echo e(asset('resources/cms/uploadify/jquery.uploadify.min.js')); ?>" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('resources/cms/uploadify/uploadify.css')); ?>">

<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> <a href="<?php echo e(url('cms/index/info')); ?>" >首页 </a><span class="c-gray en">&gt;</span> 
        <a href="javascript:;" data-title="供应商管理" _href="<?php echo e(url('cms/supplier')); ?>" onclick="Hui_admin_tab(this)" href="javascript:;">
            库房产品管理
        </a>
        <span class="c-gray en">&gt;</span> 
        <?php if($warehouse): ?>
            为“<?php echo e($warehouse->name); ?>” 库房添加产品
        <?php else: ?>
            添加库房产品
        <?php endif; ?>

        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <article class="page-container">
        <form action="<?php echo e(url('cms/warehouseProduct')); ?>" method="post" class="form form-horizontal" id="formWarehouseProductAdd">
            <?php echo e(csrf_field()); ?>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>库房：</label>
                <div class="formControls col-xs-8 col-sm-9">
                        <input type="hidden" name="warehouseId" value="<?php echo e($warehouse['warehouseId']); ?>" class="warehouseId">
                    <?php if($errors->has('warehouseId')): ?>
                        <input type="text" class="input-text radius error" value="<?php echo e($warehouse['name']); ?>"  readonly="readonly" name="warehouseId_" id="warehouseId" placeholder="请选择库房" onclick="actionEdit('请选择库房','<?php echo e(url('cms/warehouse?selectSupplier=1')); ?>&sonId=warehouseId&sonName=warehouseId','1')" aria-required="true" aria-invalid="true">
                        <label id="warehouseId-error" class="error" for="warehouseId"><?php echo e($errors->first('warehouseId')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius" value="<?php echo e($warehouse['name']); ?>" readonly="readonly" placeholder="请选择库房" name="warehouseId_" id="warehouseId" onclick=" actionEdit('请选择库房','<?php echo e(url('cms/warehouse?selectSupplier=1')); ?>&sonId=warehouseId&sonName=warehouseId','1');" aria-required="true" aria-invalid="true">
                    <?php endif; ?>
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>公司产品：</label>
                <div class="formControls col-xs-8 col-sm-9">
                        <input type="hidden" name="productId" value="<?php echo e($warehouse['productId']); ?>" class="productId">
                    <?php if($errors->has('productId')): ?>
                        <input type="text" class="input-text radius error" value="<?php echo e($warehouse['name']); ?>"  readonly="readonly" name="productId_" id="productId" placeholder="请选择库房" onclick="actionEdit('请选择库房','<?php echo e(url('cms/product?selectSupplier=1')); ?>&sonId=productId&sonName=productId','1')" aria-required="true" aria-invalid="true">
                        <label id="productId-error" class="error" for="productId"><?php echo e($errors->first('productId')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius" value="<?php echo e($warehouse['name']); ?>" readonly="readonly" placeholder="请选择库房" name="productId_" id="productId" onclick=" actionEdit('请选择库房','<?php echo e(url('cms/product?selectSupplier=1')); ?>&sonId=productId&sonName=productId','1');" aria-required="true" aria-invalid="true">
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>库存类别：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <?php foreach($type as $k=>$v): ?>
                          <div class="check-box">
                            <input type="checkbox" id="checkbox" value="<?php echo e($k); ?>"  <?php if($k==0): ?>checked="checked" <?php endif; ?>  name="type[]">
                            <label for="checkbox"><?php echo e($v); ?></label>
                          </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>货位：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('postion')): ?>
                        <input type="text" class="input-text radius error" value="" name="postion" aria-required="true" aria-invalid="true">
                        <label id="postion-error" class="error" for="postion"><?php echo e($errors->first('postion')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius" value="" placeholder="2-30个字符" name="postion" id="maxNum">
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">最低库存量：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('minNum')): ?>
                        <input type="text" class="input-text radius error" value="" name="minNum" aria-required="true" aria-invalid="true">
                        <label id="minNum-error" class="error" for="minNum"><?php echo e($errors->first('minNum')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="数字"  name="minNum" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">最高库存量：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('maxNum')): ?>
                        <input type="text" class="input-text radius error" value="" name="maxNum" aria-required="true" aria-invalid="true">
                        <label id="maxNum-error" class="error" for="maxNum"><?php echo e($errors->first('maxNum')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="数字"  name="maxNum" >
                    <?php endif; ?>
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">盘点周期：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('cycle')): ?>
                        <input type="text" class="input-text radius error" value="" name="cycle" aria-required="true" aria-invalid="true">
                        <label id="cycle-error" class="error" for="cycle"><?php echo e($errors->first('cycle')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value=""  placeholder="必需是数字，以天数为单位"  name="cycle" >
                    <?php endif; ?>
                </div>
            </div>

            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                    <button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 提交 </button>
                    <!-- <button onClick="article_save();" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存草稿</button> -->
                    <!-- <button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button> -->
                </div>
            </div>
        </form>
    </article>
</div>
<script type="text/javascript" src="<?php echo e(asset('resources/cms/static/h-ui/js/H-ui.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('resources/cms/lib/icheck/jquery.icheck.min.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('resources/cms/lib/jquery.validation/1.14.0/jquery.validate.min.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('resources/cms/lib/jquery.validation/1.14.0/validate-methods.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('resources/cms/lib/jquery.validation/1.14.0/messages_zh.min.js')); ?>"></script> 

<script type="text/javascript">
 

/*编辑*/
function actionEdit(title,url,id,w,h){
    //layer_show(title,url,w,h);

    layer.open({
      type: 2,
      area: ['90%', '90%'],
      fixed: false, //不固定
      maxmin: true,
      content: url
    });
}

//验证表单
$(document).ready(function(){

    ////该表单的每个提示信息再input右边展示
    $('#formWarehouseProductAdd input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });
    
    $("#formWarehouseProductAdd").validate({
        //表单规则
        rules:{
            warehouseId:{
                required:true
            }, 
            productId:{
                required:true
            },
            minNum:{
                number:true
            },
            maxNum:{
                number:true
            },
            cycle:{
                number:true
            }
        },
        //表单提示信息 
        messages:{
            warehouseId:{
                required:"必须选择库房"
            },
            productId:{
                required:"必须公司产品"
            },

            minNum:{
                number:"请输入数字"
            },
            maxNum:{
                number:"请输入数字"
            },
            cycle:{
                number:"请输入数字"
            }
        }

    });
});
 

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("cms.layouts.admin", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>