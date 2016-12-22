@extends("cms.layouts.admin")
@section("content")

<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i>
    <a href="{{url('cms/index/info')}}" >首页</a> 
    <span class="c-gray en">&gt;</span> 
    公司产品管理 
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

    <!-- 查找 -->
    <form method="get" action="#">
        <a class="btn btn-default" src="">产品筛选：</a>
        <a class="btn btn-disabled" src="">类别</a>
        <!-- <span class="btn select-box radius "> -->
        <span class="select-box radius" style="width:120px" >
          <select class="select" size="1" name="type">
            @foreach($type as $list)
                <option value="{{$list['id']}}" ><?php $sunNum = substr_count($list['sort'],'-'); for($i=0;$i<$sunNum;$i++){echo "&nbsp;&nbsp;&nbsp;";} ?>{{$list['name']}}</option>
            @endforeach
          </select>
        </span>

        <a class="btn btn-disabled" src="">品牌</a>
        <input class="input-text ac_input radius" name="keyword"  style="width:100px" value="" type="text">

        <a class="btn btn-disabled" src="">货号</a>
        <input class="input-text ac_input radius" name="keyword"  style="width:100px" value="" type="text">

        <a class="btn btn-disabled" src="">品名</a>
        <input class="input-text ac_input radius" name="keyword"  style="width:100px" value="" type="text">

        <a class="btn btn-disabled" src="">规格</a>
        <input class="input-text ac_input radius" name="keyword"  style="width:100px" value="" type="text">

        <a class="btn btn-disabled" src="">颜色</a>
        <input class="input-text ac_input radius" name="keyword"  style="width:100px" value="" type="text">
 

        <input placeholder="请输入关键词" class="input-text ac_input " name="keyword" value="{{$pageParam['keyword']}}" id="autocomplete" autocomplete="off" style="width:300px" type="text">
        {{csrf_field()}}
        <!-- 选择供应商 -->
        <input type="hidden" value="" name="field" id="field"> 
        <button type="submit" class="btn btn-default" id="search_button">搜索</button>
    </form>

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
                <th>产品中类</th>
                <th>产品小类</th>
                <th>品牌</th>
                <th>货号</th>
                <th>品名</th>
                <th>规格</th>
                <th>颜色</th>
                <th>单个</th>
                <th>标准价</th>
                <th>包规</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $list)
            <tr class="text-c" data-title="产品编辑{{$list->chineseBrand}}" _href="{{url('cms/product/'.$list->productId.'/edit')}}" ondblclick="Hui_admin_tab(this)" >
                <td><input type="checkbox" value="{{$list->productId}}" selected="" name="productId"></td>
                <td class="tc @if($list->close) c-warning @endif">{{$list->parentName}}</td>
                <td class="tc @if($list->close) c-warning @endif">{{$list->name}}</td>
                <td class="tc @if($list->close) c-warning @endif">{{$list->chineseBrand}}</td>
                <td @if($list->close) class=" c-warning " @endif>{{$list->number}}</td>
                <td @if($list->close) class=" c-warning " @endif>
                    <a href="#">{{$list->brandName}}</a>
                </td>
                <td @if($list->close) class=" c-warning " @endif>{{$list->standard}}a</td>
                <td @if($list->close) class=" c-warning " @endif>{{$list->color}}</td>
                <td @if($list->close) class=" c-warning " @endif>{{$list->unit}}</td>
                <td @if($list->close) class=" c-warning " @endif>{{$list->standardPrice}}</td>
                <td @if($list->close) class=" c-warning " @endif>{{$list->packageRules}}</td>
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
                    @if($data)
                    {{$data->links()}}
                    @endif
                </div>
</div>
<script type="text/javascript">

//搜索
$(function(){
    var url = '{{url("cms/product/keyword")}}';
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
                    value:data[i].name,
                    result:data[i].name
                };
            }
            return rows;
        },
        // extraParams: {query:function (){return $('#autocomplete').val();}},
        extraParams: {query:function (){
                var keyword = trim($("#autocomplete").val());
                return {"keyword" : keyword, "_token" : "{{csrf_token()}}"};
            }
        },

        formatItem: function(data, i, total) {  //就是下拉框显示的内容，可以有格式之类的
            return "<p>"+data.name+"</p>";
        },
        formatMatch: function(data, i, total) {  //要匹配的内容
            return data.name;
        },
        formatResult: function(data) {  //最终在inputText里显示的内容，就是以后要搜索的内容
            return data.name;
        }
    }).result(function(e, data) {
        if(!isClicked) {
            $("#field").val(data.field);
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

    /**
     * 搜索条件 
     */
    function searchCondition(){
        var keyword = $("#autocomplete").val();
        var field   = $("#field").val();
        var url = '{{url("cms/product")}}?keyword='+keyword+'&field='+field+'&_token={{csrf_token()}}';
        return url;
    }

    /**
     *  开始搜索
     */
    function startSearch() {
        var keys = trim($("#autocomplete").val());
        keys = trim(keys);
        if(keys==defauntkeyword||keys==''){
            window.location.href='{{url("cms/product")}}';
        }else{
            window.location.href=searchCondition();
        }
    }

    /**
     * 去空格
     */
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