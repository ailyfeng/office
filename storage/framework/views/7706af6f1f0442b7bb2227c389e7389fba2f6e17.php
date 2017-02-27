<?php $__env->startSection("content"); ?>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 库房管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

    <!-- 查找 -->
    <form method="get" action="#">
        <div class="box-shadow">
            <a class="btn btn-default" src="">产品筛选：</a>

            <?php foreach($whereField as $f=>$lista): ?>

                <?php if($f=='sort'): ?>
                <a class="btn btn-disabled" src="">类别</a>
                <span class="select-box radius" style="width:120px" >
                  <select class="select" size="1" name="sort">
                        <option value="" >无</option>
                   <?php foreach($type as $list): ?>
                        <option value="<?php echo e($list->sort); ?>" <?php if($lista['value']==$list->sort): ?> selected="selected"  <?php endif; ?> ><?php $sunNum = substr_count($list['sort'],'-'); for($i=0;$i<$sunNum;$i++){echo "&nbsp;&nbsp;&nbsp;";} ?><?php echo e($list['name']); ?></option>
                    <?php endforeach; ?>
                  </select>
                </span>
                <?php else: ?>

                <a class="btn btn-disabled" src=""><?php echo e($lista['name']); ?></a>
                <input class="input-text ac_input radius" name="<?php echo e($lista['field']); ?>"  style="width:100px"  type="text" value="<?php echo e($lista['value']); ?>">
                <?php endif; ?>
            <?php endforeach; ?>

           <?php echo e(csrf_field()); ?>

            <!-- 选择供应商 -->
            <input type="hidden" value="" name="field" id="field">
            <button type="submit" class="btn btn-primary radius" >搜索</button>
            <a class="btn btn-primary radius" href="<?php echo e(url('cms/warehouse')); ?>">清空所有筛选</a> 
        </div>

        <div class="box-shadow">
            <a class="btn btn-default" src="">产品排序：</a>

            <?php foreach($whereField as $f=>$lista): ?>
                <a class="btn btn-primary size-MINI radius" href="<?php echo e(url('cms/warehouse'.$lista['sortUrl'].'&page='.$data->currentPage())); ?>"><?php echo e($lista['name']); ?></a>
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
    <div class="cl pd-5 bg-1 bk-gray">
        <span class="l">
            <a href="javascript:;" onclick="actionStatus(1)" class="btn btn-danger radius">
                <i class="Hui-iconfont">&#xe6e2;</i> 批量停用
            </a>

            <a href="javascript:;" onclick="actionStatus(0)" class="btn btn-primary radius">
                <i class="Hui-iconfont">&#xe6e2;</i> 批量启用
            </a>
            <a class="btn btn-primary radius" data-title="添加库房" _href="<?php echo e(url('cms/warehouse/create')); ?>" onclick="Hui_admin_tab(this)" href="javascript:;">
                <i class="Hui-iconfont">&#xe600;</i> 添加库房
            </a>
            </span> <span class="r">共有数据：<strong><?php echo e($data->total()); ?></strong> 条</span>
    </div>
    <table class="table table-border table-striped table-bordered table-hover table-bg">
        <thead>
            <tr class="text-c">

                        <?php if($selectSupplier): ?>
                        <?php else: ?>
                        <th class="tc" width="5%"><input type="checkbox" name=""></th>
                        <?php endif; ?>
            <?php foreach($whereField as $f=>$lista): ?>
                        <th class="tc"><?php echo e($lista['name']); ?></th>
            <?php endforeach; ?>
                        <th>操作</th>
            </tr>
