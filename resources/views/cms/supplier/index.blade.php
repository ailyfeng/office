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

    <!-- 查找 -->
    <form method="get" action="#">
            <span class="l radius ">
              <select class="input-text radius" size="1" name="type" id="type">
                @foreach($field as $k=>$v)
                    <option value="{{$k}}" @if($k==$type) selected="selected" @endif> >{{$v}}</option>
                @endforeach
              </select>
            </span>
        <input placeholder="请输入关键词" class="input-text ac_input " name="keyword" value="" id="autocomplete" autocomplete="off" style="width:300px" type="text">

    @if($selectSupplier)
        <!-- 选择供应商 -->
        <input type="hidden" value="{{$selectSupplier}}" name="selectSupplier">
        <input type="hidden" value="{{$name}}" name="name">
        <input type="hidden" value="{{$id}}" name="id">
    @else
    @endif    

        <button type="submit" class="btn btn-default" id="search_button">搜索</button>
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
                        <th>是否签协</th>
                        <th>合同到期日</th>
                        <th>操作</th>
            </tr>
        </thead>
        <tbody>

            
            @foreach($data as $list)

            @if($selectSupplier)
            <tr class="text-c" ondblclick="actionSelectSupplier('{{$list->supplierId}}','{{$list->fullName}}');">
            @else
            <tr class="text-c @if($list->close) c-warning @endif" ondblclick="actionEdit('编辑','{{url('cms/supplier/'.$list->supplierId.'/edit')}}','1');" >
            @endif
                @if($selectSupplier)@else
                <td class="tc"><input type="checkbox" name="id[]" value="{{$list->supplierId}}" selected=""></td>
                @endif
                <td>
                    <a href="#" title="{{$list->abbreviation}}">{{$list->fullName}}{{$list->supplierId}}</a>
                </td>
                <td  @if($list->close && !$selectSupplier) class=" c-warning " @endif>{{$list->brand}}</td>
                <td @if($list->close && !$selectSupplier) class=" c-warning " @endif>{{$list->brandType}}</td>
                <td @if($list->close && !$selectSupplier) class=" c-warning " @endif>{{$list->credit}}</td>
                <td @if($list->close && !$selectSupplier) class=" c-warning " @endif>
                    @foreach($isBoolean as $k=>$v)
                        @if($list->signIs==$k)
                            {{$v}}
                        @break
                        @endif
                    @endforeach
                 </td>
                <td @if($list->close && !$selectSupplier) class=" c-warning " @endif><?php echo date('Y-m-d',$list->contractDate);?></td>
                <td @if($list->close && !$selectSupplier) class=" c-warning " @endif>
                    @if($selectSupplier)
                    <a title="选择" href="javascript:;" onclick="actionSelectSupplier('{{$list->supplierId}}','{{$list->fullName}}');" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
                   @else
                    @if($list->close)
                    <a title="启用" href="javascript:;" onclick="actionDelete('{{$list->supplierId}}',0)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
                    @else
                    <a title="停用" href="javascript:;" onclick="actionDelete('{{$list->supplierId}}',1)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>
                    @endif

                    <a style="text-decoration:none" data-title="添加供应商联系人" title="添加供应商联系人" _href="{{url('cms/supplierContract/create/'.$list->supplierId)}}" onclick="Hui_admin_tab(this)" href="javascript:;">
                        <i class="Hui-iconfont">&#xe600;</i>
                    </a>
                    <a title="编辑" href="javascript:;" onclick="actionEdit('角色编辑','{{url('cms/supplier/'.$list->supplierId.'/edit')}}','{{$list->supplierId}}')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
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
$(function(){
    var url = '{{url("cms/supplier/keyword")}}';
    // var searchURL = "/cases/search.action";
    var isClicked = false;
    var defauntkeyword = "请输入关键词";
    $("#autocomplete").autocomplete(url, {
        scroll:false,
        selectFirst:false,
        // delay:5,
        dataType:"json",//ajax的跨域，必须用jsonp,jQuery自动会加一个callback参数,后台要获得callback参数，并写回来
        //     //自定义提示
        // tips:function(data) {
        //         //这里的data是跟formatItem 的data是一样的，所以格式也一样
        //     return data.pinyin;
        // },
        parse: function(data) {
            if(data==null||typeof(data)=="undefined"||data.length==0){
                return null;
            }

            // data = data.keylist;
            var rows = [];
            for(var i=0; i<data.length; i++){
                rows[rows.length] = {
                    data:data[i],//这里data是对象数组，格式[{key:aa,address:nn},{key:aa,address:nn}]
                    value:data[i].fullName,
                    result:data[i].fullName
                };
            }
            return rows;
        },
        // extraParams: {query:function (){return $('#autocomplete').val();}},
        extraParams: {query:function (){
                var keyword = trim($("#autocomplete").val());
                var type  = trim($("#type").val());
                return {"keyword":keyword,"type":type,"_token":"{{csrf_token()}}"};
            }
        },

        formatItem: function(data, i, total) {  //就是下拉框显示的内容，可以有格式之类的
            return "<p>"+data.fullName+"</p>";
        },
        formatMatch: function(data, i, total) {  //要匹配的内容
            return data.fullName;
        },
        formatResult: function(data) {  //最终在inputText里显示的内容，就是以后要搜索的内容
            return data.fullName;
        }
    }).result(function(e, data) {
        if(!isClicked) {
            startSearch();
        }
    });

    $("#autocomplete").keydown(function(e) {
        if(e.keyCode==13){
            e.preventDefault();
            if(!isClicked) {
                startSearch();
            }
        }
    });

    function startSearch() {
        var keys = trim($("#autocomplete").val());
        keys = trim(keys);
        if(keys==defauntkeyword||keys==''){
            // window.location.href='/pic/lists-10-w11/';
        }else{
            // window.location.href="/pic/lists-10-w11-k"+encodeURIComponent(keys)+"/";
        }
    }
    function trim(m){
        while((m.length>0)&&(m.charAt(0)==' ')){
            m = m.substring(1, m.length);
        }
        while((m.length>0)&&(m.charAt(m.length-1)==' ')){
            m = m.substring(0, m.length-1);
        }
        return m;
    }
});

@if($selectSupplier)
var index = parent.layer.getFrameIndex(window.name); //获取窗口索引

//给父类传值
function actionSelectSupplier(id,name){

    parent.$('.{{$id}}').val(id);

    parent.$('#{{$name}}').val(name);

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
      area: ['800px', '600px'],
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

                $.post("{{url('cms/supplier/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}",'status':status},function(data){
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