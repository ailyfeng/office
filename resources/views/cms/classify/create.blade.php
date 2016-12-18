@extends("cms.layouts.admin")
@section("content")

    <script src="{{asset('resources/OfficeCMS/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('resources/OfficeCMS/uploadify/uploadify.css')}}">

<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> <a href="{{url('cms/index/info')}}" >首页 </a><span class="c-gray en">&gt;</span> 
        <a href="javascript:;" data-title="库房管理" _href="{{url('cms/classily')}}" onclick="Hui_admin_tab(this)" href="javascript:;">
            分类管理
        </a>
        <span class="c-gray en">&gt;</span> 
        添加分类 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <article class="page-container">
        <form action="{{url('cms/classify')}}" method="post" class="form form-horizontal" id="formClassilyAdd">
            {{csrf_field()}}

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>父级：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('parentId'))
                        <input type="text" class="input-text radius error" value="" name="area" aria-required="true" aria-invalid="true">
                             <span class="select-box radius ">
                              <select class="select radius error" size="1" name="parentId" aria-required="true" aria-invalid="true">
                                <option value="0" selected>顶级分类</option>
                                @foreach($parentData as $list)
                                    <option value="{{$list->id}}" @if($data['id']==$list->id) selected="selected" @endif >{{$list->name}}</option>
                                @endforeach

                              </select>
                            </span>
                        <label id="parentId-error" class="error" for="parentId">{{$errors->first('parentId')}}</label>
                    @else
                             <span class="select-box radius ">
                              <select class="input-text radius" size="1" name="parentId">
                                <option value="0" selected>顶级分类</option>
                                @foreach($parentData as $list)
                                    <option value="{{$list->id}}" @if($data['id']==$list->id) selected="selected" @endif ><?php $sunNum = substr_count($list->sort,'-'); for($i=0;$i<$sunNum;$i++){echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";} ?>{{$list->name}}</option>
                                @endforeach
                              </select>
                            </span>
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('name'))
                        <input type="text" class="input-text radius error " value="" name="name" aria-required="true" aria-invalid="true">
                        <label id="name-error" class="error" for="name">{{$errors->first('name')}}</label>
                    @else
                         <input type="text" class="input-text radius" value="" placeholder="5-100个字符" name="name" >
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
    $('#formClassilyAdd input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });

    $("#formClassilyAdd").validate({
        //表单规则
        rules:{
            name:{
                required:true,
                maxlength:10
            }
            parentId:{
                required:true,
                number:true
            }

        },
        //表单提示信息 
        messages:{
            name:{
                required:"必须填写分类名称",
                minlength:"最小为2位",
                maxlength:"最大为10位"
            }
            parentId:{
                required:"必须填写库房地址",
                number:"最大为30位"
            }
        }

    });
});

</script>

@endsection