<!-- 
            <tr class="text-c">
                <th class="tc" width="5%"><input type="checkbox" name=""></th>
                <th class="tc">库房名称</th>
                <th>库房面积</th>
                <th>员工人数</th>
                <th>配送区域</th>
                <th>储值额度</th>
                <th>操作</th>
            </tr> -->
        </thead>
        <tbody>


            
            <?php foreach($data as $list): ?>

            <?php if($selectSupplier): ?>
                <tr class="text-c" ondblclick="actionSelectSupplier('<?php echo e($list->warehouseId); ?>','<?php echo e($list->name); ?>');">
            <?php else: ?>
                <tr class="text-c <?php if($list->close): ?> danger <?php endif; ?>" ondblclick="actionEdit('编辑','<?php echo e(url('cms/warehouse/'.$list->warehouseId.'/edit')); ?>','1');" >
            <?php endif; ?>

            <?php if($selectSupplier): ?><?php else: ?>
                <td class="tc"><input type="checkbox" name="id[]" value="<?php echo e($list->warehouseId); ?>" selected=""></td>
            <?php endif; ?>

            <?php foreach($whereField as $f=>$lista): ?>
                <td  <?php if($list->close && !$selectSupplier): ?> class=" danger " <?php endif; ?>><?php echo e($list->$lista['field']); ?></td>
            <?php endforeach; ?>

                 <td <?php if($list->close && !$selectSupplier): ?> class=" danger " <?php endif; ?>>
                    <?php if($selectSupplier): ?>
                    <a title="选择" href="javascript:;" onclick="actionSelectSupplier('<?php echo e($list->warehouseId); ?>','<?php echo e($list->name); ?>');" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
                   <?php else: ?>
                    <?php if($list->close): ?>
                    <a title="启用" href="javascript:;" onclick="actionDelete('<?php echo e($list->warehouseId); ?>',0)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
                    <?php else: ?>
                    <a title="停用" href="javascript:;" onclick="actionDelete('<?php echo e($list->warehouseId); ?>',1)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>
                    <?php endif; ?>

                    <a style="text-decoration:none" data-title="添加供应商联系人" title="添加供应商联系人" _href="<?php echo e(url('cms/supplierContract/create/'.$list->warehouseId)); ?>" onclick="Hui_admin_tab(this)" href="javascript:;">
                        <i class="Hui-iconfont">&#xe600;</i>
                    </a>
                    <a title="编辑" href="javascript:;" onclick="actionEdit('角色编辑','<?php echo e(url('cms/warehouse/'.$list->warehouseId.'/edit')); ?>','<?php echo e($list->warehouseId); ?>')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
            
<!-- 
            <?php foreach($data as $list): ?>
                <tr class="text-c <?php if($list->close): ?> danger <?php endif; ?>" ondblclick="actionEdit('编辑','<?php echo e(url('cms/warehouse/'.$list->warehouseId.'/edit')); ?>','1');" >
                    <td class="tc"><input type="checkbox" name="id[]" value="<?php echo e($list->warehouseId); ?>"></td>
                    <td class="tc <?php if($list->close): ?> danger <?php endif; ?>"><?php echo e($list->name); ?></td>
                    <td <?php if($list->close): ?>  class="danger " <?php endif; ?> ><?php echo e($list->area); ?></td>
                    <td <?php if($list->close): ?>  class="danger " <?php endif; ?> ><?php echo e($list->number); ?></td>
                    <td <?php if($list->close): ?>  class="danger " <?php endif; ?> ><?php echo e($list->distrbutionArea); ?></td>
                    <td <?php if($list->close): ?>  class="danger " <?php endif; ?> ><?php echo e($list->quota); ?></td>
                    <td>
                        <?php if($list->close): ?>
                        <a title="启用" href="javascript:;" onclick="actionDelete('<?php echo e($list->warehouseId); ?>',0)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
                        <?php else: ?>
                        <a title="停用" href="javascript:;" onclick="actionDelete('<?php echo e($list->warehouseId); ?>',1)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>
                        <?php endif; ?>

                        <a style="text-decoration:none" data-title="向该库房添加公司产品" title="向该库房添加公司产品" _href="<?php echo e(url('cms/warehouseProduct/create/'.$list->warehouseId)); ?>" onclick="Hui_admin_tab(this)" href="javascript:;">
                            <i class="Hui-iconfont">&#xe600;</i>
                        </a>
                        <a title="编辑" href="javascript:;" onclick="actionEdit('角色编辑','<?php echo e(url('cms/warehouse/'.$list->warehouseId.'/edit')); ?>','1')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
                        
                    </td>
                </tr>

            <?php endforeach; ?> -->


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
      area: ['800px', '530px'],
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

                $.post("<?php echo e(url('cms/warehouse/')); ?>/"+id,{'_method':'delete','_token':"<?php echo e(csrf_token()); ?>",'status':status},function(data){
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
<?php echo $__env->make("cms.layouts.admin", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>