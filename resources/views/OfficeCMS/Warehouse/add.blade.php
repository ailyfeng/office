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
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">库房管理</a> &raquo; 添加库房
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
                        <th><i class="require">*</i>商户名称：</th>
                        <td>
                            <input type="text" class="lg" name="name">

                            @if($errors->has('fullName'))
                                <i class="require"> {{$errors->first('fullName')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>库房地址：</th>
                        <td>
                            <input type="text" class="lg" name="abbreviation">
                            @if($errors->has('abbreviation'))
                                <i class="require"> {{$errors->first('abbreviation')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>库房面积：</th>
                        <td>
                            <input type="text" class="sm" name="brand">平方米
                            @if($errors->has('brand'))
                                <i class="require"> {{$errors->first('brand')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>员工人数：</th>
                        <td>
                            <input type="text" class="sm" name="brandType" placeholder="1">人
                            @if($errors->has('brandType'))
                                <i class="require"> {{$errors->first('brandType')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>配送区域：</th>
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
                        <th><i class="require">*</i>配送工具情况：</th>
                        <td>
                            <input type="text" class="md" name="warehoustAdd">
                            @if($errors->has('warehoustAdd'))
                                <i class="require"> {{$errors->first('warehoustAdd')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>储值额度：</th>
                        <td>
                            <input type="text" class="md" name="area">
                            @if($errors->has('area'))
                                <i class="require"> {{$errors->first('area')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>授信额度：</th>
                        <td>
                            <input type="text" name="settlementMmethod" class="md" >
                            @if($errors->has('settlementMmethod'))
                                <i class="require"> {{$errors->first('settlementMmethod')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>加盟日期：</th>
                        <td>
                            <input type="text" name="paymentMethod" class="md" placeholder="2016-12-31">
                            @if($errors->has('paymentMethod'))
                                <i class="require"> {{$errors->first('paymentMethod')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>合同到期日：</th>
                        <td>
                            <input type="text" name="paymentMethod" class="md" placeholder="2016-12-31">
                            @if($errors->has('priceTax'))
                                <i class="require"> {{$errors->first('priceTax')}}</i>
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

@endsection