@extends("cms.layouts.admin")
@section("content")

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 公司产品 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray">
        <span class="l">
            <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
                <i class="Hui-iconfont">&#xe6e2;</i> 批量删除
            </a>
            <a class="btn btn-primary radius" data-title="添加产品" _href="{{url('cms/product/create')}}" onclick="Hui_admin_tab(this)" href="javascript:;">
                <i class="Hui-iconfont">&#xe600;</i> 添加产品
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
            <tr class="text-c">
                <td><input type="checkbox" value="{{$list->productId}}" checked="checked" name="productId"></td>
                <td class="tc">{{$list->productId}}{{$list->chineseBrand}}</td>
                <td>
                    <a href="#">{{$list->brandName}}</a>
                </td>
                <td>{{$list->number}}</td>
                <td>{{$list->color}}a</td>
                <td>asdf</td>
                <td class="f-14">
                    <a title="编辑" href="javascript:;" onclick="actionEdit('角色编辑','{{url('cms/product/create')}}','1')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
                    <a title="删除" href="javascript:;" onclick="actionDelete(this,'{{$list->productId}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
                <div class="page_list">
                    {{$data->links()}}
                </div>
</div>
<script type="text/javascript">

laypage({
  cont: 'page11',
  pages: 18, //可以叫服务端把总页数放在某一个隐藏域，再获取。假设我们获取到的是18
  curr: function(){ //通过url获取当前页，也可以同上（pages）方式获取
    var page = location.search.match(/page=(\d+)/);
    return page ? page[1] : 1;
  }(), 
  jump: function(e, first){ //触发分页后的回调
    if(!first){ //一定要加此判断，否则初始时会无限刷新
      location.href = '?page='+e.curr;
    }
  }
});

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
/*删除*/
function actionDelete(obj,id){
    alert(typeof(id));
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

                $.post("{{url('cms/product/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
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