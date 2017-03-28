@extends("cms.layouts.admin")
@section("content")


<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> <a href="{{url('cms/index/info')}}" >首页 </a><span class="c-gray en">&gt;</span> 
        <a href="javascript:;" data-title="客户联系人" _href="{{url('cms/supplier')}}" onclick="Hui_admin_tab(this)" href="javascript:;">
            客户联系人管理
        </a>
        <span class="c-gray en">&gt;</span> 
        编辑客户联系人：{{$data->nameChinese}} <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <article class="page-container">
        <form action="{{url('cms/clientMember/'.$data->id)}}" method="post" class="form form-horizontal" id="formSupplierAdd">
            {{csrf_field()}}

            <input type="hidden" name="_method" value="put">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>姓名（中文）：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('nameChinese'))
                        <input type="text" class="input-text radius error" value="{{$data->nameChinese}}" name="nameChinese" aria-required="true" aria-invalid="true">
                        <label id="nameChinese-error" class="error" for="nameChinese">{{$errors->first('nameChinese')}}</label>
                    @else
                         <input type="text" class="input-text radius" value="{{$data->nameChinese}}" placeholder="5-100个字符" name="nameChinese" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">姓名（英文）：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('nameEnglish'))
                        <input type="text" class="input-text radius error" value="{{$data->nameEnglish}}" name="nameEnglish" aria-required="true" aria-invalid="true">
                        <label id="nameEnglish-error" class="error" for="nameEnglish">{{$errors->first('nameEnglish')}}</label>
                    @else
                         <input type="text" class="input-text radius " value="{{$data->nameEnglish}}" placeholder="2-30个字符"  name="nameEnglish" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">性别：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @foreach($sexList as $k=>$v)
                        <div class="radio-box">
                            <input type="radio" id="radio-{{$k}}" name="sex" value="{{$k}}" @if($k==$data->sex)checked="checked" @endif >
                            <label for="radio-{{$k}}">{{$v}}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">手机一：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('telOne'))
                        <input type="text" class="input-text radius error" value="{{$data->telOne}}" name="telOne" aria-required="true" aria-invalid="true">
                        <label id="telOne-error" class="error" for="telOne">{{$errors->first('telOne')}}</label>
                    @else
                        <input type="text" class="input-text radius " value="{{$data->telOne}}" placeholder="" name="telOne" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">手机二：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('telTwo'))
                        <input type="text" class="input-text radius error" value="{{$data->telTwo}}" name="telTwo" aria-required="true" aria-invalid="true">
                        <label id="telTwo-error" class="error" for="telTwo">{{$errors->first('telTwo')}}</label>
                    @else
                        <input type="text" class="input-text radius " value="{{$data->telTwo}}" placeholder="" name="telTwo" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">QQ：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('qq'))
                        <input type="text" class="input-text radius error" value="{{$data->qq}}" name="qq" aria-required="true" aria-invalid="true">
                        <label id="qq-error" class="error" for="qq">{{$errors->first('qq')}}</label>
                    @else
                        <input type="text" class="input-text radius " value="{{$data->qq}}" placeholder="" name="qq" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">微信：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('wechat'))
                        <input type="text" class="input-text radius error" value="{{$data->wechat}}" name="wechat" aria-required="true" aria-invalid="true">
                        <label id="wechat-error" class="error" for="wechat">{{$errors->first('wechat')}}</label>
                    @else
                        <input type="text" class="input-text radius " value="{{$data->wechat}}" placeholder="" name="wechat" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">邮箱：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('email'))
                        <input type="text" class="input-text radius error" value="{{$data->email}}" name="email" aria-required="true" aria-invalid="true">
                        <label id="email-error" class="error" for="email">{{$errors->first('email')}}</label>
                    @else
                        <input type="text" class="input-text radius " value="{{$data->email}}" placeholder="" name="email" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">出生年月日：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('contractDate'))
                        <input type="text" name="brithday" id="brithday" class=" input-text radius error" aria-required="true" value="{{$data->brithday}}" readonly  aria-invalid="true">
                        <label id="brithday-error" class="error" for="brithday">{{$errors->first('contractDate')}}</label>
                    @else
                        <input type="text" name="brithday" id="brithday" class=" input-text radius " readonly value="{{$data->brithday}}" placeholder="0000-00-00">

                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">年龄段：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('age'))
                        <input type="text" name="age" class=" input-text radius error" value="{{$data->age}}" aria-required="true"  aria-invalid="true">
                        <label id="age-error" class="error" for="age">{{$errors->first('age')}}</label>
                    @else
                        <input type="text" name="age" class=" input-text radius " value="{{$data->age}}"  placeholder="">

                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">座机电话：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('age'))
                        <input type="text" name="phone" class=" input-text radius error" aria-required="true"  value="{{$data->phone}}" aria-invalid="true">
                        <label id="phone-error" class="error" for="phone">{{$errors->first('phone')}}</label>
                    @else
                        <input type="text" name="phone" class=" input-text radius " value="{{$data->phone}}" placeholder="">

                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">座机电话：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('phoneExt'))
                        <input type="text" name="phoneExt" value="{{$data->phoneExt}}" class=" input-text radius error" aria-required="true"  aria-invalid="true">
                        <label id="phoneExt-error" class="error" for="phoneExt">{{$errors->first('phoneExt')}}</label>
                    @else
                        <input type="text" name="phoneExt" value="{{$data->phoneExt}}" class=" input-text radius "  placeholder="">

                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">个人帐户：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('account'))
                        <input type="text" name="account" class=" input-text radius error" value="{{$data->account}}" aria-required="true"  aria-invalid="true">
                        <label id="account-error" class="error" for="account">{{$errors->first('account')}}</label>
                    @else
                        <input type="text" name="account" class=" input-text radius " value="{{$data->account}}"  placeholder="">

                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">交易次数：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('bargainNum'))
                        <input type="text" name="bargainNum" value="{{$data->bargainNum}}" class=" input-text radius error" aria-required="true"  aria-invalid="true">
                        <label id="bargainNum-error" class="error" for="bargainNum">{{$errors->first('bargainNum')}}</label>
                    @else
                        <input type="text" name="bargainNum" value="{{$data->bargainNum}}" class=" input-text radius "  placeholder="">

                    @endif
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">职位/描述：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('description'))
                        <input type="text" class="input-text radius error" value="{{$data->description}}" name="description" aria-required="true" aria-invalid="true">
                        <label id="description-error" class="error" for="description">{{$errors->first('description')}}</label>
                    @else
                        <input type="text" class="input-text radius " value="{{$data->description}}" placeholder="" name="description" >
                    @endif
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">附注：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('note'))
                        <textarea class="textarea radius error" name="note" placeholder="附注" aria-required="true" aria-invalid="true">{{$data->note}}</textarea>
                        <label id="note-error" class="error" for="note">{{$errors->first('note')}}</label>
                    @else
                        <textarea class="textarea radius" name="note" placeholder="250个字符" onKeyUp="textarealength(this,250)">{{$data->note}}</textarea>
                        <p class="textarea-numberbar"><em class="textarea-length">0</em>/250</p>
                    @endif
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                    <button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 提交 </button>
                    <!-- <button onClick="article_save();" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存草稿</button> -->
                    <!-- <button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button> -->
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
<script type="text/javascript" src="{{asset('resources/cms/laydate/laydate.js')}}"></script>

