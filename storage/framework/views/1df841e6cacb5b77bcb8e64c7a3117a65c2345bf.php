<?php $__env->startSection("content"); ?>


<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 
    <a  href="<?php echo e(url('cms/index/info')); ?>">首页 </a>
    <span class="c-gray en">&gt;</span> 
        库房产品管理
    <span class="c-gray en"></span> 
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

    <!-- 查找 -->
    <form method="get" action="#">
        <div class="box-shadow">
            <a class="btn btn-default" src="">产品筛选：</a>

        <?php foreach($whereField as $table=>$tableField): ?>
            <?php foreach($tableField as $field=>$fieldValue): ?>
                <a class="btn btn-disabled" src=""><?php echo e($fieldValue['name']); ?></a>
                <input class="input-text ac_input radius" name="<?php echo e($table); ?>[<?php echo e($field); ?>]"  style="width:100px"  type="text" value="<?php echo e($fieldValue['value']); ?>">
            <?php endforeach; ?>
        <?php endforeach; ?>

    <?php if($selectSupplier): ?>
        <!-- 选择供应商 -->
        <input type="hidden" value="<?php echo e($selectSupplier); ?>" name="selectSupplier">
        <input type="hidden" value="<?php echo e($sonName); ?>" name="sonName">
        <input type="hidden" value="<?php echo e($sonId); ?>" name="sonId">
    <?php else: ?>
    <?php endif; ?>    

            <button type="submit" class="btn btn-primary radius" >搜索</button>
            <a class="btn btn-primary radius" href="<?php echo e(url('cms/warehouseProduct')); ?>">清空所有筛选</a> 
        </div>

        <div class="box-shadow">
            <a class="btn btn-default" src="">产品排序：</a>

            <?php foreach($whereField as $table=>$tableField): ?>
                <?php foreach($tableField as $field=>$fieldValue): ?>
                    <a class="btn btn-primary size-MINI radius" href="<?php echo e(url('cms/warehouseProduct'.$fieldValue['sortUrl'].'&page='.$data->currentPage())); ?>"><?php echo e($fieldValue['name']); ?></a>
                <?php endforeach; ?>
            <?php endforeach; ?>

            <?php foreach($orderbyCurr as $list): ?>
            <span class="btn btn-primary active size-MINI radius">

                        <a href="<?php echo e($list['sortOne']); ?>" class="Hui-iconfont" style="color:#fff">
                            <?php echo e($list['name']); ?>

                            <?php if($list['value']==1): ?>
                                    <i class="Hui-iconfont">&#xe6d6;</i>
                            <?php else: ?>
                                <i class="Hui-iconfont">&#xe6d5;</i>
                            <?php endif; ?>
                        </a>
                        <span class="pipe">|</span>
                        <a href="<?php echo e($list['sortX']); ?>" class="Hui-iconfont" style="color:#fff">
                            <i class="Hui-iconfont">&#xe6a6;</i>
                        </a>
            </span>
            <?php endforeach; ?>
        </div>
    </form>

    <?php if($selectSupplier): ?>
        <!-- 选择供应商 -->
    <?php else: ?>
    <div class="cl pd-5 bg-1 bk-gray">
        <span class="l">
            <a href="javascript:;" onclick="actionStatus(1)" class="btn btn-danger radius">
                <i class="Hui-iconfont">&#xe631;</i> 批量停用
            </a>

            <a href="javascript:;" onclick="actionStatus(0)" class="btn btn-primary radius">
                <i class="Hui-iconfont">&#xe615;</i> 批量启用
            </a>
            <a class="btn btn-primary radius" data-title="添加供应商" _href="<?php echo e(url('cms/warehouseProduct/create')); ?>" onclick="Hui_admin_tab(this)" href="javascript:;">
                <i class="Hui-iconfont">&#xe600;</i> 添加供应商
            </a>
            </span> <span class="r">共有数据：<strong><?php echo e($data->total()); ?></strong> 条</span>
    </div>

    <?php endif; ?>
    <table class="table table-border table-striped table-bordered table-hover table-bg">
        <thead>
            <tr class="text-c">

                        <?php if($selectSupplier): ?><?php else: ?>
                        <th class="tc" width="5%"><input type="checkbox" name=""></th>
                        <?php endif; ?>

            <?php foreach($whereField as $table=>$tableField): ?>
                <?php foreach($tableField as $field=>$fieldValue): ?>
                        <th class="tc"><?php echo e($fieldValue['name']); ?></th>
                <?php endforeach; ?>
            <?php endforeach; ?>
                        <th>操作</th>
            </tr>
        </thead>
        <tbody>

            
            <?php foreach($data as $list): ?>

                <?php if($selectSupplier): ?>
                    <tr class="text-c" ondblclick="actionSelectSupplier('<?php echo e($list->supplierId); ?>','<?php echo e($list->fullName); ?>');">
                <?php else: ?>
                    <tr class="text-c <?php if($list->close): ?> danger <?php endif; ?>" ondblclick="actionEdit('编辑','<?php echo e(url('cms/supplier/'.$list->supplierId.'/edit')); ?>','1');" >
                <?php endif; ?>

                <?php if($selectSupplier): ?><?php else: ?>
                    <td class="tc"><input type="checkbox" name="id[]" value="<?php echo e($list->supplierId); ?>" selected=""></td>
                <?php endif; ?>

                <?php foreach($whereField as $table=>$tableField): ?>
                    <?php foreach($tableField as $field=>$fieldValue): ?>
                        <td  <?php if($list->close && !$selectSupplier): ?> class=" danger " <?php endif; ?>><?php $tmpField=$table.'_'.$field;echo $list->$tmpField;?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>

                     <td <?php if($list->close && !$selectSupplier): ?> class=" danger " <?php endif; ?>>
                        <?php if($selectSupplier): ?>
                        <a title="选择" href="javascript:;" onclick="actionSelectSupplier('<?php echo e($list->supplierId); ?>','<?php echo e($list->fullName); ?>');" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
                       <?php else: ?>
                        <?php if($list->close): ?>
                        <a title="启用" href="javascript:;" onclick="actionDelete('<?php echo e($list->supplierId); ?>',0)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
                        <?php else: ?>
                        <a title="停用" href="javascript:;" onclick="actionDelete('<?php echo e($list->supplierId); ?>',1)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>
                        <?php endif; ?>

                        <a style="text-decoration:none" data-title="添加供应商联系人" title="添加供应商联系人" _href="<?php echo e(url('cms/warehouseProduct/create/'.$list->supplierId)); ?>" onclick="Hui_admin_tab(this)" href="javascript:;">
                            <i class="Hui-iconfont">&#xe600;</i>
                        </a>
                        <a title="编辑" href="javascript:;" onclick="actionEdit('角色编辑','<?php echo e(url('cms/warehouseProduct/'.$list->supplierId.'/edit')); ?>','<?php echo e($list->supplierId); ?>')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table> 

        <div class="page_list f-r">
            <?php echo e($data->links()); ?>

        </div>

