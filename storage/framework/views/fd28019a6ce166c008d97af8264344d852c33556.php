<?php $__env->startSection("content"); ?>


<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> <a href="<?php echo e(url('cms/index/info')); ?>" >首页 </a><span class="c-gray en">&gt;</span> 
        <a href="javascript:;" data-title="供应商管理" _href="<?php echo e(url('cms/supplier')); ?>" onclick="Hui_admin_tab(this)" href="javascript:;">
            供应商管理
        </a>
        <span class="c-gray en">&gt;</span> 
        添加供应商 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <article class="page-container">
        <form action="<?php echo e(url('cms/supplier')); ?>" method="post" class="form form-horizontal" id="formSupplierAdd">
            <?php echo e(csrf_field()); ?>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>供应商全称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('fullName')): ?>
                        <input type="text" class="input-text radius error" value="" name="fullName" aria-required="true" aria-invalid="true">
                        <label id="fullName-error" class="error" for="fullName"><?php echo e($errors->first('fullName')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius" value="" placeholder="5-100个字符" name="fullName" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">供应商简称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('abbreviation')): ?>
                        <input type="text" class="input-text radius error" value="" name="abbreviation" aria-required="true" aria-invalid="true">
                        <label id="abbreviation-error" class="error" for="abbreviation"><?php echo e($errors->first('supplierIdExt')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="2-30个字符"  name="abbreviation" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>供应商类型：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">


                    <?php foreach($type as $k=>$v): ?>
                          <div class="check-box">
                            <input type="checkbox" id="checkbox" value="<?php echo e($k); ?>"  <?php if($k==0): ?>checked="checked" <?php endif; ?>  name="type[]">
                            <label for="checkbox"><?php echo e($v); ?></label>
                          </div>
                    <?php endforeach; ?>
<!-- 
                    <?php if($errors->has('type')): ?>
                        <input type="text" class="input-text radius error" value="" name="type" aria-required="true" aria-invalid="true">
                        <label id="type-error" class="error" for="type"><?php echo e($errors->first('type')); ?></label>


                    <?php else: ?>
                         <input type="text" class="input-text radius " value=""  placeholder="2-30个汉字" name="type" >
                    <?php endif; ?> -->
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>供应品牌：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('brand')): ?>
                        <input type="text" class="input-text radius error" value="" name="brand" aria-required="true" aria-invalid="true">
                        <label id="brand-error" class="error" for="brand"><?php echo e($errors->first('brand')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="2-30个字符"  name="brand" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>供应品类：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('brandType')): ?>
                        <input type="text" class="input-text radius error" value="" name="brandType" aria-required="true" aria-invalid="true">
                        <label id="brandType-error" class="error" for="brandType"><?php echo e($errors->first('brandType')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value=""  placeholder="2-30个字符"  name="brandType" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>办公地址：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('officeAdd')): ?>
                        <input type="text" class="input-text radius error" value="" name="officeAdd" aria-required="true" aria-invalid="true">
                        <label id="officeAdd-error" class="error" for="officeAdd"><?php echo e($errors->first('officeAdd')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="5-100个字符" name="officeAdd" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>库房地址：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('warehoustAdd')): ?>
                        <input type="text" class="input-text radius error" value="" name="warehoustAdd" aria-required="true" aria-invalid="true">
                        <label id="warehoustAdd-error" class="error" for="warehoustAdd"><?php echo e($errors->first('warehoustAdd')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="5-100个字符" name="warehoustAdd" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>采购区域：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('area')): ?>
                        <input type="text" class="input-text radius error" value="" name="area" aria-required="true" aria-invalid="true">
                        <label id="area-error" class="error" for="area"><?php echo e($errors->first('area')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="5-30个字符" name="area" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">结算方式：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('settlementMmethod')): ?>
                        <input type="text" class="input-text radius error" value="" name="settlementMmethod" aria-required="true" aria-invalid="true">
                        <label id="settlementMmethod-error" class="error" for="settlementMmethod"><?php echo e($errors->first('settlementMmethod')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="5-30个字符" name="settlementMmethod" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">收款方式：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('paymentMethod')): ?>
                        <input type="text" class="input-text radius error" value="" name="paymentMethod" aria-required="true" aria-invalid="true">
                        <label id="paymentMethod-error" class="error" for="paymentMethod"><?php echo e($errors->first('paymentMethod')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="5-30个字符" name="paymentMethod" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">结算价格（含税）：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('priceTax')): ?>
                        <input type="text" class="input-text radius error" value="" name="priceTax" aria-required="true" aria-invalid="true">
                        <label id="priceTax-error" class="error" for="priceTax"><?php echo e($errors->first('priceTax')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="0000.00" name="priceTax" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">结算价格（不含税）：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('priceNoTax')): ?>
                        <input type="text" class="input-text radius error" value="" name="priceNoTax" aria-required="true" aria-invalid="true">
                        <label id="priceNoTax-error" class="error" for="priceNoTax"><?php echo e($errors->first('priceNoTax')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="0000.00" name="priceNoTax" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">帐户信息：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('account')): ?>
                        <input type="text" class="input-text radius error" value="" name="account" aria-required="true" aria-invalid="true">
                        <label id="account-error" class="error" for="account"><?php echo e($errors->first('account')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="5-30个字符" name="account" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">是否送货：</label>
                <div class="formControls col-xs-8 col-sm-9">

                    <?php foreach($isBoolean as $k=>$v): ?>

                     <div class="radio-box">
                        <input type="radio" id="radio-<?php echo e($k); ?>" name="deliveryIs" value="<?php echo e($k); ?>" <?php if($k==0): ?>checked="checked" <?php endif; ?> >
                        <label for="radio-<?php echo e($k); ?>"><?php echo e($v); ?></label>
                      </div>

                    <?php endforeach; ?>

                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">是否签协：</label>
                <div class="formControls col-xs-8 col-sm-9">

                    <?php foreach($isBoolean as $k=>$v): ?>
                    
                     <div class="radio-box">
                        <input type="radio" id="radio-<?php echo e($k); ?>" name="signIs" value="<?php echo e($k); ?>" <?php if($k==0): ?>checked="checked" <?php endif; ?> >
                        <label for="radio-<?php echo e($k); ?>"><?php echo e($v); ?></label>
                      </div>

                    <?php endforeach; ?>

                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">退换货要求：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('returnRequirements')): ?>
                    <textarea class="textarea radius error" name="returnRequirements" placeholder="退换货要求描述" aria-required="true" aria-invalid="true"></textarea>
                        <label id="account-error" class="error" for="returnRequirements"><?php echo e($errors->first('returnRequirements')); ?></label>
                    <?php else: ?>
                        <textarea class="textarea radius" name="returnRequirements" placeholder="250个字符" onKeyUp="textarealength(this,250)"></textarea>
                        <p class="textarea-numberbar"><em class="textarea-length">0</em>/250</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">合同到期日：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('contractDate')): ?>
                        <input type="text" name="contractDate" id="contractDate" class=" input-text radius error" aria-required="true" readonly  aria-invalid="true">
                        <label id="contractDate-error" class="error" for="contractDate"><?php echo e($errors->first('contractDate')); ?></label>
                    <?php else: ?>
                         <input type="text" name="contractDate" id="contractDate" class=" input-text radius " readonly  placeholder="0000-00-00">
                        
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">合同简报：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('contractBriefing')): ?>
                    <textarea class="textarea radius error" name="contractBriefing" placeholder="退换货要求描述" aria-required="true" aria-invalid="true"></textarea>
                        <label id="account-error" class="error" for="contractBriefing"><?php echo e($errors->first('contractBriefing')); ?></label>
                    <?php else: ?>
                        <textarea class="textarea radius" name="contractBriefing" placeholder="1250个字符" onKeyUp="textarealength(this,250)"></textarea>
                        <p class="textarea-numberbar"><em class="textarea-length">0</em>/250</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">授信额度：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('credit')): ?>
                        <input type="text" class="input-text radius error" value="" name="credit" aria-required="true" aria-invalid="true">
                        <label id="credit-error" class="error" for="credit"><?php echo e($errors->first('credit')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="5-30个字符" name="credit" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">备注：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('note')): ?>
                    <textarea class="textarea radius error" name="note" placeholder="退换货要求描述" aria-required="true" aria-invalid="true"></textarea>
                        <label id="account-error" class="error" for="note"><?php echo e($errors->first('note')); ?></label>
                    <?php else: ?>
                        <textarea class="textarea radius" name="note" placeholder="250个字符" onKeyUp="textarealength(this,250)"></textarea>
                        <p class="textarea-numberbar"><em class="textarea-length">0</em>/250</p>
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
<script type="text/javascript" src="<?php echo e(asset('resources/cms/laydate/laydate.js')); ?>"></script>

<script type="text/javascript">

//打开子网页
function openUrl(id){
    var url = '<?php echo e(url("cms/upload")); ?>'+'/'+id+'/edit';
    layer.open({
      type: 2,
      area: ['700px', '530px'],
      fixed: false, //不固定
      maxmin: true,
      content: url
    });
}


//验证表单
$(document).ready(function(){

    ////该表单的每个提示信息再input右边展示
    $('#formSupplierAdd input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });

    $("#formSupplierAdd").validate({
        //表单规则
        rules:{
            fullName:{
                required:true,
                minlength:5,
                maxlength:100
            }, 
            // abbreviation:{
            //     required:true,
            //     minlength:2,
            //     maxlength:30
            // }, 
            type:{
                required:true,
                minlength:2,
                maxlength:30
            },
            brand:{
                required:true,
                minlength:2,
                maxlength:30
            },
            brandType:{
                required:true,
                minlength:2,
                maxlength:30
            },
            officeAdd:{
                required:true,
                minlength:5,
                maxlength:30
            },
            warehoustAdd:{
                required:true,
                minlength:5,
                maxlength:100
            },
            area:{
                required:true,
                minlength:5,
                maxlength:30
            },
            settlementMmethod:{
                minlength:5,
                maxlength:30
            }, 
            paymentMethod:{
                minlength:5,
                maxlength:30
            }, 
            priceTax:{
                number:true
            },
            priceNoTax:{
                number:true
            }, 
            account:{
                minlength:5,
                maxlength:30
            },
            contractDate:{
                date:true
            }
            // returnRequirements:{
            //     required:true,
            //     minlength:5,
            //     maxlength:30
            // }, 
        },
        //表单提示信息 
        messages:{
            fullName:{
                required:"必须填写供应商全称",
                minlength:"最小为5位",
                maxlength:"最大为100位"
            },
            // abbreviation:{
            //     required:"必须填写供应商简称",
            //     minlength:"最小为2位",
            //     maxlength:"最大为30位"
            // },
            type:{
                required:"必须填写供应商类型",
                minlength:"最小为2位",
                maxlength:"最大为30位"
            },
            brand:{
                required:"必须填写供应品牌",
                minlength:"最小为2位",
                maxlength:"最大为30位"
            },
            brandType:{
                required:"必须填写供应品类",
                minlength:"最小为2位",
                maxlength:"最大为30位"
            },
            officeAdd:{
                required:"必须填写办公地址",
                minlength:"最小为5位",
                maxlength:"最大为100位"
            },
            warehoustAdd:{
                required:"必须填写库房地址",
                minlength:"最小为5位",
                maxlength:"最大为100位"
            },
            area:{
                required:"必须填写采购区域",
                minlength:"最小为5位",
                maxlength:"最大为30位"
            },
            settlementMmethod:{
                minlength:"最小为5位",
                maxlength:"最大为30位"
            },
            paymentMethod:{
                minlength:"最小为5位",
                maxlength:"最大为30位"
            },
            priceTax:{
                number:"请输入正确的价格"
            },
            priceNoTax:{
                number:"请输入正确的价格"
            },
            account:{
                minlength:"最小为5位",
                maxlength:"最大为30位"
            },
            contractDate:{
                date:"请选择正确的日期"
            }
            // returnRequirements:{
            //     minlength:"最小为10位",
            //     maxlength:"最大为500位"
            // },
        }

    });
});
 
laydate({
  elem: '#contractDate', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
  event: 'focus' //响应事件。如果没有传入event，则按照默认的click
}); 

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("cms.layouts.admin", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>