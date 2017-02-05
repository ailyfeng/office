@extends("cms.layouts.admin")
@section("content")

    <script src="{{asset('resources/OfficeCMS/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('resources/OfficeCMS/uploadify/uploadify.css')}}">

<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> <a href="{{url('cms/index/info')}}" >首页 </a><span class="c-gray en">&gt;</span> 
        <a href="javascript:;" data-title="供应商管理" _href="{{url('cms/supplier')}}" onclick="Hui_admin_tab(this)" href="javascript:;">
            供应商管理
        </a>
        <span class="c-gray en">&gt;</span> 
        编辑“{{$data->name}}”的信息 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <article class="page-container">
        <form action="{{url('cms/supplierContract/'.$data->contactId)}}" method="post" class="form form-horizontal" id="formSupplierContractAdd">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>供应商：</label>
                <div class="formControls col-xs-8 col-sm-9">
                        <input type="hidden" name="supplierId" value="{{$supplierData['supplierId']}}" class="supplierId">
                    @if($errors->has('supplierId'))
                        <input type="text" class="input-text radius error" value="{{$supplierData['fullName']}}"  readonly="readonly" name="supplierId_" id="supplierId" placeholder="请选择供应商" onclick="actionEdit('选择供应商','{{url('cms/supplier?selectSupplier=1')}}&sonId=supplierId&sonName=supplierId','1')" aria-required="true" aria-invalid="true">
                        <label id="supplierId-error" class="error" for="supplierId">{{$errors->first('supplierId')}}</label>
                    @else
                         <input type="text" class="input-text radius" value="{{$supplierData['fullName']}}" readonly="readonly" placeholder="请选择供应商" name="supplierId_" id="supplierId" onclick=" actionEdit('选择供应商','{{url('cms/supplier?selectSupplier=1')}}&sonId=supplierId&sonName=supplierId','1');" aria-required="true" aria-invalid="true">
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>姓名：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('name'))
                        <input type="text" class="input-text radius error" value="{{$data->name}}" name="name" aria-required="true" aria-invalid="true">
                        <label id="name-error" class="error" for="name">{{$errors->first('name')}}</label>
                    @else
                         <input type="text" class="input-text radius" value="{{$data->name}}" placeholder="2-30个字符" name="name" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">英文名/昵称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('nickname'))
                        <input type="text" class="input-text radius error" value="{{$data->nickname}}" name="nickname" aria-required="true" aria-invalid="true">
                        <label id="nickname-error" class="error" for="nickname">{{$errors->first('nickname')}}</label>
                    @else
                         <input type="text" class="input-text radius " value="{{$data->nickname}}" placeholder="2-30个字符"  name="nickname" >
                    @endif
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">性别：</label>
                <div class="formControls col-xs-8 col-sm-9">

                    @foreach($isGender as $k=>$v)
                    
                     <div class="radio-box">
                        <input type="radio" id="radio-{{$k}}" name="gender" value="{{$k}}" @if($k==$data->gender)checked="checked" @endif >
                        <label for="radio-{{$k}}">{{$v}}</label>
                      </div>

                    @endforeach

                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">职位/描述：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('position'))
                    <textarea class="textarea radius error" name="position" placeholder="250个字符" aria-required="true" aria-invalid="true">{{$data->position}}</textarea>
                        <label id="account-error" class="error" for="position">{{$errors->first('position')}}</label>
                    @else
                        <textarea class="textarea radius" name="position" placeholder="250个字符" onKeyUp="textarealength(this,250)">{{$data->position}}</textarea>
                        <p class="textarea-numberbar"><em class="textarea-length">0</em>/250</p>
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">年龄：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('age'))
                        <input type="text" class="input-text radius error" value="{{$data->age}}" name="age" aria-required="true" aria-invalid="true">
                        <label id="age-error" class="error" for="age">{{$errors->first('age')}}</label>
                    @else
                         <input type="text" class="input-text radius " value="{{$data->age}}"  placeholder=""  name="age" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">座机电话：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('phone'))
                        <input type="text" class="input-text radius error" value="{{$data->phone}}" name="phone" aria-required="true" aria-invalid="true">
                        <label id="phone-error" class="error" for="phone">{{$errors->first('phone')}}</label>
                    @else
                         <input type="text" class="input-text radius " value="{{$data->phone}}" placeholder="" name="phone" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">分机：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('phoneExt'))
                        <input type="text" class="input-text radius error" value="{{$data->phoneExt}}" name="phoneExt" aria-required="true" aria-invalid="true">
                        <label id="phoneExt-error" class="error" for="phoneExt">{{$errors->first('phoneExt')}}</label>
                    @else
                         <input type="text" class="input-text radius " value="{{$data->phoneExt}}" placeholder="" name="phoneExt" >
                    @endif
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
                <label class="form-label col-xs-4 col-sm-2">个人帐户：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('account'))
                        <input type="text" class="input-text radius error" value="{{$data->account}}" name="account" aria-required="true" aria-invalid="true">
                        <label id="account-error" class="error" for="priceNoTax">{{$errors->first('account')}}</label>
                    @else
                         <input type="text" class="input-text radius " value="{{$data->account}}" placeholder="" name="account" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">帐户信息：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('account'))
                        <input type="text" class="input-text radius error" value="{{$data->wechat}}" name="account" aria-required="true" aria-invalid="true">
                        <label id="account-error" class="error" for="account">{{$errors->first('account')}}</label>
                    @else
                         <input type="text" class="input-text radius " value="{{$data->wechat}}" placeholder="5-30个字符" name="account" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">生日：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('birthday'))
                        <input type="text" name="birthday" id="birthday" class=" input-text radius error" value="{{$data->birthday}}" aria-required="true" readonly  aria-invalid="true">
                        <label id="birthday-error" class="error" for="birthday">{{$errors->first('birthday')}}</label>
                    @else
                         <input type="text" name="birthday" id="birthday" class=" input-text radius " value="{{$data->birthday}}" readonly  placeholder="0000-00-00">
                        
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">备注：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('note'))
                    <textarea class="textarea radius error" name="note" placeholder="" aria-required="true" aria-invalid="true">{{$data->note}}</textarea>
                        <label id="account-error" class="error" for="note">{{$errors->first('note')}}</label>
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
<script type="text/javascript" src="{{asset('resources/officecms/laydate/laydate.js')}}"></script>