</div>
<script type="text/javascript">

<?php if($selectSupplier): ?>
var index = parent.layer.getFrameIndex(window.name); //获取窗口索引

//给父类传值
function actionSelectSupplier(id,name){

    parent.$('.<?php echo e($sonId); ?>').val(id);

    parent.$('#<?php echo e($sonName); ?>').val(name);

    parent.layer.close(index);

}
<?php endif; ?>


//多选
function actionStatus(close){
    var ids = $("input[type='checkbox']:checked").map(function(){
      var id = $(this).val();
      if(!isNaN(id)){
           return id;
      }
    }).get().join(',');

    if(!ids){
        layer.msg("您没有选择任务项哦！", {icon: 1,time:1000});
    }else{
        actionDelete(ids,close);

    }

}

/*添加*/
function actionAdd(title,url,w,h){
    layer_show(title,url,w,h);
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


/*启用关闭*/
function actionDelete(id,status){
        var tag = false;
        alert = '启用';
        if(status){
            alert = '停用';
        }
            layer.confirm("请确认"+alert+"该项？", {
              btn: ["确认","取消"] //按钮
            }, function(){
              
            //加载功能  
            layer.load();

            if(tag){
                return false;
            }else{
                tag = true;
            }

                $.post("<?php echo e(url('cms/warehouseProduct/')); ?>/"+id,{'_method':'delete','_token':"<?php echo e(csrf_token()); ?>",'status':status},function(data){
                    layer.closeAll('loading');
                    if(data.status){
                        layer.msg(data.msg, {icon: 1,time:1000});
                        
                        window.location.reload();
                    }else{
                        layer.msg("操作失败！请重新操作！", {icon: 5,time:1000});
                    }
                });

            });
    }

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>