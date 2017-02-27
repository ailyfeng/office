<?php $__env->startSection("content"); ?>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>
    <a  href="<?php echo e(url('cms/index/info')); ?>">首页</a>
    <span class="c-gray en">&gt;</span> 
    <a  href="<?php echo e(url('cms/product')); ?>">公司产品管理</a> <span class="c-gray en">&gt;</span> 
    添加公司产品 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <article class="page-container">
        <form action="<?php echo e(url('cms/product')); ?>" method="post" class="form form-horizontal" id="formProductAdd">
            <?php echo e(csrf_field()); ?>

            <div class="row cl">
                <label class=" col-xs-4 col-sm-2 text-r"></label>
                <div class="formControls col-xs-8 col-sm-9">
                    <table class="table">
                      <tr>
                        <th class="va-t">
                            <p>
                                <input type="hidden" name="picPositive" value="">
                                <img width=140 class="picPositive radius"  src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTEwYmJhZjQzYSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MTBiYmFmNDNhIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" alt="..." > 
                            </p>
                            <p>
                                <button type="button" class="btn btn-secondary radius size-MINI" onclick="openUrl('picPositive');">上传图片</button>
                                <button type="button" class="btn btn-danger radius size-MINI"   onclick="deleteImage('picPositive');">删除图片</button>
                            </p>
                         </th>
                        <th class="va-m">
                            <p>
                                <input type="hidden" name="picSide" value="" >
                                <img width=140 class="picSide radius"   src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTEwYmJhZjQzYSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MTBiYmFmNDNhIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" alt="..." > 
                            </p>
                            <p>
                                <button type="button" class="btn btn-secondary radius size-MINI" onclick="openUrl('picSide');">上传图片</button>
                                <button type="button" class="btn btn-danger radius size-MINI"   onclick="deleteImage('picSide');">删除图片</button>
                            </p>
                         </th>
                        <th class="va-b">
                            <p>
                                <input type="hidden" name="picBackground" value="" >
                                <img width=140 class="picBackground radius"   src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTEwYmJhZjQzYSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MTBiYmFmNDNhIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" alt="..." > 
                            </p>
                            <p>
                                <button type="button" class="btn btn-secondary radius size-MINI" onclick="openUrl('picBackground');">上传图片</button>
                                <button type="button" class="btn btn-danger radius size-MINI"   onclick="deleteImage('picBackground');">删除图片</button>
                            </p>
                         </th>
                      </tr>
                    </table> 
                     做3张图片 ：正面图、侧面图、背景图
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>供应商：</label>
                <div class="formControls col-xs-8 col-sm-9">
                        <input type="hidden" name="supplierId" value="<?php echo e($data['supplierId']); ?>" class="supplierId">
                    <?php if($errors->has('supplierId')): ?>
                        <input type="text" class="input-text radius error" value="<?php echo e($data['supplierId']); ?>"  readonly="readonly" name="supplierId_" id="supplierId" placeholder="请选择供应商" onclick="actionEdit('选择供应商','<?php echo e(url('cms/supplier')); ?>','1')" aria-required="true" aria-invalid="true">
                        <label id="supplierId-error" class="error" for="supplierId"><?php echo e($errors->first('supplierId')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius" value="<?php echo e($data['supplierId']); ?>" readonly="readonly" placeholder="请选择供应商" name="supplierId_" id="supplierId">
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">辅助供应商：</label>
                <div class="formControls col-xs-8 col-sm-9">
                        <input type="hidden" name="supplierIdExt" class="supplierIdExt">
                    <?php if($errors->has('supplierIdExt')): ?>
                        <input type="text" class="input-text radius error" value=""  readonly="readonly" name="supplierIdExt_" id="supplierIdExt" placeholder="请选辅助择供应商" onclick="actionEdit('选择辅助供应商','<?php echo e(url('cms/supplier')); ?>','1')" aria-required="true" aria-invalid="true">
                        <label id="supplierIdExt-error" class="error" for="supplierIdExt"><?php echo e($errors->first('supplierIdExt')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius" value="" readonly="readonly" placeholder="请选择辅助供应商" name="supplierIdExt_" id="supplierIdExt">
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>品牌(中文)：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('chineseBrand')): ?>
                        <input type="text" class="input-text radius error" value="" name="chineseBrand" aria-required="true" aria-invalid="true">
                        <label id="chineseBrand-error" class="error" for="chineseBrand"><?php echo e($errors->first('chineseBrand')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value=""  placeholder="2-30个汉字" name="chineseBrand" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>品牌(英文)：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('englishBrand')): ?>
                        <input type="text" class="input-text radius error" value="" name="englishBrand" aria-required="true" aria-invalid="true">
                        <label id="englishBrand-error" class="error" for="englishBrand"><?php echo e($errors->first('englishBrand')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="5-100个字符"  name="englishBrand" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>品名：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('brandName')): ?>
                        <input type="text" class="input-text radius error" value="" name="brandName" aria-required="true" aria-invalid="true">
                        <label id="brandName-error" class="error" for="brandName"><?php echo e($errors->first('brandName')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value=""  placeholder="5-100个字符"  name="brandName" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>货号：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('number')): ?>
                        <input type="text" class="input-text radius error" value="" name="number" aria-required="true" aria-invalid="true">
                        <label id="number-error" class="error" for="number"><?php echo e($errors->first('number')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="该产品上(或外包装上)标示的货号" name="number" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">简要规格：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('standard')): ?>
                    <textarea class="textarea radius error" name="standard" placeholder="退换货要求描述" aria-required="true" aria-invalid="true"></textarea>
                        <label id="account-error" class="error" for="standard"><?php echo e($errors->first('standard')); ?></label>
                    <?php else: ?>
                        <textarea class="textarea radius" name="standard" onKeyUp="textarealength(this,500)"></textarea>
                        <p class="textarea-numberbar"><em class="textarea-length">0</em>/500</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">颜色：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text radius" value="" placeholder="白色" id="" name="color">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">单位：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text radius" value="" placeholder="0" id="" name="unit">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">最小包规计算数量：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text radius" value="" placeholder="用于计算拿货时最小包装的数量,如:要进24支笔此处数量为12时(即12支/盒)则计为2盒_ 每盒数量" id="" name="packageNum">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">最小包规单位：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text radius" value="" placeholder="0" id="" name="packageUnit">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">类别：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <span class="select-box radius ">
                      <select class="input-text radius" size="1" name="type">
                        <?php foreach($type as $list): ?>
                            <option value="<?php echo e($list['id']); ?>" ><?php $sunNum = substr_count($list['sort'],'-'); for($i=0;$i<$sunNum;$i++){echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";} ?><?php echo e($list['name']); ?></option>
                        <?php endforeach; ?>
                      </select>
                    </span>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>包规：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <?php if($errors->has('packageRules')): ?>
                        <input type="text" class="input-text radius error" value="" placeholder="" name="packageRules" aria-required="true" aria-invalid="true">
                        <label id="packageRules-error" class="error" for="packageRules"><?php echo e($errors->first('packageRules')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" name="packageRules" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">产品详细描述：</label>
                <div class="formControls col-xs-8 col-sm-9">
                            <textarea class="textarea radius" name="description" ></textarea>
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">产品详细描述：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <?php if($errors->has('description')): ?>
                    <textarea class="textarea radius error" name="description" aria-required="true" aria-invalid="true"></textarea>
                        <label id="account-error" class="error" for="description"><?php echo e($errors->first('description')); ?></label>
                    <?php else: ?>
                        <textarea class="textarea radius" name="description" placeholder="详细规格和对该产品使用方法的说明,以及对该产品的描述" onKeyUp="textarealength(this,500)"></textarea>
                        <p class="textarea-numberbar"><em class="textarea-length">0</em>/500</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">产品效期：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <input type="text" class="input-text radius" value="" placeholder="" id="" name="expiration">
                </div>
            </div>


            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>进货单价：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <?php if($errors->has('stockPrice')): ?>
                        <input type="text" class="input-text radius error" value="" placeholder="" name="stockPrice" aria-required="true" aria-invalid="true">
                        <label id="stockPrice-error" class="error" for="stockPrice"><?php echo e($errors->first('stockPrice')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value=""  placeholder="0000.00" name="stockPrice" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>成本单价：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <?php if($errors->has('costPrice')): ?>
                        <input type="text" class="input-text radius error" value="" placeholder="直接进货价加采管成本后的价格" name="costPrice" aria-required="true" aria-invalid="true">
                        <label id="costPrice-error" class="error" for="costPrice"><?php echo e($errors->first('costPrice')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value=""  placeholder="0000.00" name="costPrice" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>标准售价：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <?php if($errors->has('standardPrice')): ?>
                        <input type="text" class="input-text radius error" value="" placeholder="针对未分级客户或标准级客户的售价" name="standardPrice" aria-required="true" aria-invalid="true">
                        <label id="standardPrice-error" class="error" for="standardPrice"><?php echo e($errors->first('standardPrice')); ?></label>
                    <?php else: ?>
                         <input type="text" class="input-text radius " value="" placeholder="针对未分级客户或标准级客户的售价" name="standardPrice" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">分类售价一：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <input type="text" class="input-text radius" value="" placeholder="针对一级客户的售价" id="" name="oneTypePrice">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">分类售价一：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <input type="text" class="input-text radius" value="" placeholder="针对二级客户的售价" id="" name="twoTypePrice">
                </div>
            </div>


            <div class="row cl">
                <label class=" col-xs-4 col-sm-2 text-r"></label>
                <div class="formControls col-xs-8 col-sm-9">
                    <table class="table">
                      <tr>
                        <th class="va-t">
                            <p>
                                <input type="hidden" name="barCode" value="" >
                                <img width=140  class="radius barCode" src="<?php echo e(asset('resources/cms/images/barCode.png')); ?>" > 
                            </p>
                            <p>
                                <button type="button" class="btn btn-secondary radius size-MINI" onclick="openUrl('barCode');">上传图片</button>
                                <button type="button" class="btn btn-danger radius size-MINI"   onclick="deleteImage('barCode');">删除图片</button>
                            </p>
                          </th>
                        <th class="va-m">
                            <p>
                                <input type="hidden" name="qrCode" value="" >
                                <img width=140 class=" radius qrCode" src="<?php echo e(asset('resources/cms/images/qrCode.png')); ?>" > 

                            <p>
                                <button type="button" class="btn btn-secondary radius size-MINI" onclick="openUrl('qrCode');">上传图片</button>
                                <button type="button" class="btn btn-danger radius size-MINI"   onclick="deleteImage('qrCode');">删除图片</button>
                            </p>
                         </th>
                      </tr>
                    </table> 
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

<script src="<?php echo e(asset('resources/cms/uploadify/jquery.uploadify.min.js')); ?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('resources/cms/uploadify/uploadify.css')); ?>">

<script type="text/javascript" src="<?php echo e(asset('resources/cms/static/h-ui/js/H-ui.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('resources/cms/lib/icheck/jquery.icheck.min.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('resources/cms/lib/jquery.validation/1.14.0/jquery.validate.min.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('resources/cms/lib/jquery.validation/1.14.0/validate-methods.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('resources/cms/lib/jquery.validation/1.14.0/messages_zh.min.js')); ?>"></script> 

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

//重置图片
function deleteImage(id){
    var image = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTEwYmJhZjQzYSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MTBiYmFmNDNhIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=';
    $('.'+id).attr('src',image);

}

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

    //选择供应商
    $('#supplierId').focus(function(){
        actionEdit('选择供应商','<?php echo e(url('cms/supplier?selectSupplier=1')); ?>&sonId=supplierId&sonName=supplierId','1');
    });

    //选择辅助供应商
    $('#supplierIdExt').focus(function(){
        actionEdit('选择辅助供应商','<?php echo e(url('cms/supplier?selectSupplier=1')); ?>&sonId=supplierIdExt&sonName=supplierIdExt','1');
    });

    ////该表单的每个提示信息再input右边展示
    $('#formProductAdd input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });

    //表单规则
    $("#formProductAdd").validate({
        rules:{

            supplierName:{
                required:true,
            },
            chineseBrand:{
                required:true,
                minlength:2,
                maxlength:30
            },
            englishBrand:{
                required:true,
                minlength:5,
                maxlength:100
            },
            brandName:{
                required:true,
                minlength:5,
                maxlength:100
            },
            number:{
                required:true
            },
            packageRules:{
                required:true
            },
            stockPrice:{
                required:true,
                number:true
            },
            costPrice:{
                required:true,
                number:true
            },
            standardPrice:{
                required:true,
                number:true
            }
        },
        //表单提示信息 
        messages:{
            supplierId:{
                required:"必须选择供应商",
            },
            chineseBrand:{
                required:"必须填写2-30个汉字",
                minlength:"最小为2位",
                maxlength:"最大为30位"
            },
            englishBrand:{
                required:"必须填写5-100个汉字",
                minlength:"最小为5位",
                maxlength:"最大为100位"
            },
            brandName:{
                required:"必须填写5-100个汉字",
                minlength:"最小为5位",
                maxlength:"最大为100位"
            },
            number:{
                required:"该产品上(或外包装上)标示的货号"
            },
            packageRules:{
                required:"该产品的小包装,中包装,大包装的规格数量"
            },
            stockPrice:{
                required:"直接进货价加采管成本后的价格",
                number:"请输入正确的数字"
            },
            costPrice:{
                required:"直接进货价加采管成本后的价格",
                number:"请输入正确的数字"
            },
            standardPrice:{
                required:"针对未分级客户或标准级客户的售价",
                number:"请输入正确的数字"
            }
        }

    });
});


</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("cms.layouts.admin", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>