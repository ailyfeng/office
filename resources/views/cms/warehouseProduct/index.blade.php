@extends('cms.layouts.admin')
@section("content")


<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 
    <a  href="{{url('cms/index/info')}}">首页 </a>
    <span class="c-gray en">&gt;</span> 
        库房产品管理
    <span class="c-gray en"></span> 
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

    <!-- 查找 -->
    <form method="get" action="#">
        <div class="box-shadow">
            <a class="btn btn-default" src="">产品筛选：</a>

        @foreach($whereField as $table=>$tableField)
            @foreach($tableField as $field=>$fieldValue)
            @if($fieldValue)
                <?php if($table.$field =='warehouse_producttype'){?>
                        <a class="btn btn-disabled" src="">{{$fieldValue['name']}}</a>
                    <span class="select-box radius" style="width:120px" >
                      <select class="select" size="1" name="{{$table}}[{{$field}}]">
                      <option value="0" >无</option>
                       @foreach($Warehouse_product_type as $key=>$value)
                            <option value="{{$key}}"  @if($key==$fieldValue['value']) selected="selected"  @endif >{{$value}}</option>
                        @endforeach
                      </select>
                    </span>
                <?php }elseif($table.$field =='producttype'){?>

                        <a class="btn btn-disabled" src="">{{$fieldValue['name']}}</a>
                    <span class="select-box radius" style="width:120px" >
                      <select class="select" size="1" name="{{$table}}[{{$field}}]">
                      <option value="0" >无</option>
                      @if($product_type)
                           @foreach($product_type as $key=>$value)
                                <option value="{{$key}}"  @if($key==$fieldValue['value']) selected="selected"  @endif >{{$value}}</option>
                            @endforeach
                       @endif
                      </select>
                    </span>
                <?php }else{?>
                    <a class="btn btn-disabled" src="">{{$fieldValue['name']}}</a>
                    <input class="input-text ac_input radius" name="{{$table}}[{{$field}}]"  style="width:100px"  type="text" value="{{$fieldValue['value']}}">
                <?php }?>
            @endif
            @endforeach
        @endforeach

    @if($selectSupplier)
        <!-- 选择供应商 -->
        <input type="hidden" value="{{$selectSupplier}}" name="selectSupplier">
        <input type="hidden" value="{{$sonName}}" name="sonName">
        <input type="hidden" value="{{$sonId}}" name="sonId">
    @else
    @endif    

            <button type="submit" class="btn btn-primary radius" >搜索</button>
            <a class="btn btn-primary radius" href="{{url('cms/warehouseProduct')}}">清空所有筛选</a> 
        </div>

        <div class="box-shadow">
            <a class="btn btn-default" src="">产品排序：</a>

            @foreach($whereField as $table=>$tableField)
                @foreach($tableField as $field=>$fieldValue)
                        @if($fieldValue)
                            <a class="btn btn-primary size-MINI radius" href="{{url('cms/warehouseProduct'.$fieldValue['sortUrl'].'&page='.$data->currentPage())}}">{{$fieldValue['name']}}</a>
                        @endif
                @endforeach
            @endforeach

            @foreach($orderbyCurr as $list)
            <span class="btn btn-primary active size-MINI radius">

                        <a href="{{$list['sortOne']}}" class="Hui-iconfont" style="color:#fff">
                            {{$list['name']}}
                            @if($list['value']==1)
                                    <i class="Hui-iconfont">&#xe6d6;</i>
                            @else
                                <i class="Hui-iconfont">&#xe6d5;</i>
                            @endif
                        </a>
                        <span class="pipe">|</span>
                        <a href="{{$list['sortX']}}" class="Hui-iconfont" style="color:#fff">
                            <i class="Hui-iconfont">&#xe6a6;</i>
                        </a>
            </span>
            @endforeach
        </div>
    </form>

    @if($selectSupplier)
        <!-- 选择供应商 -->
    @else
    <div class="cl pd-5 bg-1 bk-gray">
        <span class="l">
            <a href="javascript:;" onclick="actionStatus(1)" class="btn btn-danger radius">
                <i class="Hui-iconfont">&#xe631;</i> 批量停用
            </a>

            <a href="javascript:;" onclick="actionStatus(0)" class="btn btn-primary radius">
                <i class="Hui-iconfont">&#xe615;</i> 批量启用
            </a>
            <a class="btn btn-primary radius" data-title="添加库房产品" _href="{{url('cms/warehouseProduct/create')}}" onclick="Hui_admin_tab(this)" href="javascript:;">
                <i class="Hui-iconfont">&#xe600;</i> 创建库房产品
            </a>
            </span> <span class="r">共有数据：<strong>{{$data->total()}}</strong> 条</span>
    </div>

    @endif
    <table class="table table-border table-striped table-bordered table-hover table-bg">
        <thead>
            <tr class="text-c">

                        @if($selectSupplier)@else
                        <th class="tc" width="5%"><input type="checkbox" name=""></th>
                        @endif

            @foreach($whereField as $table=>$tableField)
                @foreach($tableField as $field=>$fieldValue)
                        @if($fieldValue)
                        <th class="tc">{{$fieldValue['name']}}</th>
                        @endif
                @endforeach
            @endforeach
                        <th>操作</th>
            </tr>
        </thead>
        <tbody>

            
            @foreach($data as $list)

                @if($selectSupplier)
                    <tr class="text-c" ondblclick="actionSelectSupplier('{{$list->warehouse_product_id}}','{{$list->fullName}}');">
                @else
                    <tr class="text-c @if($list->warehouse_product_close) danger @endif" ondblclick="actionEdit('编辑','{{url('cms/warehouseProduct')}}/{{$list->warehouse_product_id}}/edit','1');" >
                @endif

                @if($selectSupplier)@else
                    <td class="tc"><input type="checkbox" name="id[]" value="{{$list->warehouse_product_id}}" selected=""></td>
                @endif

                @foreach($whereField as $table=>$tableField)
                    @foreach($tableField as $field=>$fieldValue)
                        @if($fieldValue)
                            <td  @if($list->warehouse_product_close && !$selectSupplier) class=" danger " @endif><?php $tmpField=$table.'_'.$field;echo $list->$tmpField;?></td>
                        @endif
                    @endforeach
                @endforeach

                     <td @if($list->warehouse_product_close && !$selectSupplier) class=" danger " @endif>
                        @if($selectSupplier)
                        <a title="选择" href="javascript:;" onclick="actionSelectSupplier('{{$list->warehouse_product_id}}','{{$list->fullName}}');" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
                       @else
                        @if($list->warehouse_product_close)
                        <a title="启用" href="javascript:;" onclick="actionDelete('{{$list->warehouse_product_id}}',0)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
                        @else
                        <a title="停用" href="javascript:;" onclick="actionDelete('{{$list->warehouse_product_id}}',1)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>
                        @endif
                                <!-- data-title="添加供应商" _href="{{url('cms/warehouseProduct/create')}}" onclick="Hui_admin_tab(this)" href="javascript:;" -->
                        <!-- <a title="编辑" href="javascript:;" data-title="添加供应商" onclick="Hui_admin_tab(this)"  _href="{{url('cms/warehouseProduct')}}/{{$list->warehouse_product_id}}/edit"  style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>  -->
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> 

        <div class="page_list f-r">
            {{$data->links()}}
        </div>

</div>
<script type="text/javascript">

@if($selectSupplier)
var index = parent.layer.getFrameIndex(window.name); //获取窗口索引

//给父类传值
function actionSelectSupplier(id,name){

    parent.$('.{{$sonId}}').val(id);

    parent.$('#{{$sonName}}').val(name);

    parent.layer.close(index);

}
@endif


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

                $.post("{{url('cms/warehouseProduct/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}",'status':status},function(data){
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

@endsection