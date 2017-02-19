@extends("cms.layouts.admin")
@section("content")

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 库房管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

    <!-- 查找 -->
    <form method="get" action="#">
        <div class="box-shadow">
            <a class="btn btn-default" src="">产品筛选：</a>

            @foreach($whereField as $f=>$lista)

                @if($f=='sort')
                <a class="btn btn-disabled" src="">类别</a>
                <span class="select-box radius" style="width:120px" >
                  <select class="select" size="1" name="sort">
                        <option value="" >无</option>
                   @foreach($type as $list)
                        <option value="{{$list->sort}}" @if($lista['value']==$list->sort) selected="selected"  @endif ><?php $sunNum = substr_count($list['sort'],'-'); for($i=0;$i<$sunNum;$i++){echo "&nbsp;&nbsp;&nbsp;";} ?>{{$list['name']}}</option>
                    @endforeach
                  </select>
                </span>
                @else

                <a class="btn btn-disabled" src="">{{$lista['name']}}</a>
                <input class="input-text ac_input radius" name="{{$lista['field']}}"  style="width:100px"  type="text" value="{{$lista['value']}}">
                @endif
            @endforeach

           {{csrf_field()}}
            <!-- 选择供应商 -->
            <input type="hidden" value="" name="field" id="field">
            <button type="submit" class="btn btn-primary radius" >搜索</button>
            <a class="btn btn-primary radius" href="{{url('cms/warehouse')}}">清空所有筛选</a> 
        </div>

        <div class="box-shadow">
            <a class="btn btn-default" src="">产品排序：</a>

            @foreach($whereField as $f=>$lista)
                <a class="btn btn-primary size-MINI radius" href="{{url('cms/warehouse'.$lista['sortUrl'].'&page='.$data->currentPage())}}">{{$lista['name']}}</a>
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
    <div class="cl pd-5 bg-1 bk-gray">
        <span class="l">
            <a href="javascript:;" onclick="actionStatus(1)" class="btn btn-danger radius">
                <i class="Hui-iconfont">&#xe6e2;</i> 批量停用
            </a>

            <a href="javascript:;" onclick="actionStatus(0)" class="btn btn-primary radius">
                <i class="Hui-iconfont">&#xe6e2;</i> 批量启用
            </a>
            <a class="btn btn-primary radius" data-title="添加库房" _href="{{url('cms/warehouse/create')}}" onclick="Hui_admin_tab(this)" href="javascript:;">
                <i class="Hui-iconfont">&#xe600;</i> 添加库房
            </a>
            </span> <span class="r">共有数据：<strong>{{$data->total()}}</strong> 条</span>
    </div>
    <table class="table table-border table-striped table-bordered table-hover table-bg">
        <thead>
            <tr class="text-c">

                        @if($selectSupplier)
                        @else
                        <th class="tc" width="5%"><input type="checkbox" name=""></th>
                        @endif
            @foreach($whereField as $f=>$lista)
                        <th class="tc">{{$lista['name']}}</th>
            @endforeach
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


            
            @foreach($data as $list)

            @if($selectSupplier)
                <tr class="text-c" ondblclick="actionSelectSupplier('{{$list->warehouseId}}','{{$list->name}}');">
            @else
                <tr class="text-c @if($list->close) danger @endif" ondblclick="actionEdit('编辑','{{url('cms/warehouse/'.$list->warehouseId.'/edit')}}','1');" >
            @endif

            @if($selectSupplier)@else
                <td class="tc"><input type="checkbox" name="id[]" value="{{$list->warehouseId}}" selected=""></td>
            @endif

            @foreach($whereField as $f=>$lista)
                <td  @if($list->close && !$selectSupplier) class=" danger " @endif>{{$list->$lista['field']}}</td>
            @endforeach

                 <td @if($list->close && !$selectSupplier) class=" danger " @endif>
                    @if($selectSupplier)
                    <a title="选择" href="javascript:;" onclick="actionSelectSupplier('{{$list->warehouseId}}','{{$list->name}}');" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
                   @else
                    @if($list->close)
                    <a title="启用" href="javascript:;" onclick="actionDelete('{{$list->warehouseId}}',0)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
                    @else
                    <a title="停用" href="javascript:;" onclick="actionDelete('{{$list->warehouseId}}',1)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>
                    @endif

                    <a style="text-decoration:none" data-title="添加供应商联系人" title="添加供应商联系人" _href="{{url('cms/supplierContract/create/'.$list->warehouseId)}}" onclick="Hui_admin_tab(this)" href="javascript:;">
                        <i class="Hui-iconfont">&#xe600;</i>
                    </a>
                    <a title="编辑" href="javascript:;" onclick="actionEdit('角色编辑','{{url('cms/warehouse/'.$list->warehouseId.'/edit')}}','{{$list->warehouseId}}')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
                    @endif
                </td>
            </tr>
            @endforeach
            
<!-- 
            @foreach($data as $list)
                <tr class="text-c @if($list->close) danger @endif" ondblclick="actionEdit('编辑','{{url('cms/warehouse/'.$list->warehouseId.'/edit')}}','1');" >
                    <td class="tc"><input type="checkbox" name="id[]" value="{{$list->warehouseId}}"></td>
                    <td class="tc @if($list->close) danger @endif">{{$list->name}}</td>
                    <td @if($list->close)  class="danger " @endif >{{$list->area}}</td>
                    <td @if($list->close)  class="danger " @endif >{{$list->number}}</td>
                    <td @if($list->close)  class="danger " @endif >{{$list->distrbutionArea}}</td>
                    <td @if($list->close)  class="danger " @endif >{{$list->quota}}</td>
                    <td>
                        @if($list->close)
                        <a title="启用" href="javascript:;" onclick="actionDelete('{{$list->warehouseId}}',0)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
                        @else
                        <a title="停用" href="javascript:;" onclick="actionDelete('{{$list->warehouseId}}',1)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>
                        @endif

                        <a style="text-decoration:none" data-title="向该库房添加公司产品" title="向该库房添加公司产品" _href="{{url('cms/warehouseProduct/create/'.$list->warehouseId)}}" onclick="Hui_admin_tab(this)" href="javascript:;">
                            <i class="Hui-iconfont">&#xe600;</i>
                        </a>
                        <a title="编辑" href="javascript:;" onclick="actionEdit('角色编辑','{{url('cms/warehouse/'.$list->warehouseId.'/edit')}}','1')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
                        
                    </td>
                </tr>

            @endforeach -->


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

                $.post("{{url('cms/warehouse/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}",'status':status},function(data){
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