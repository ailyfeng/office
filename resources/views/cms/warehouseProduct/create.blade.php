@extends("cms.layouts.admin")
@section("content")

    <script src="{{asset('resources/cms/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('resources/cms/uploadify/uploadify.css')}}">

<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> <a href="{{url('cms/index/info')}}" >首页 </a><span class="c-gray en">&gt;</span> 
        <a href="javascript:;" data-title="供应商管理" _href="{{url('cms/supplier')}}" onclick="Hui_admin_tab(this)" href="javascript:;">
            库房产品管理
        </a>
        <span class="c-gray en">&gt;</span> 
        @if($warehouse)
            为“{{$warehouse->name}}” 库房添加产品
        @else
            添加库房产品
        @endif

        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <article class="page-container">
        <form action="{{url('cms/warehouseProduct')}}" method="post" class="form form-horizontal" id="formWarehouseProductAdd">
            {{csrf_field()}}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>库房：</label>
                <div class="formControls col-xs-8 col-sm-9">
                        <input type="hidden" name="warehouseId" value="{{$warehouse['warehouseId']}}" class="warehouseId">
                    @if($errors->has('warehouseId'))
                        <input type="text" class="input-text radius error" value="{{$warehouse['name']}}"  readonly="readonly" name="warehouseId_" id="warehouseId" placeholder="请选择库房" onclick="actionEdit('请选择库房','{{url('cms/warehouse?selectSupplier=1')}}&sonId=warehouseId&sonName=warehouseId','1')" aria-required="true" aria-invalid="true">
                        <label id="warehouseId-error" class="error" for="warehouseId">{{$errors->first('warehouseId')}}</label>
                    @else
                         <input type="text" class="input-text radius" value="{{$warehouse['name']}}" readonly="readonly" placeholder="请选择库房" name="warehouseId_" id="warehouseId" onclick=" actionEdit('请选择库房','{{url('cms/warehouse?selectSupplier=1')}}&sonId=warehouseId&sonName=warehouseId','1');" aria-required="true" aria-invalid="true">
                    @endif
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>公司产品：</label>
                <div class="formControls col-xs-8 col-sm-9">
                        <input type="hidden" name="productId" value="{{$warehouse['productId']}}" class="productId">
                    @if($errors->has('productId'))
                        <input type="text" class="input-text radius error" value="{{$warehouse['name']}}"  readonly="readonly" name="productId_" id="productId" placeholder="请选择库房" onclick="actionEdit('请选择库房','{{url('cms/product?selectSupplier=1')}}&sonId=productId&sonName=productId','1')" aria-required="true" aria-invalid="true">
                        <label id="productId-error" class="error" for="productId">{{$errors->first('productId')}}</label>
                    @else
                         <input type="text" class="input-text radius" value="{{$warehouse['name']}}" readonly="readonly" placeholder="请选择库房" name="productId_" id="productId" onclick=" actionEdit('请选择库房','{{url('cms/product?selectSupplier=1')}}&sonId=productId&sonName=productId','1');" aria-required="true" aria-invalid="true">
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>库存类别：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    @foreach($type as $k=>$v)
                          <div class="check-box">
                            <input type="checkbox" id="checkbox" value="{{$k}}"  @if($k==0)checked="checked" @endif  name="type[]">
                            <label for="checkbox">{{$v}}</label>
                          </div>
                    @endforeach
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>货位：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('postion'))
                        <input type="text" class="input-text radius error" value="" name="postion" aria-required="true" aria-invalid="true">
                        <label id="postion-error" class="error" for="postion">{{$errors->first('postion')}}</label>
                    @else
                         <input type="text" class="input-text radius" value="" placeholder="2-30个字符" name="postion" id="maxNum">
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">最低库存量：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('minNum'))
                        <input type="text" class="input-text radius error" value="" name="minNum" aria-required="true" aria-invalid="true">
                        <label id="minNum-error" class="error" for="minNum">{{$errors->first('minNum')}}</label>
                    @else
                         <input type="text" class="input-text radius " value="" placeholder="数字"  name="minNum" >
                    @endif
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">最高库存量：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('maxNum'))
                        <input type="text" class="input-text radius error" value="" name="maxNum" aria-required="true" aria-invalid="true">
                        <label id="maxNum-error" class="error" for="maxNum">{{$errors->first('maxNum')}}</label>
                    @else
                         <input type="text" class="input-text radius " value="" placeholder="数字"  name="maxNum" >
                    @endif
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">盘点周期：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    @if($errors->has('cycle'))
                        <input type="text" class="input-text radius error" value="" name="cycle" aria-required="true" aria-invalid="true">
                        <label id="cycle-error" class="error" for="cycle">{{$errors->first('cycle')}}</label>
                    @else
                         <input type="text" class="input-text radius " value=""  placeholder="必需是数字，以天数为单位"  name="cycle" >
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
    $('#formWarehouseProductAdd input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });
    
    $("#formWarehouseProductAdd").validate({
        //表单规则
        rules:{
            warehouseId:{
                required:true
            }, 
            productId:{
                required:true
            },
            minNum:{
                number:true
            },
            maxNum:{
                number:true
            },
            cycle:{
                number:true
            }
        },
        //表单提示信息 
        messages:{
            warehouseId:{
                required:"必须选择库房"
            },
            productId:{
                required:"必须公司产品"
            },

            minNum:{
                number:"请输入数字"
            },
            maxNum:{
                number:"请输入数字"
            },
            cycle:{
                number:"请输入数字"
            }
        }

    });
});
 

</script>

@endsection