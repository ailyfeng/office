<?php $__env->startSection("content"); ?>

    <script src="<?php echo e(asset('resources/cms/uploadify/jquery.uploadify.min.js')); ?>" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('resources/cms/uploadify/uploadify.css')); ?>">

<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> <a href="<?php echo e(url('cms/index/info')); ?>" >首页 </a><span class="c-gray en">&gt;</span> 
        <a href="javascript:;" data-title="供应商管理" _href="<?php echo e(url('cms/supplier')); ?>" onclick="Hui_admin_tab(this)" href="javascript:;">
            供应商管理
        </a>
        <span class="c-gray en">&gt;</span> 
        为供应商添加联系人 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <article class="page-container">
        <form action="<?php echo e(url('cms/supplierContract')); ?>" method="post" class="form form-horizontal" id="formSupplierContractAdd">
            <?php echo e(csrf_field()); ?>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>供应商：</label>
                <div class="formControls col-xs-8 col-sm-9">
                        <input type="hidden" name="supplierId" value="<?php echo e($data['supplierId']); ?>" class="supplierId">
                    <?php if($errors->has('supplierId')): ?>
                        <input type="text" class="input-text radius error" value="<?php echo e($data['fullName']); ?>"  readonly="readonly" name="supplierId_" id="supplierId" placeholder="请选择供应商" onclick="actionEdit('选择供应商','<?php echo e(url('cms/supplier?selectSupplier=1')); ?>&sonId=supplierId&sonName=supplierId','1')" aria-required="true" aria-invalid="true">
                        <label id="supplierId-error" class="error" for="supplierId"><?php echo e($errors->first('supplierId')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius" value="<?php echo e($data['fullName']); ?>" readonly="readonly" placeholder="请选择供应商" name="supplierId_" id="supplierId" onclick=" actionEdit('选择供应商','<?php echo e(url('cms/supplier?selectSupplier=1')); ?>&sonId=supplierId&sonName=supplierId','1');" aria-required="true" aria-invalid="true">
                    <?php endif; ?>
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>姓名：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('name')): ?>
                        <input type="text" class="input-text radius error" value="" name="name" aria-required="true" aria-invalid="true">
                        <label id="name-error" class="error" for="name"><?php echo e($errors->first('name')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius" value="" placeholder="2-30个字符" name="name" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">英文名/昵称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('nickname')): ?>
                        <input type="text" class="input-text radius error" value="" name="nickname" aria-required="true" aria-invalid="true">
                        <label id="nickname-error" class="error" for="nickname"><?php echo e($errors->first('nickname')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="2-30个字符"  name="nickname" >
                    <?php endif; ?>
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">性别：</label>
                <div class="formControls col-xs-8 col-sm-9">

                    <?php foreach($isGender as $k=>$v): ?>
                    
                     <div class="radio-box">
                        <input type="radio" id="radio-<?php echo e($k); ?>" name="gender" value="<?php echo e($k); ?>" <?php if($k==1): ?>checked="checked" <?php endif; ?> >
                        <label for="radio-<?php echo e($k); ?>"><?php echo e($v); ?></label>
                      </div>

                    <?php endforeach; ?>

                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">职位/描述：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('position')): ?>
                    <textarea class="textarea radius error" name="position" placeholder="250个字符" aria-required="true" aria-invalid="true"></textarea>
                        <label id="account-error" class="error" for="position"><?php echo e($errors->first('position')); ?></label>
                    <?php else: ?>
                        <textarea class="textarea radius" name="position" placeholder="250个字符" onKeyUp="textarealength(this,250)"></textarea>
                        <p class="textarea-numberbar"><em class="textarea-length">0</em>/250</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">年龄：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('age')): ?>
                        <input type="text" class="input-text radius error" value="" name="age" aria-required="true" aria-invalid="true">
                        <label id="age-error" class="error" for="age"><?php echo e($errors->first('age')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value=""  placeholder=""  name="age" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">座机电话：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('phone')): ?>
                        <input type="text" class="input-text radius error" value="" name="phone" aria-required="true" aria-invalid="true">
                        <label id="phone-error" class="error" for="phone"><?php echo e($errors->first('phone')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="" name="phone" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">分机：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('phoneExt')): ?>
                        <input type="text" class="input-text radius error" value="" name="phoneExt" aria-required="true" aria-invalid="true">
                        <label id="phoneExt-error" class="error" for="phoneExt"><?php echo e($errors->first('phoneExt')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="" name="phoneExt" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">手机一：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('telOne')): ?>
                        <input type="text" class="input-text radius error" value="" name="telOne" aria-required="true" aria-invalid="true">
                        <label id="telOne-error" class="error" for="telOne"><?php echo e($errors->first('telOne')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="" name="telOne" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">手机二：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('telTwo')): ?>
                        <input type="text" class="input-text radius error" value="" name="telTwo" aria-required="true" aria-invalid="true">
                        <label id="telTwo-error" class="error" for="telTwo"><?php echo e($errors->first('telTwo')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="" name="telTwo" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">邮箱：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('email')): ?>
                        <input type="text" class="input-text radius error" value="" name="email" aria-required="true" aria-invalid="true">
                        <label id="email-error" class="error" for="email"><?php echo e($errors->first('email')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="" name="email" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">QQ：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('qq')): ?>
                        <input type="text" class="input-text radius error" value="" name="qq" aria-required="true" aria-invalid="true">
                        <label id="qq-error" class="error" for="qq"><?php echo e($errors->first('qq')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="" name="qq" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">微信：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('wechat')): ?>
                        <input type="text" class="input-text radius error" value="" name="wechat" aria-required="true" aria-invalid="true">
                        <label id="wechat-error" class="error" for="wechat"><?php echo e($errors->first('wechat')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="" name="wechat" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">个人帐户：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('account')): ?>
                        <input type="text" class="input-text radius error" value="" name="account" aria-required="true" aria-invalid="true">
                        <label id="account-error" class="error" for="priceNoTax"><?php echo e($errors->first('account')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="" name="account" >
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
                <label class="form-label col-xs-4 col-sm-2">生日：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('birthday')): ?>
                        <input type="text" name="birthday" id="birthday" class=" input-text radius error" aria-required="true" readonly  aria-invalid="true">
                        <label id="birthday-error" class="error" for="birthday"><?php echo e($errors->first('birthday')); ?></label>
                    <?php else: ?>
                         <input type="text" name="birthday" id="birthday" class=" input-text radius " readonly  placeholder="0000-00-00">
                        
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">备注：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('note')): ?>
                    <textarea class="textarea radius error" name="note" placeholder="" aria-required="true" aria-invalid="true"></textarea>
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
    $('#formSupplierContractAdd input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });

    $("#formSupplierContractAdd").validate({
        //表单规则
        rules:{
            name:{
                required:true,
                minlength:2,
                maxlength:30
            }, 
            nickname:{
                minlength:2,
                maxlength:30
            },
            position:{
                maxlength:250
            },
            age:{
                number:true,
                maxlength:3
            },
            phone:{
                number:true,
                minlength:6,
                maxlength:11
            },
            phoneExt:{
                number:true,
                minlength:1,
                maxlength:11
            },
            telOne:{
                minlength:11,
                maxlength:11
            },
            telTwo:{
                minlength:11,
                maxlength:11
            }, 
            email:{
                email:true
            }, 
            qq:{
                number:true,
                minlength:4,
                maxlength:11
            },
            wechat:{
                minlength:2,
                maxlength:20
            }, 
            account:{
                minlength:5,
                maxlength:40
            },
            birthday:{
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
            name:{
                required:"必须填写姓名",
                minlength:"最小为2位",
                maxlength:"最大为30位"
            },
            nickname:{
                minlength:"最小为2位",
                maxlength:"最大为30位"
            },
            position:{
                maxlength:"最大为250位"
            },
            age:{
                number:"填写年龄有误",
                maxlength:"最大为2位"
            },
            phone:{
                number:"座机电话有误",
                minlength:"最小为6位",
                maxlength:"最大为11位"
            },
            phoneExt:{
                number:"分机有误",
                minlength:"最小为1位",
                maxlength:"最大为11位"
            },
            telOne:{
                minlength:"手机号码不正确",
                maxlength:"手机号码不正确"
            },
            telTwo:{
                minlength:"手机号码不正确",
                maxlength:"手机号码不正确"
            },
            email:{
                email:"邮箱不正确"
            },
            qq:{
                number:"qq不正确",
                minlength:"最小为4位",
                maxlength:"最大为11位"
            },
            wechat:{
                minlength:"最小为3位",
                maxlength:"最大为20位"
            },
            account:{
                minlength:"最小为5位",
                maxlength:"最大为40位"
            },
            birthday:{
                date:"请选择正确的日期"
            }
        }

    });
});
 
laydate({
  elem: '#birthday', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
  event: 'focus' //响应事件。如果没有传入event，则按照默认的click
}); 

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("cms.layouts.admin", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>