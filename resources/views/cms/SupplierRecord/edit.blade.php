@extends("cms.layouts.admin")
@section("content")

    <script src="{{asset('resources/cms/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('resources/cms/uploadify/uploadify.css')}}">

<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> <a href="{{url('cms/index/info')}}" >首页 </a><span class="c-gray en">&gt;</span> 
        <a href="javascript:;" data-title="供应商接触记录管理" _href="{{url('cms/supplier')}}" onclick="Hui_admin_tab(this)" href="javascript:;">
            供应商接触记录管理
        </a>
        <span class="c-gray en">&gt;</span> 
            编辑供应商接触记录
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <article class="page-container">
        <form action="{{url('cms/supplierRecord/'.$data->recordId)}}" method="post" class="form form-horizontal" id="formSupplierRecordAdd">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>供应商：</label>
                <div class="formControls col-xs-8 col-sm-9">
                        <input type="hidden" name="supplierId" value="{{$data->supplierId}}" class="supplierId">
                    @if($errors->has('supplierId'))
                        <input type="text" class="input-text radius error" value="{{$data->fullName}}"  readonly="readonly" name="supplierId_" id="supplierId" placeholder="请选择供应商" onclick="actionEdit('选择供应商','{{url('cms/supplier?selectSupplier=1')}}&sonId=supplierId&sonName=supplierId','1')" aria-required="true" aria-invalid="true">
                        <label id="supplierId-error" class="error" for="supplierId">{{$errors->first('supplierId')}}</label>
                    @else
                         <input type="text" class="input-text radius" value="{{$data->fullName}}" readonly="readonly" placeholder="请选择供应商" name="supplierId_" id="supplierId" onclick=" actionEdit('选择供应商','{{url('cms/supplier?selectSupplier=1')}}&sonId=supplierId&sonName=supplierId','1');" aria-required="true" aria-invalid="true">
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>联系时间：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('timestamp'))
                        <input type="text" name="timestamp" id="timestamp" class=" input-text radius error" aria-required="true" readonly value="{{$data['timestamp']}}" aria-invalid="true">
                        <label id="timestamp-error" class="error" for="timestamp">{{$errors->first('timestamp')}}</label>
                    @else
                         <input type="text" name="timestamp" id="timestamp" class=" input-text radius " readonly value="{{$data['timestamp']}}"  placeholder="0000-00-00">
                        
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>联系人(公式员工)：</label>
                <div class="formControls col-xs-8 col-sm-9">
                        <input type="hidden" name="memberId" value="100" class="memberId">
                    @if($errors->has('memberId'))
                        <input type="text" class="input-text radius error" value="{{$data->memberId}}"  readonly="readonly" name="memberId_" id="memberId" placeholder="请选择联系人" onclick="actionEdit('请选联系人','{{url('cms/warehouse?selectSupplier=1')}}&sonId=memberId&sonName=memberId','1')" aria-required="true" aria-invalid="true">
                        <label id="memberId-error" class="error" for="memberId">{{$errors->first('memberId')}}</label>
                    @else
                         <input type="text" class="input-text radius" value="{{$data->memberId}}" readonly="readonly" placeholder="请选择库房" name="memberId_" id="memberId" onclick=" actionEdit('请选联系人','{{url('cms/warehouse?selectSupplier=1')}}&sonId=memberId&sonName=memberId','1');" aria-required="true" aria-invalid="true">
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">联系方式(本次)：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    @foreach($type as $k=>$v)

                     <div class="radio-box">
                        <input type="radio" id="radio-{{$k}}" name="type" value="{{$k}}" @if($k==$data->type)checked="checked" @endif >
                        <label for="radio-{{$k}}">{{$v}}</label>
                      </div>
                    @endforeach
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">要点记录：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('record'))
                    <textarea class="textarea radius error" name="record" placeholder="" aria-required="true" aria-invalid="true">{{$data['record']}}</textarea>
                        <label id="account-error" class="error" for="record">{{$errors->first('record')}}</label>
                    @else
                        <textarea class="textarea radius" name="record" placeholder="250个字符" onKeyUp="textarealength(this,250)">{{$data['record']}}</textarea>
                        <p class="textarea-numberbar"><em class="textarea-length">0</em>/250</p>
                    @endif
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">留物记录：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('keepRecords'))
                    <textarea class="textarea radius error" name="keepRecords" placeholder="" aria-required="true" aria-invalid="true">{{$data->keepRecords}}</textarea>
                        <label id="account-error" class="error" for="keepRecords">{{$errors->first('keepRecords')}}</label>
                    @else
                        <textarea class="textarea radius" name="keepRecords" placeholder="250个字符" onKeyUp="textarealength(this,250)">{{$data->keepRecords}}</textarea>
                        <p class="textarea-numberbar"><em class="textarea-length">0</em>/250</p>
                    @endif
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">赠（试）品记录：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('presentRecords'))
                    <textarea class="textarea radius error" name="presentRecords" placeholder="" aria-required="true" aria-invalid="true">{{$data->presentRecords}}</textarea>
                        <label id="account-error" class="error" for="presentRecords">{{$errors->first('presentRecords')}}</label>
                    @else
                        <textarea class="textarea radius" name="presentRecords" placeholder="250个字符" onKeyUp="textarealength(this,250)">{{$data->presentRecords}}</textarea>
                        <p class="textarea-numberbar"><em class="textarea-length">0</em>/250</p>
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">下次联系计划日期：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('nextTimestamp'))
                        <input type="text" name="nextTimestamp" id="nextTimestamp" value="{{$data->nextTimestamp}}" class=" input-text radius error" aria-required="true" readonly  aria-invalid="true">
                        <label id="nextTimestamp-error" class="error" for="nextTimestamp">{{$errors->first('nextTimestamp')}}</label>
                    @else
                         <input type="text" name="nextTimestamp" id="nextTimestamp" value="{{$data->nextTimestamp}}" class=" input-text radius " readonly  placeholder="0000-00-00">
                        
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">下次联系计划内容：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('nextContent'))
                    <textarea class="textarea radius error" name="nextContent" placeholder="" aria-required="true" aria-invalid="true">{{$data->nextContent}}</textarea>
                        <label id="account-error" class="error" for="nextContent">{{$errors->first('nextContent')}}</label>
                    @else
                        <textarea class="textarea radius" name="nextContent" placeholder="250个字符" onKeyUp="textarealength(this,250)">{{$data->nextContent}}</textarea>
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
    $('#formSupplierRecordAdd input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });
    
    $("#formSupplierRecordAdd").validate({
        //表单规则
        rules:{
            supplierId:{
                required:true
            },
            memberId:{
                required:true
            }
        },
        //表单提示信息 
        messages:{
            supplierId:{
                required:true
            },
            memberId:{
                required:true
            }
        }

    });
});
 
laydate({
  elem: '#nextTimestamp', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
  event: 'focus' //响应事件。如果没有传入event，则按照默认的click
}); 
laydate({
  elem: '#timestamp', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
  event: 'focus' //响应事件。如果没有传入event，则按照默认的click
}); 

</script>

@endsection