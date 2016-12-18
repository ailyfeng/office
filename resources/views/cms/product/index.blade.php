@extends("cms.layouts.admin")
@section("content")

<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i>
    <a href="{{url('cms/index/info')}}" >首页</a> 
    <span class="c-gray en">&gt;</span> 
    公司产品管理 
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray">
        <span class="l">
            <a href="javascript:;" onclick="actionStatus(1)" class="btn btn-danger radius">
                <i class="Hui-iconfont">&#xe6e2;</i> 批量停用
            </a>

            <a href="javascript:;" onclick="actionStatus(0)" class="btn btn-primary radius">
                <i class="Hui-iconfont">&#xe6e2;</i> 批量启用
            </a>
            <a class="btn btn-primary radius" data-title="添加公司产品" _href="{{url('cms/product/create')}}" onclick="Hui_admin_tab(this)" href="javascript:;">
                <i class="Hui-iconfont">&#xe600;</i> 添加公司产品 
            </a>
            </span> <span class="r">共有数据：<strong>54</strong> 条</span>
    </div>
    <table class="table table-border table-striped table-bordered table-hover table-bg">
        <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" value="" name=""></th>
                <th >品牌</th>
                <th >品名</th>
                <th>货号</th>
                <th >颜色</th>
                <th >更新时间</th>
                <th >操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $list)
            <tr class="text-c" data-title="产品编辑{{$list->chineseBrand}}" _href="{{url('cms/product/'.$list->productId.'/edit')}}" ondblclick="Hui_admin_tab(this)" >
                <td><input type="checkbox" value="{{$list->productId}}" selected="" name="productId"></td>
                <td class="tc @if($list->close) c-warning @endif">{{$list->productId}}{{$list->chineseBrand}}</td>
                <td @if($list->close) class=" c-warning " @endif>
                    <a href="#">{{$list->brandName}}</a>
                </td>
                <td @if($list->close) class=" c-warning " @endif>{{$list->number}}</td>
                <td @if($list->close) class=" c-warning " @endif>{{$list->color}}a</td>
                <td @if($list->close) class=" c-warning " @endif>asdf</td>
                <td class="f-14 @if($list->close) c-warning @endif">
                    <a title="产品编辑" href="javascript:;" data-title="产品编辑{{$list->chineseBrand}}" _href="{{url('cms/product/'.$list->productId.'/edit')}}" ondblclick="Hui_admin_tab(this)" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 

                    @if($list->close)
                    <a title="启用" href="javascript:;" onclick="actionDelete('{{$list->productId}}',0)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
                    @else
                    <a title="停用" href="javascript:;" onclick="actionDelete('{{$list->productId}}',1)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>
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
      area: ['700px', '530px'],
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

                $.post("{{url('cms/product/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}",'status':status},function(data){
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