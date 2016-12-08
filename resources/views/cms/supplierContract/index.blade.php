@extends('cms.layouts.admin')
@section("content")


<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 
    <a  href="{{url('cms/index/info')}}">首页 </a>
    <span class="c-gray en">&gt;</span> 
    @if($selectSupplier)
        选择供应商
    @else
        供应商管理
    @endif
    <span class="c-gray en"></span> 
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

    @if($selectSupplier)
    @else
    <div class="cl pd-5 bg-1 bk-gray">
        <span class="l">
            <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
                <i class="Hui-iconfont">&#xe6e2;</i> 批量删除
            </a>
            <a class="btn btn-primary radius" data-title="添加供应商" _href="{{url('cms/supplier/create')}}" onclick="Hui_admin_tab(this)" href="javascript:;">
                <i class="Hui-iconfont">&#xe600;</i> 添加供应商
            </a>
            </span> <span class="r">共有数据：<strong>54</strong> 条</span>
    </div>
    @endif
    <table class="table table-border table-striped table-bordered table-hover table-bg">
        <thead>
            <tr class="text-c">
                        @if($selectSupplier)@else
                        <th class="tc" width="5%"><input type="checkbox" name=""></th>
                        @endif
                        <th class="tc">供应商</th>
                        <th>品牌</th>
                        <th>供应品类</th>
                        <th>授信额度</th>
                        <th>联系人</th>
                        <th>是否签协</th>
                        <th>合同到期日</th>
                        <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $list)
            <tr class="text-c">

                @if($selectSupplier)@else
                <td class="tc"><input type="checkbox" name="id[]" value="{{$list->supplierId}}"></td>
                @endif
                <td>
                    <a href="#" title="{{$list->fullName}}">{{$list->abbreviation}}{{$list->supplierId}}</a>
                </td>
                <td>{{$list->brand}}</td>
                <td>{{$list->brandType}}</td>
                <td>{{$list->credit}}</td>
                <td>李先生|何女士</td>
                <td>
                    @foreach($isBoolean as $k=>$v)
                        @if($list->signIs==$k)
                            {{$v}}
                        @break
                        @endif
                    @endforeach
                 </td>
                <td><?php echo date('Y-m-d',$list->contractDate);?></td>
                <td>
                    @if($selectSupplier)
                    <a title="选择" href="javascript:;" onclick="actionSelectSupplier('{{$list->supplierId}}','{{$list->fullName}}');" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
                   @else
                    <a style="text-decoration:none" data-title="添加公司产品" title="添加公司产品" _href="{{url('cms/product/create/'.$list->supplierId)}}" onclick="Hui_admin_tab(this)" href="javascript:;">
                        <i class="Hui-iconfont">&#xe600;</i>
                    </a>
                    <a title="编辑" href="javascript:;" onclick="actionEdit('角色编辑','{{url('cms/supplier/'.$list->supplierId.'/edit')}}','{{$list->supplierId}}')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
                    <a title="删除" href="javascript:;" onclick="actionDelete(this,'{{$list->supplierId}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>    

    @if($selectSupplier)@else
        <div class="page_list f-r">
            {{$data->links()}}
        </div>
    @endif

</div>
<script type="text/javascript">
@if($selectSupplier)
var index = parent.layer.getFrameIndex(window.name); //获取窗口索引

//给父类传值
function actionSelectSupplier(id,name){

    parent.$('#{{$id}}').val(id);

    parent.$('#{{$name}}').val(name);

    parent.layer.close(index);

}
@endif

/*添加*/
function actionAdd(title,url,w,h){
    layer_show(title,url,w,h);
}
/*编辑*/
function actionEdit(title,url,id,w,h){
    //layer_show(title,url,w,h);

    layer.open({
      type: 2,
      area: ['800px', '600px'],
      fixed: false, //不固定
      maxmin: true,
      content: url
    });
}
/*删除*/
function actionDelete(obj,id){
        var tag = false;
            layer.confirm("请确认是否要删除选择的项？", {
              btn: ["确认","取消"] //按钮
            }, function(){
              
            //加载功能  
            layer.load();

            if(tag){
                return false;
            }else{
                tag = true;
            }

                $.post("{{url('cms/supplier/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
                    layer.closeAll('loading');
                    if(data.status){
                        layer.msg("删除成功", {icon: 1,time:1000});
                        // $(obj).parents("tr").remove();
                        
                        window.location.reload();
                    }else{
                        layer.msg("删除失败！请重新操作！", {icon: 5,time:1000});
                    }
                });

            });
    }



</script>

@endsection