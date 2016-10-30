
<?php $__env->startSection("content"); ?>

    <script src="<?php echo e(asset('resources/OfficeCMS/uploadify/jquery.uploadify.min.js')); ?>" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('resources/OfficeCMS/uploadify/uploadify.css')); ?>">

    <style>
        .uploadify{display:inline-block;}
        .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
        table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
    </style>

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="javascript:void();" onclick="location.reload();"><i class="fa fa-refresh"></i>更新网页</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="<?php echo e(url('cms/product_storage')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="130"><i class="require">*</i>供应商：</th>
                        <td>
                            <select name="supplierId">
                                <option value="12">==请选择==</option>
                                <option value="1">微软</option>
                                <option value="2">华为</option>
                                <option value="3">思科</option>
                                <option value="4">百度</option>
                            </select>
                            <?php if($errors->has('supplierId')): ?>
                                <i class="require"> <?php echo e($errors->first('supplierId')); ?></i>
                            <?php else: ?>
                                <span>此项需要点击按钮后弹出框中搜索供应商选择后自动填充在这里</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>辅助供应商：</th>
                        <td>
                            <select name="supplierIdExt">
                                <option value="0">==请选择==</option>
                                <option value="19">微软</option>
                                <option value="20">华为</option>
                                <option value="20">思科</option>
                                <option value="20">百度</option>
                            </select>
                            <span>此项需要点击按钮后弹出框中搜索供应商选择后自动填充在这里</span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>品牌(中文)：</th>
                        <td>
                            <input type="text" class="lg" name="chineseBrand">

                            <?php if($errors->has('chineseBrand')): ?>
                                <i class="require"> <?php echo e($errors->first('chineseBrand')); ?></i>
                            <?php else: ?>
                                <span>2-30个汉字</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>品牌(英文)</th>
                        <td>
                            <input type="text" class="lg" name="englishBrand">
                            <?php if($errors->has('englishBrand')): ?>
                                <i class="require"> <?php echo e($errors->first('englishBrand')); ?></i>
                            <?php else: ?>
                                <span>5-100个字符</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>品名</th>
                        <td>
                            <input type="text" class="lg" name="brandName">
                            <?php if($errors->has('brandName')): ?>
                                <i class="require"> <?php echo e($errors->first('brandName')); ?></i>
                            <?php else: ?>
                                <span>5-100个字符</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>货号</th>
                        <td>
                            <input type="text" class="mg" name="number">
                            <?php if($errors->has('number')): ?>
                                <i class="require"> <?php echo e($errors->first('number')); ?></i>
                            <?php else: ?>
                                <span>该产品上(或外包装上)标示的货号</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>简要规格</th>
                        <td>
                            <textarea class="mg" name="standard"></textarea>
                            <?php if($errors->has('standard')): ?>
                                <i class="require"> <?php echo e($errors->first('standard')); ?></i>
                            <?php else: ?>
                                <span></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>颜色：</th>
                        <td>
                            <input type="text" name="color">
                            <?php if($errors->has('color')): ?>
                                <i class="require"> <?php echo e($errors->first('color')); ?></i>
                            <?php else: ?>
                                <span></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>单位：</th>
                        <td>
                            <input type="text" name="unit" class="sm">
                            <?php if($errors->has('unit')): ?>
                                <i class="require"> <?php echo e($errors->first('unit')); ?></i>
                            <?php else: ?>
                                <span></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>最小包规计算数量：</th>
                        <td>
                            <input type="text" name="packageNum" class="sm">
                            <?php if($errors->has('packageNum')): ?>
                                <i class="require"> <?php echo e($errors->first('packageNum')); ?></i>
                            <?php else: ?>
                                <span>用于计算拿货时最小包装的数量,如:要进24支笔此处数量为12时(即12支/盒)则计为2盒_ 每盒数量</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>最小包规单位：</th>
                        <td>
                            <input type="text" name="packageUnit" class="sm" placeholder="1">
                            <?php if($errors->has('packageUnit')): ?>
                                <i class="require"> <?php echo e($errors->first('packageUnit')); ?></i>
                            <?php else: ?>
                                <span>一包，一件。。。。如果单个，就不用填写</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>类别：</th>
                        <td>
                            <select name="type">
                                <option value="">==请选择==</option>
                                <option value="lg">大类</option>
                                <option value="md">中类</option>
                                <option value="xs">小类</option>
                            </select>
                            <?php if($errors->has('type')): ?>
                                <i class="require"> <?php echo e($errors->first('type')); ?></i>
                            <?php else: ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>包规：</th>
                        <td>
                            <input type="text" name="packageRules" class="sm" >
                            <?php if($errors->has('packageRules')): ?>
                                <i class="require"> <?php echo e($errors->first('packageRules')); ?></i>
                            <?php else: ?>
                                <span>该产品的小包装,中包装,大包装的规格数量</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>产品详细描述：</th>
                        <td>
                            <textarea class="lg" name="description"></textarea>
                            <?php if($errors->has('description')): ?>
                                <i class="require"> <?php echo e($errors->first('description')); ?></i>
                            <?php else: ?>
                                <p>详细规格和对该产品使用方法的说明,以及对该产品的描述</p>
                            <?php endif; ?>
                        </td>
                    </tr>

                    <tr>
                        <th>产品效期：</th>
                        <td>
                            <input type="text" name="expiration">
                            <?php if($errors->has('expiration')): ?>
                                <i class="require"> <?php echo e($errors->first('expiration')); ?></i>
                            <?php else: ?>
                                <span>即该产品的保质期</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>进货单价：</th>
                        <td>
                            <input type="text" class="md" name="stockPrice" placeholder="0000.00">元
                            <?php if($errors->has('stockPrice')): ?>
                                <i class="require"> <?php echo e($errors->first('stockPrice')); ?></i>
                            <?php else: ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>成本单价：</th>
                        <td>
                            <input type="text" class="md" name="costPrice" placeholder="0000.00">元
                            <?php if($errors->has('costPrice')): ?>
                                <i class="require"> <?php echo e($errors->first('costPrice')); ?></i>
                            <?php else: ?>
                                <span><i class="fa fa-exclamation-circle yellow"></i>直接进货价加采管成本后的价格</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>标准售价：</th>
                        <td>
                            <input type="text" class="md" name="standardPrice" placeholder="0000.00">元
                            <?php if($errors->has('standardPrice')): ?>
                                <i class="require"> <?php echo e($errors->first('standardPrice')); ?></i>
                            <?php else: ?>
                                <span><i class="fa fa-exclamation-circle yellow"></i>针对未分级客户或标准级客户的售价</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>分类售价一：</th>
                        <td>
                            <input type="text" class="md" name="oneTypePrice" placeholder="0000.00">元
                            <?php if($errors->has('oneTypePrice')): ?>
                                <i class="require"> <?php echo e($errors->first('oneTypePrice')); ?></i>
                            <?php else: ?>
                                <span><i class="fa fa-exclamation-circle yellow"></i>针对分级客户的售价</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>分类售价二：</th>
                        <td>
                            <input type="text" class="md" name="twoTypePrice" placeholder="0000.00">元
                            <?php if($errors->has('twoTypePrice')): ?>
                                <i class="require"> <?php echo e($errors->first('twoTypePrice')); ?></i>
                            <?php else: ?>
                                <span><i class="fa fa-exclamation-circle yellow"></i>针对分级客户的售价</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>条形码：</th>
                        <td>
                            <input type="text" name="barCode">
                            <input id="barCode_upload" name="barCode_upload" type="file" multiple="true">

                            <script type="text/javascript">
                                <?php $timestamp = time();?>
                                $(function() {
                                    $('#barCode_upload').uploadify({
                                        'buttonText' : '图片上传',
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                            '_token'     : "<?php echo e(csrf_token()); ?>",
                                        },
                                        'swf'      : "<?php echo e(asset('resources/OfficeCMS/uploadify/uploadify.swf')); ?>",
                                        'uploader' : "<?php echo e(url('cms/upload')); ?>",
                                        'onUploadSuccess' : function(file, data, response) {
                                            $('input[name=barCode]').val(data);
                                           // $('#art_thumb_img').attr('src','/'+data);
                                        }

                                    });
                                });
                            </script>
                            <?php if($errors->has('barCode')): ?>
                                <i class="require"> <?php echo e($errors->first('barCode')); ?></i>
                            <?php else: ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>二维码：</th>
                        <td>
                            <input type="text" name="qrCode">
                            <input id="qrCode_upload" name="qrCode_upload" type="file" multiple="true">

                            <script type="text/javascript">
                                <?php $timestamp = time();?>
                                $(function() {
                                    $('#qrCode_upload').uploadify({
                                        'buttonText' : '图片上传',
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                            '_token'     : "<?php echo e(csrf_token()); ?>",
                                        },
                                        'swf'      : "<?php echo e(asset('resources/OfficeCMS/uploadify/uploadify.swf')); ?>",
                                        'uploader' : "<?php echo e(url('cms/upload')); ?>",
                                        'onUploadSuccess' : function(file, data, response) {
                                            $('input[name=qrCode]').val(data);
                                            // $('#art_thumb_img').attr('src','/'+data);
                                        }

                                    });
                                });
                            </script>
                            <?php if($errors->has('qrCode')): ?>
                                <i class="require"> <?php echo e($errors->first('qrCode')); ?></i>
                            <?php else: ?>
                            <?php endif; ?>
                            <a href="javascript:void(0);" id="qrCode" class="btn btn-primary btn-lg"  onclick="uploadimage('qrCode');">上传</a>
                        </td>
                    </tr>

                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("officecms.layout.cms", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>