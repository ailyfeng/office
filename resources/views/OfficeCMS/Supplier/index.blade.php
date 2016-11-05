@extends("officecms.layout.cms")
@section("content")

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a>  &raquo; 供应商管理
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="" method="post">
            <table class="search_tab">
                <tr>
                    <th width="120">库存类别:</th>
                    <td>
                        <select name="type">
                            <option value="">全部</option>
                            <option value="23">常备</option>
                            <option value="343">客户专备</option>
                        </select>
                    </td>

                    <th width="120">产品类别:</th>
                    <td>
                        <select name="type">
                            <option value="">全部</option>
                            <option value="lg">大类</option>
                            <option value="md">中类</option>
                            <option value="sm">小类</option>
                        </select>
                    </td>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('cms/supplier/create')}}"><i class="fa fa-plus"></i>新增供应商</a>
                    <a href="#" onclick="deleteAction(1)"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="javascript:void();" onclick="location.reload();"><i class="fa fa-refresh"></i>更新网页</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%"><input type="checkbox" name=""></th>
                        <th class="tc">供应商</th>
                        <th>品牌</th>
                        <th>供应品类</th>
                        <th>授信额度</th>
                        <th>是否签协</th>
                        <th>合同到期日</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $list)
                    <tr>
                        <td class="tc"><input type="checkbox" name="id[]" value="{{$list->supplierId}}"></td>
                        <td>
                            <a href="#" title="{{$list->fullName}}">{{$list->abbreviation}}{{$list->supplierId}}</a>
                        </td>
                        <td>{{$list->brand}}</td>
                        <td>{{$list->brandType}}</td>
                        <td>{{$list->credit}}</td>
                        <td>
                            @foreach($isBoolean as $k=>$v)
                                @if($list->signIs==$k)
                                    {{$v}}
                                @break
                                @endif
                            @endforeach
                         </td>
                        <td>{{$list->contractDate}}</td>
                        <td>
                            <a href="{{url('cms/supplier/'.$list->supplierId.'/edit')}}">修改</a>
                            <a href="javascript:void();" onclick="deleteAction({{$list->supplierId}})">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>

                <div class="page_list">
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

<script type="text/javascript">
    function deleteAction(id){
        layer.confirm("请确认是否要删除选择的项？", {
            btn: ["确认","取消"] //按钮
        }, function(){

            $.post("{{url('cms/supplier/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
                if(data.status){
                    layer.msg("删除成功", {icon: 1});
                    window.location.reload();
                }else{
                    layer.msg("删除失败。。", {icon: 5});
                }
            });

        });

    }
</script>
@endsection