<script type="text/javascript">
 

/*编辑*/
function actionEdit(title,url,id,w,h){
    //layer_show(title,url,w,h);

    layer.open({
      type: 2,
      area: ['90%', '90%'],
      fixed: false, //不固定
      maxmin: true,
      content: url
    });
}

//验证表单
$(document).ready(function(){

    ////该表单的每个提示信息再input右边展示
    $('#formSupplierContractAdd input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });

    $("#formSupplierContractAdd").validate({
        //表单规则
        rules:{
            name:{
                required:true,
                minlength:2,
                maxlength:30
            }, 
            nickname:{
                minlength:2,
                maxlength:30
            },
            position:{
                maxlength:250
            },
            age:{
                number:true,
                maxlength:3
            },
            phone:{
                number:true,
                minlength:6,
                maxlength:11
            },
            phoneExt:{
                number:true,
                minlength:1,
                maxlength:11
            },
            telOne:{
                minlength:11,
                maxlength:11
            },
            telTwo:{
                minlength:11,
                maxlength:11
            }, 
            email:{
                email:true
            }, 
            qq:{
                number:true,
                minlength:4,
                maxlength:11
            },
            wechat:{
                minlength:2,
                maxlength:20
            }, 
            account:{
                minlength:5,
                maxlength:40
            },
            birthday:{
                date:true
            }
            // returnRequirements:{
            //     required:true,
            //     minlength:5,
            //     maxlength:30
            // }, 
        },
        //表单提示信息 
        messages:{
            name:{
                required:"必须填写姓名",
                minlength:"最小为2位",
                maxlength:"最大为30位"
            },
            nickname:{
                minlength:"最小为2位",
                maxlength:"最大为30位"
            },
            position:{
                maxlength:"最大为250位"
            },
            age:{
                number:"填写年龄有误",
                maxlength:"最大为2位"
            },
            phone:{
                number:"座机电话有误",
                minlength:"最小为6位",
                maxlength:"最大为11位"
            },
            phoneExt:{
                number:"分机有误",
                minlength:"最小为1位",
                maxlength:"最大为11位"
            },
            telOne:{
                minlength:"手机号码不正确",
                maxlength:"手机号码不正确"
            },
            telTwo:{
                minlength:"手机号码不正确",
                maxlength:"手机号码不正确"
            },
            email:{
                email:"邮箱不正确"
            },
            qq:{
                number:"qq不正确",
                minlength:"最小为4位",
                maxlength:"最大为11位"
            },
            wechat:{
                minlength:"最小为3位",
                maxlength:"最大为20位"
            },
            account:{
                minlength:"最小为5位",
                maxlength:"最大为40位"
            },
            birthday:{
                date:"请选择正确的日期"
            }
        }

    });
});
 
laydate({
  elem: '#birthday', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
  event: 'focus' //响应事件。如果没有传入event，则按照默认的click
}); 

</script>

@endsection