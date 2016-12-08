@extends("cms.layouts.admin")
@section("content")

    <script src="{{asset('resources/OfficeCMS/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('resources/OfficeCMS/uploadify/uploadify.css')}}">

<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> <a href="{{url('cms/index/info')}}" >首页 </a><span class="c-gray en">&gt;</span> 
        <a href="javascript:;" data-title="库房管理" _href="{{url('cms/warehouse')}}" onclick="Hui_admin_tab(this)" href="javascript:;">
            库房管理
        </a>
        <span class="c-gray en">&gt;</span> 
        编辑库房：{{$data->name}} <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <article class="page-container">
        <form action="{{url('cms/warehouse/'.$data->warehouseId)}}" method="post" class="form form-horizontal" id="formSWarehouseAdd">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商户名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('name'))
                        <input type="text" class="input-text radius error " value="{{$data->name}}" name="name" aria-required="true" aria-invalid="true">
                        <label id="name-error" class="error" for="name">{{$errors->first('name')}}</label>
                    @else
                         <input type="text" class="input-text radius" value="{{$data->name}}" placeholder="5-100个字符" name="name" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>库房地址：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('address'))
                        <input type="text" class="input-text radius error" value="{{$data->address}}" name="address" aria-required="true" aria-invalid="true">
                        <label id="address-error" class="error" for="address">{{$errors->first('supplierIdExt')}}</label>
                    @else
                         <input type="text" class="input-text radius " value="{{$data->address}}" placeholder="5-100个字符"  name="address" >
                    @endif
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>库房面积：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('area'))
                        <input type="text" class="input-text radius error" value="{{$data->area}}" name="area" aria-required="true" aria-invalid="true">
                        <label id="area-error" class="error" for="area">{{$errors->first('area')}}</label>
                    @else
                         <input type="text" class="input-text radius " value="{{$data->area}}" placeholder="只允许填写数字，统一单位平方米"  name="area" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>员工人数：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('number'))
                        <input type="text" class="input-text radius error" value="{{$data->number}}" name="number" aria-required="true" aria-invalid="true">
                        <label id="number-error" class="error" for="number">{{$errors->first('number')}}</label>
                    @else
                         <input type="text" class="input-text radius " value="{{$data->number}}"  placeholder="只允许填写数字"  name="number" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>配送区域：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('distrbutionArea'))
                    <textarea class="textarea radius error" name="distrbutionArea" aria-required="true" aria-invalid="true">{{$data->distrbutionArea}}</textarea>
                        <label id="distrbutionArea-error" class="error" for="distrbutionArea">{{$errors->first('distrbutionArea')}}</label>
                    @else
                        <textarea class="textarea radius" name="distrbutionArea" placeholder="退配送区域要求描述" onKeyUp="textarealength(this,250)">{{$data->distrbutionArea}}</textarea>
                        <p class="textarea-numberbar"><em class="textarea-length">0</em>/250</p>
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>配送工具情况：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('distrbutionTools'))
                    <textarea class="textarea radius error" name="distrbutionTools" aria-required="true" aria-invalid="true">{{$data->distrbutionTools}}</textarea>
                        <label id="distrbutionTools-error" class="error" for="distrbutionTools">{{$errors->first('distrbutionTools')}}</label>
                    @else
                        <textarea class="textarea radius" name="distrbutionTools" placeholder="退配送区域要求描述" onKeyUp="textarealength(this,250)">{{$data->distrbutionTools}}</textarea>
                        <p class="textarea-numberbar"><em class="textarea-length">0</em>/250</p>
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>储值额度：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('quota'))
                        <input type="text" class="input-text radius error" value="{{$data->quota}}" name="quota" aria-required="true" aria-invalid="true">
                        <label id="quota-error" class="error" for="quota">{{$errors->first('quota')}}</label>
                    @else
                         <input type="text" class="input-text radius " value="{{$data->quota}}" placeholder="0000" name="quota" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>授信额度：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('credit'))
                        <input type="text" class="input-text radius error" value="{{$data->credit}}" name="credit" aria-required="true" aria-invalid="true">
                        <label id="credit-error" class="error" for="credit">{{$errors->first('credit')}}</label>
                    @else
                         <input type="text" class="input-text radius " value="{{$data->credit}}" placeholder="0000" name="credit" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>加盟日期：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('joinDate'))
                        <input type="text" name="joinDate" id="joinDate" value="<?PHP echo date('Y-m-d',$data->joinDate);?>" class=" input-text radius error" aria-required="true" readonly  aria-invalid="true">
                        <label id="joinDate-error" class="error" for="joinDate">{{$errors->first('joinDate')}}</label>
                    @else
                         <input type="text" name="joinDate" id="joinDate" value="<?PHP echo date('Y-m-d',$data->joinDate);?>" class=" input-text radius " readonly  placeholder="0000-00-00">
                        
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>合同到期日：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('contractDate'))
                        <input type="text" name="contractDate" id="contractDate" value="<?PHP echo date('Y-m-d',$data->contractDate);?>" class=" input-text radius error " aria-required="true" readonly  aria-invalid="true">
                        <label id="contractDate-error" class="error" for="contractDate">{{$errors->first('contractDate')}}</label>
                    @else
                         <input type="text" name="contractDate" id="contractDate" value="<?PHP echo date('Y-m-d',$data->contractDate);?>" class=" input-text radius " readonly  placeholder="0000-00-00">
                        
                    @endif
                </div>
            </div>


            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                    <button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 提交</button>
                </div>
            </div>
        </form>
    </article>
