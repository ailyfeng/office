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
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">库房设置</a> &raquo; 添加库房设置
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
        <form action="{{url('cms/warehouse_storage')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>产品ID：</th>
                        <td>
                            <input type="text" class="sm" name="name">

                            @if($errors->has('fullName'))
                                <i class="require"> {{$errors->first('fullName')}}</i>
                            @else
                                <span>产品的唯一标识</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>库房ID：</th>
                        <td>
                            <input type="text" class="sm" name="abbreviation">
                            @if($errors->has('abbreviation'))
                                <i class="require"> {{$errors->first('abbreviation')}}</i>
                            @else
                                <span>库房的唯一标识</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>库存类别：</th>
                        <td>
                            <label><input name="deliveryIs" type="radio" value="0" checked="checked" />是</label> 
                            <label><input name="deliveryIs" type="radio" value="" />否</label> 
                            @if($errors->has('abbreviation'))
                                <i class="require"> {{$errors->first('abbreviation')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require">*</i>货位：</th>
                        <td>
                            <input type="text" class="lg" name="brand">
                            @if($errors->has('brand'))
                                <i class="require"> {{$errors->first('brand')}}</i>
                            @else
                                <span>货品的存放位置</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>最低库存量：</th>
                        <td>
                            <input type="text" class="sm" name="brandType" placeholder="1">
                            @if($errors->has('brandType'))
                                <i class="require"> {{$errors->first('brandType')}}</i>
                            @else
                                <span>即报警库存量</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>最高库存量：</th>
                        <td>
                            <input type="text" class="sm" name="brandType" placeholder="1">
                            @if($errors->has('brandType'))
                                <i class="require"> {{$errors->first('brandType')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>盘点周期：</th>
                        <td>
                            <input type="text" class="lg" name="officeAdd">
                            @if($errors->has('officeAdd'))
                                <i class="require"> {{$errors->first('officeAdd')}}</i>
                            @else
                                <span></span>
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

@endsection