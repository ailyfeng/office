@extends("cms.layouts.admin")
@section("content")


<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> <a href="{{url('cms/index/info')}}" >首页 </a><span class="c-gray en">&gt;</span> 
        <a href="javascript:;" data-title="供应商管理" _href="{{url('cms/supplier')}}" onclick="Hui_admin_tab(this)" href="javascript:;">
            供应商管理
        </a>
        <span class="c-gray en">&gt;</span> 
        添加供应商 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <article class="page-container">
        <form action="{{url('cms/member')}}" method="post" class="form form-horizontal" id="formSupplierAdd">
            {{csrf_field()}}


            <div class="row cl">
                <label class=" col-xs-4 col-sm-2 text-r"></label>
                <div class="formControls col-xs-8 col-sm-9">
                    <table class="table">
                        <tr>
                            <th class="va-t">
                                <p>
                                    <input type="hidden" name="photoStandard" value="">
                                    <img width=140 class="photoStandard radius"  src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTEwYmJhZjQzYSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MTBiYmFmNDNhIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" alt="..." >
                                </p>
                                <p>
                                    <button type="button" class="btn btn-secondary radius size-MINI" onclick="openUrl('photoStandard');">上传图片</button>
                                    <button type="button" class="btn btn-danger radius size-MINI"   onclick="deleteImage('photoStandard');">删除图片</button>
                                </p>
                            </th>
                            <th class="va-m">
                                <p>
                                    <input type="hidden" name="photoAssist" value="" >
                                    <img width=140 class="photoAssist radius"   src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTEwYmJhZjQzYSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MTBiYmFmNDNhIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" alt="..." >
                                </p>
                                <p>
                                    <button type="button" class="btn btn-secondary radius size-MINI" onclick="openUrl('photoAssist');">上传图片</button>
                                    <button type="button" class="btn btn-danger radius size-MINI"   onclick="deleteImage('photoAssist');">删除图片</button>
                                </p>
                            </th>
                            <th class="va-b">
                                <p>
                                    <input type="hidden" name="photoWork" value="" >
                                    <img width=140 class="photoWork radius"   src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTEwYmJhZjQzYSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MTBiYmFmNDNhIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" alt="..." >
                                </p>
                                <p>
                                    <button type="button" class="btn btn-secondary radius size-MINI" onclick="openUrl('photoWork');">上传图片</button>
                                    <button type="button" class="btn btn-danger radius size-MINI"   onclick="deleteImage('photoWork');">删除图片</button>
                                </p>
                            </th>
                        </tr>
                    </table>
                    做3张图片 ：主照片（标准半身照）、辅照片（生活照、全身照）、工作照片（形象照，系统使用）
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>姓名（中文）：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('nameChinese'))
                        <input type="text" class="input-text radius error" value="" name="nameChinese" aria-required="true" aria-invalid="true">
                        <label id="nameChinese-error" class="error" for="nameChinese">{{$errors->first('nameChinese')}}</label>
                    @else
                         <input type="text" class="input-text radius" value="" placeholder="5-100个字符" name="nameChinese" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">姓名（英文）：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('nameEnglish'))
                        <input type="text" class="input-text radius error" value="" name="nameEnglish" aria-required="true" aria-invalid="true">
                        <label id="nameEnglish-error" class="error" for="nameEnglish">{{$errors->first('nameEnglish')}}</label>
                    @else
                         <input type="text" class="input-text radius " value="" placeholder="2-30个字符"  name="nameEnglish" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">性别：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @foreach($sex as $k=>$v)
                        <div class="radio-box">
                            <input type="radio" id="radio-{{$k}}" name="sex" value="{{$k}}" @if($k==0)checked="checked" @endif >
                            <label for="radio-{{$k}}">{{$v}}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">手机一：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('telOne'))
                        <input type="text" class="input-text radius error" value="" name="telOne" aria-required="true" aria-invalid="true">
                        <label id="telOne-error" class="error" for="telOne">{{$errors->first('telOne')}}</label>
                    @else
                        <input type="text" class="input-text radius " value="" placeholder="" name="telOne" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">手机二：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('telTwo'))
                        <input type="text" class="input-text radius error" value="" name="telTwo" aria-required="true" aria-invalid="true">
                        <label id="telTwo-error" class="error" for="telTwo">{{$errors->first('telTwo')}}</label>
                    @else
                        <input type="text" class="input-text radius " value="" placeholder="" name="telTwo" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">QQ、微信及邮箱：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('contact'))
                        <input type="text" class="input-text radius error" value="" name="contact" aria-required="true" aria-invalid="true">
                        <label id="contact-error" class="error" for="contact">{{$errors->first('contact')}}</label>
                    @else
                        <input type="text" class="input-text radius " value="" placeholder="" name="contact" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">出生年月日：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('contractDate'))
                        <input type="text" name="brithday" id="brithday" class=" input-text radius error" aria-required="true" readonly  aria-invalid="true">
                        <label id="brithday-error" class="error" for="brithday">{{$errors->first('contractDate')}}</label>
                    @else
                        <input type="text" name="brithday" id="brithday" class=" input-text radius " readonly  placeholder="0000-00-00">

                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>身份证地址：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('address'))
                        <input type="text" class="input-text radius error" value="" name="address" aria-required="true" aria-invalid="true">
                        <label id="address-error" class="error" for="address">{{$errors->first('address')}}</label>
                    @else
                        <input type="text" class="input-text radius " value=""  placeholder=""  name="address" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>身份证号码：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('identityCardId'))
                        <input type="text" class="input-text radius error" value="" name="identityCardId" aria-required="true" aria-invalid="true">
                        <label id="identityCardId-error" class="error" for="identityCardId">{{$errors->first('identityCardId')}}</label>
                    @else
                        <input type="text" class="input-text radius " value="" placeholder="" name="identityCardId" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>现住址：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('addressNow'))
                        <input type="text" class="input-text radius error" value="" name="addressNow" aria-required="true" aria-invalid="true">
                        <label id="addressNow-error" class="error" for="addressNow">{{$errors->first('addressNow')}}</label>
                    @else
                        <input type="text" class="input-text radius " value="" placeholder="" name="addressNow" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>紧急联系人姓名：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('urgentName'))
                        <input type="text" class="input-text radius error" value="" name="urgentName" aria-required="true" aria-invalid="true">
                        <label id="urgentName-error" class="error" for="urgentName">{{$errors->first('urgentName')}}</label>
                    @else
                        <input type="text" class="input-text radius " value="" placeholder="" name="urgentName" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>紧急联系人电话：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('urgentTel'))
                        <input type="text" class="input-text radius error" value="" name="urgentTel" aria-required="true" aria-invalid="true">
                        <label id="urgentTel-error" class="error" for="urgentTel">{{$errors->first('urgentTel')}}</label>
                    @else
                        <input type="text" class="input-text radius " value="" placeholder="" name="urgentTel" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">与紧急联系人关系：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('urgentRelationship'))
                        <input type="text" class="input-text radius error" value="" name="urgentRelationship" aria-required="true" aria-invalid="true">
                        <label id="urgentRelationship-error" class="error" for="urgentRelationship">{{$errors->first('urgentRelationship')}}</label>
                    @else
                        <input type="text" class="input-text radius " value="" placeholder="" name="urgentRelationship" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">雇佣方式：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @foreach($employType as $k=>$v)
                        <div class="radio-box">
                            <input type="radio" id="radio-{{$k}}" name="employType" value="{{$k}}" @if($k==0)checked="checked" @endif >
                            <label for="radio-{{$k}}">{{$v}}</label>
                        </div>

                    @endforeach

                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">所属部门：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @foreach($departmentId as $k=>$v)
                        <div class="radio-box">
                            <input type="radio" id="radio-{{$k}}" name="departmentId" value="{{$k}}" @if($k==0)checked="checked" @endif >
                            <label for="radio-{{$k}}">{{$v}}</label>
                        </div>

                    @endforeach

                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">评定级别：</label>
                <div class="formControls col-xs-8 col-sm-9">

                    @foreach($level as $k=>$v)

                        <div class="radio-box">
                            <input type="radio" id="radio-{{$k}}" name="level" value="{{$k}}" @if($k==0)checked="checked" @endif >
                            <label for="radio-{{$k}}">{{$v}}</label>
                        </div>

                    @endforeach

                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">直接上级：</label>
                <div class="formControls col-xs-8 col-sm-9">

                    @if($errors->has('leadId'))
                        <input type="text" class="input-text radius error" value="" name="leadId" aria-required="true" aria-invalid="true">
                        <label id="leadId-error" class="error" for="leadId">{{$errors->first('leadId')}}</label>
                    @else
                         <input type="text" class="input-text radius " value="" placeholder=""  name="leadId" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">入职日期：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('employeeDate'))
                        <input type="text" name="brithday" id="employeeDate" class=" input-text radius error" aria-required="true" readonly  aria-invalid="true">
                        <label id="employeeDate-error" class="error" for="employeeDate">{{$errors->first('contractDate')}}</label>
                    @else
                        <input type="text" name="employeeDate" id="employeeDate" class=" input-text radius " readonly  placeholder="0000-00-00">

                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">转正日期：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('staffDate'))
                        <input type="text" name="staffDate" id="staffDate" class=" input-text radius error" aria-required="true" readonly  aria-invalid="true">
                        <label id="staffDate-error" class="error" for="staffDate">{{$errors->first('staffDate')}}</label>
                    @else
                        <input type="text" name="staffDate" id="staffDate" class=" input-text radius " readonly  placeholder="0000-00-00">

                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">离职日期：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('leaveData'))
                        <input type="text" name="leaveData" id="leaveData" class=" input-text radius error" aria-required="true" readonly  aria-invalid="true">
                        <label id="leaveData-error" class="error" for="leaveData">{{$errors->first('leaveData')}}</label>
                    @else
                        <input type="text" name="leaveData" id="leaveData" class=" input-text radius " readonly  placeholder="0000-00-00">

                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">离职原因：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('leaveMsg'))
                        <input type="text" class="input-text radius error" value="" name="leaveMsg" aria-required="true" aria-invalid="true">
                        <label id="leaveMsg-error" class="error" for="leaveMsg">{{$errors->first('leaveMsg')}}</label>
                    @else
                         <input type="text" class="input-text radius " value="" placeholder="" name="leaveMsg" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">人事档案管理查询的权限分级：</label>
                <div class="formControls col-xs-8 col-sm-9">

                    @foreach($checkLevel as $k=>$v)

                     <div class="radio-box">
                        <input type="radio" id="radio-{{$k}}" name="checkLevel" value="{{$k}}" @if($k==0)checked="checked" @endif >
                        <label for="radio-{{$k}}">{{$v}}</label>
                      </div>

                    @endforeach

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

    //重置图片
    function deleteImage(id){
        var image = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTEwYmJhZjQzYSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MTBiYmFmNDNhIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=';
        $('.'+id).attr('src',image);

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