</div>
<script type="text/javascript" src="{{asset('resources/cms/static/h-ui/js/H-ui.js')}}"></script> 
<script type="text/javascript" src="{{asset('resources/cms/lib/icheck/jquery.icheck.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('resources/cms/lib/jquery.validation/1.14.0/jquery.validate.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('resources/cms/lib/jquery.validation/1.14.0/validate-methods.js')}}"></script> 
<script type="text/javascript" src="{{asset('resources/cms/lib/jquery.validation/1.14.0/messages_zh.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('resources/officecms/laydate/laydate.js')}}"></script>

<script type="text/javascript">


//验证表单
$(document).ready(function(){

    ////该表单的每个提示信息再input右边展示
    $('#formSWarehouseAdd input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });

    $("#formSWarehouseAdd").validate({
        //表单规则
        rules:{
            name:{
                required:true,
                minlength:5,
                maxlength:100
            }, 
            address:{
                required:true,
                minlength:5,
                maxlength:100
            },
            area:{
                required:true,
                number:true
            },
            number:{
                required:true,
                number:true
            },
            distrbutionArea:{
                required:true,
                minlength:5,
                maxlength:250
            },
            distrbutionTools:{
                required:true,
                minlength:5,
                maxlength:250
            },
            quota:{
                required:true,
                number:true
            }, 
            credit:{
                required:true,
                number:true
            }, 
            joinDate:{
                date:true
            },
            contractDate:{
                date:true
            }
        },
        //表单提示信息 
        messages:{
            name:{
                required:"必须填写库房名称",
                minlength:"最小为5位",
                maxlength:"最大为100位"
            },
            address:{
                required:"必须填写库房地址",
                minlength:"最小为5位",
                maxlength:"最大为100位"
            },
            area:{
                required:"必须填写库房面积",
                number:"填写库房面积有误"
            },
            number:{
                required:"必须填写员工人数",
                number:"填写员工人数有误"
            },
            distrbutionArea:{
                required:"必须填写配送区域",
                minlength:"最小为5位",
                maxlength:"最大为250位"
            },
            distrbutionTools:{
                required:"必须填写配送工具情况",
                minlength:"最小为5位",
                maxlength:"最大为250位"
            },
            quota:{
                required:"必须填写储值额度",
                number:"填写储值额度有误"
            },
            credit:{
                required:"必须填写授信额度",
                number:"填写授信额度有误"
            },
            joinDate:{
                date:"请选择正确的日期"
            },
            contractDate:{
                date:"请选择正确的日期"
            }
        }

    });
});
 
laydate({
  elem: '#contractDate', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
  event: 'focus' //响应事件。如果没有传入event，则按照默认的click
}); 
laydate({
  elem: '#joinDate', 
  event: 'focus' 
}); 

</script>

@endsection