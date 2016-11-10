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
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="{{url('cms/supplier')}}">供应商管理</a> &raquo; 添加供应商
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
        <form action="{{url('cms/supplier')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>供应商全称：</th>
                        <td>
                            <input type="text" class="lg" name="fullName">

                            @if($errors->has('fullName'))
                                <i class="require"> {{$errors->first('fullName')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>供应商简称</th>
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
                        <th><i class="require">*</i>供应商类型：</th>
                        <td>
                            @foreach($type as $k=>$v)
                                <label><input name="type[]" type="checkbox" value="{{$k}}" @if($k==0)checked="checked" @endif />{{$v}}</label>
                            @endforeach
                            @if($errors->has('type'))
                                <i class="require"> {{$errors->first('type')}}</i>
                            @else
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require">*</i>供应品牌</th>
                        <td>
                            <input type="text" class="lg" name="brand">
                            @if($errors->has('brand'))
                                <i class="require"> {{$errors->first('brand')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>供应品类</th>
                        <td>
                            <input type="text" class="lg" name="brandType">
                            @if($errors->has('brandType'))
                                <i class="require"> {{$errors->first('brandType')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>办公地址</th>
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
                        <th><i class="require">*</i>库房地址：</th>
                        <td>
                            <input type="text" class="lg" name="warehoustAdd">
                            @if($errors->has('warehoustAdd'))
                                <i class="require"> {{$errors->first('warehoustAdd')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>采购区域：</th>
                        <td>
                            <input type="text" class="lg" name="area">
                            @if($errors->has('area'))
                                <i class="require"> {{$errors->first('area')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>结算方式：</th>
                        <td>
                            <input type="text" name="settlementMmethod" class="md" >
                            @if($errors->has('settlementMmethod'))
                                <i class="require"> {{$errors->first('settlementMmethod')}}</i>
                            @else
                                <span>月结、现款、可临时佘帐</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>收款方式：</th>
                        <td>
                            <input type="text" name="paymentMethod" class="md" >
                            @if($errors->has('paymentMethod'))
                                <i class="require"> {{$errors->first('paymentMethod')}}</i>
                            @else
                                <span>公帐、卡、现金</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>结算价格（含税）：</th>
                        <td>
                            <input type="text" class="md" name="priceTax" placeholder="0000.00">元
                            @if($errors->has('priceTax'))
                                <i class="require"> {{$errors->first('priceTax')}}</i>
                            @else
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>结算价格（不含税）：</th>
                        <td>
                            <input type="text" class="md" name="priceNoTax" placeholder="0000.00">元
                            @if($errors->has('priceNoTax'))
                                <i class="require"> {{$errors->first('priceNoTax')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>帐户信息：</th>
                        <td>
                            <input type="text" name="account" class="md" >
                            @if($errors->has('account'))
                                <i class="require"> {{$errors->first('account')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>是否送货：</th>
                        <td>
                            @foreach($isBoolean as $k=>$v)
                            <label><input name="deliveryIs" type="radio" value="{{$k}}" @if($k==0)checked="checked" @endif  />{{$v}}</label>
                            @endforeach
                            @if($errors->has('deliveryIs'))
                                <i class="require"> {{$errors->first('deliveryIs')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>是否签协：</th>
                        <td>
                            @foreach($isBoolean as $k=>$v)
                                <label><input name="signIs" type="radio" value="{{$k}}" @if($k==0)checked="checked" @endif  />{{$v}}</label>
                            @endforeach
                            @if($errors->has('signIs'))
                                <i class="require"> {{$errors->first('signIs')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>退换货要求：</th>
                        <td>
                            <textarea class="mg" name="returnRequirements"></textarea>
                            @if($errors->has('returnRequirements'))
                                <i class="require"> {{$errors->first('returnRequirements')}}</i>
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
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>合同简报：</th>
                        <td>
                            <textarea class="mg" name="contractBriefing"></textarea>
                            @if($errors->has('contractBriefing'))
                                <i class="require"> {{$errors->first('contractBriefing')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require">*</i>授信额度：</th>
                        <td>
                            <input type="text" class="md" name="credit">
                            @if($errors->has('credit'))
                                <i class="require"> {{$errors->first('credit')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>备注：</th>
                        <td>
                            <textarea class="mg" name="note"></textarea>
                            @if($errors->has('note'))
                                <i class="require"> {{$errors->first('note')}}</i>
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

<script>
laydate({
  elem: '#contractDate', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
  event: 'focus' //响应事件。如果没有传入event，则按照默认的click
});
</script>

@endsection