<script type="text/javascript">

    //打开子网页
    function openUrl(id){
        var url = '{{url("cms/upload")}}'+'/'+id+'/edit';
        layer.open({
            type: 2,
            area: ['700px', '530px'],
            fixed: false, //不固定
            maxmin: true,
            content: url
        });
    }

//验证表单
$(document).ready(function(){

    ////该表单的每个提示信息再input右边展示
    $('#formSupplierAdd input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });

    $("#formSupplierAdd").validate({
        //表单规则
        rules:{
            fullName:{
                required:true,
                minlength:1,
                maxlength:100
            }, 
            abbreviation:{
                // required:true,
                // minlength:2,
                maxlength:100
            }, 
            type:{
                required:true,
                minlength:1,
                maxlength:100
            },
            brand:{
                required:true,
                minlength:2,
                maxlength:100
            },
            brandType:{
                required:true,
                minlength:1,
                maxlength:100
            },
            officeAdd:{
                required:true,
                minlength:1,
                maxlength:100
            },
            warehoustAdd:{
                required:true,
                minlength:1,
                maxlength:100
            },
            area:{
                required:true,
                minlength:1,
                maxlength:100
            },
            settlementMmethod:{
                // minlength:1,
                maxlength:100
            }, 
            paymentMethod:{
                // minlength:1,
                maxlength:100
            }, 
            priceTax:{
                // number:true
                maxlength:100
            },
            priceNoTax:{
                // number:true
                maxlength:100
            }, 
            account:{
                maxlength:100
            },
            contractDate:{
                date:true
            },
            returnRequirements:{
                // required:true,
                // minlength:5,
                maxlength:250
            }
        },
        //表单提示信息 
        messages:{
            fullName:{
                required:"必须填写供应商全称",
                minlength:"最小为1位",
                maxlength:"最大为100位"
            },
            abbreviation:{
                // required:"必须填写供应商简称",
                // minlength:"最小为2位",
                maxlength:"最大为100位"
            },
            type:{
                required:"必须填写供应商类型",
                minlength:"最小为1位",
                maxlength:"最大为100位"
            },
            brand:{
                required:"必须填写供应品牌",
                minlength:"最小为1位",
                maxlength:"最大为100位"
            },
            brandType:{
                required:"必须填写供应品类",
                minlength:"最小为1位",
                maxlength:"最大为100位"
            },
            officeAdd:{
                required:"必须填写办公地址",
                minlength:"最小为1位",
                maxlength:"最大为100位"
            },
            warehoustAdd:{
                required:"必须填写库房地址",
                minlength:"最小为1位",
                maxlength:"最大为100位"
            },
            area:{
                required:"必须填写采购区域",
                minlength:"最小为1位",
                maxlength:"最大为100位"
            },
            settlementMmethod:{
                // minlength:"最小为1位",
                maxlength:"最大为100位"
            },
            paymentMethod:{
                // minlength:"最小为5位",
                maxlength:"最大为100位"
            },
            priceTax:{
                // number:"请输入正确的价格"
                maxlength:"最大为100位"
            },
            priceNoTax:{
                // number:"请输入正确的价格"
                maxlength:"最大为100位"
            },
            account:{
                // minlength:"最小为5位",
                maxlength:"最大为100位"
            },
            contractDate:{
                date:"请选择正确的日期"
            },
            returnRequirements:{
                // minlength:"最小为10位",
                maxlength:"最大为250位"
            }
        }

    });
});

laydate({
    elem: '#brithday', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
    event: 'focus' //响应事件。如果没有传入event，则按照默认的click
});

laydate({
    elem: '#employeeDate', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
    event: 'focus' //响应事件。如果没有传入event，则按照默认的click
});

laydate({
    elem: '#staffDate', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
    event: 'focus' //响应事件。如果没有传入event，则按照默认的click
});

laydate({
    elem: '#leaveData', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
    event: 'focus' //响应事件。如果没有传入event，则按照默认的click
});

</script>

@endsection