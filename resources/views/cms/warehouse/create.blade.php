@extends("officecms.layout.cms")
@section("content")

    <script src="{{asset('resources/OfficeCMS/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('resources/OfficeCMS/uploadify/uploadify.css')}}">

    <style>
        .uploadify{display:inline-block;}
        .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
        table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
    </style>

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="{{url('cms/warehouse')}}">库房管理</a> &raquo; 添加库房
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="javascript:void();" onclick="location.reload();"><i class="fa fa-refresh"></i>更新网页</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('cms/warehouse')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>商户名称：</th>
                        <td>
                            <input type="text" class="lg" name="name">

                            @if($errors->has('name'))
                                <i class="require"> {{$errors->first('name')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>库房地址：</th>
                        <td>
                            <input type="text" class="lg" name="address">
                            @if($errors->has('address'))
                                <i class="require"> {{$errors->first('address')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>库房面积：</th>
                        <td>
                            <input type="text" class="sm" name="area" placeholder="0000.00">平方米
                            @if($errors->has('area'))
                                <i class="require"> {{$errors->first('area')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>员工人数：</th>
                        <td>
                            <input type="text" class="sm" name="number" placeholder="1">人
                            @if($errors->has('number'))
                                <i class="require"> {{$errors->first('number')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>配送区域：</th>
                        <td>
                            <input type="text" class="lg" name="distrbutionArea">
                            @if($errors->has('distrbutionArea'))
                                <i class="require"> {{$errors->first('distrbutionArea')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>配送工具情况：</th>
                        <td>
                            <input type="text" class="md" name="distrbutionTools">
                            @if($errors->has('distrbutionTools'))
                                <i class="require"> {{$errors->first('distrbutionTools')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>储值额度：</th>
                        <td>
                            <input type="text" class="sm" name="quota" placeholder="0000.00">
                            @if($errors->has('quota'))
                                <i class="require"> {{$errors->first('quota')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>授信额度：</th>
                        <td>
                            <input type="text" name="credit" class="sm" placeholder="0000.00">
                            @if($errors->has('credit'))
                                <i class="require"> {{$errors->first('credit')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>加盟日期：</th>
                        <td>
                            <input type="text" name="joinDate" id="joinDate" class="laydate-icon" placeholder="0000-00-00">
                            @if($errors->has('joinDate'))
                                <i class="require"> {{$errors->first('joinDate')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>合同到期日：</th>
                        <td>
                            <input type="text" name="contractDate" id="contractDate" class="laydate-icon" placeholder="0000-00-00">
                            @if($errors->has('contractDate'))
                                <i class="require"> {{$errors->first('contractDate')}}</i>
                            @else
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

<script>
laydate({
  elem: '#contractDate', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
  event: 'focus' //响应事件。如果没有传入event，则按照默认的click
});
laydate({
  elem: '#joinDate', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
  event: 'focus' //响应事件。如果没有传入event，则按照默认的click
});
</script>

@endsection