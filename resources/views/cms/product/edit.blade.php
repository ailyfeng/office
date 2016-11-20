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
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="javascript:void();" onclick="location.reload();"><i class="fa fa-refresh"></i>更新网页</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('cms/product/'.$data->productId)}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="130"><i class="require">*</i>供应商：</th>
                        <td>
                            <select name="supplierId">
                                <option value="12">==请选择==</option>
                                <option value="1">微软</option>
                                <option value="2">华为</option>
                                <option value="3">思科</option>
                                <option value="4">百度</option>
                            </select>
                            @if($errors->has('supplierId'))
                                <i class="require"> {{$errors->first('supplierId')}}</i>
                            @else
                                <span>此项需要点击按钮后弹出框中搜索供应商选择后自动填充在这里</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>辅助供应商：</th>
                        <td>
                            <select name="supplierIdExt">
                                <option value="0">==请选择==</option>
                                <option value="19">微软</option>
                                <option value="20">华为</option>
                                <option value="20">思科</option>
                                <option value="20">百度</option>
                            </select>
                            <span>此项需要点击按钮后弹出框中搜索供应商选择后自动填充在这里</span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>品牌(中文)：</th>
                        <td>
                            <input type="text" class="lg" name="chineseBrand" value="{{$data->chineseBrand}}">

                            @if($errors->has('chineseBrand'))
                                <i class="require"> {{$errors->first('chineseBrand')}}</i>
                            @else
                                <span>2-30个汉字</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>品牌(英文)</th>
                        <td>
                            <input type="text" class="lg" name="englishBrand" value="{{$data->englishBrand}}">
                            @if($errors->has('englishBrand'))
                                <i class="require"> {{$errors->first('englishBrand')}}</i>
                            @else
                                <span>5-100个字符</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>品名</th>
                        <td>
                            <input type="text" class="lg" name="brandName" value="{{$data->brandName}}">
                            @if($errors->has('brandName'))
                                <i class="require"> {{$errors->first('brandName')}}</i>
                            @else
                                <span>5-100个字符</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>货号</th>
                        <td>
                            <input type="text" class="mg" name="number"  value="{{$data->number}}">
                            @if($errors->has('number'))
                                <i class="require"> {{$errors->first('number')}}</i>
                            @else
                                <span>该产品上(或外包装上)标示的货号</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>简要规格</th>
                        <td>
                            <textarea class="mg" name="standard">{{$data->standard}}</textarea>
                            @if($errors->has('standard'))
                                <i class="require"> {{$errors->first('standard')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>颜色：</th>
                        <td>
                            <input type="text" name="color" value="{{$data->color}}">
                            @if($errors->has('color'))
                                <i class="require"> {{$errors->first('color')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>单位：</th>
                        <td>
                            <input type="text" name="unit" class="sm" value="{{$data->unit}}">
                            @if($errors->has('unit'))
                                <i class="require"> {{$errors->first('unit')}}</i>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>最小包规计算数量：</th>
                        <td>
                            <input type="text" name="packageNum" class="sm" value="{{$data->packageNum}}">
                            @if($errors->has('packageNum'))
                                <i class="require"> {{$errors->first('packageNum')}}</i>
                            @else
                                <span>用于计算拿货时最小包装的数量,如:要进24支笔此处数量为12时(即12支/盒)则计为2盒_ 每盒数量</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>最小包规单位：</th>
                        <td>
                            <input type="text" name="packageUnit" class="sm" placeholder="1" value="{{$data->packageUnit}}">
                            @if($errors->has('packageUnit'))
                                <i class="require"> {{$errors->first('packageUnit')}}</i>
                            @else
                                <span>一包，一件。。。。如果单个，就不用填写</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>类别：</th>
                        <td>
                            <select name="type">
                                @foreach($type as $k=>$v)

                                <option value="{{$k}}" @if ($k==$data->type) selected @endif>{{$v}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                                <i class="require"> {{$errors->first('type')}}</i>
                            @else
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>包规：</th>
                        <td>
                            <input type="text" name="packageRules" class="sm"  value="{{$data->packageRules}}">
                            @if($errors->has('packageRules'))
                                <i class="require"> {{$errors->first('packageRules')}}</i>
                            @else
                                <span>该产品的小包装,中包装,大包装的规格数量</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>产品详细描述：</th>
                        <td>
                            <textarea class="lg" name="description">{{$data->packageRules}}</textarea>
                            @if($errors->has('description'))
                                <i class="require"> {{$errors->first('description')}}</i>
                            @else
                                <p>详细规格和对该产品使用方法的说明,以及对该产品的描述</p>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>产品效期：</th>
                        <td>
                            <input type="text" name="expiration" value="{{$data->expiration}}">
                            @if($errors->has('expiration'))
                                <i class="require"> {{$errors->first('expiration')}}</i>
                            @else
                                <span>即该产品的保质期</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>进货单价：</th>
                        <td>
                            <input type="text" class="md" name="stockPrice" placeholder="0000.00" value="{{$data->stockPrice}}">元
                            @if($errors->has('stockPrice'))
                                <i class="require"> {{$errors->first('stockPrice')}}</i>
                            @else
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>成本单价：</th>
                        <td>
                            <input type="text" class="md" name="costPrice" placeholder="0000.00" value="{{$data->costPrice}}">元
                            @if($errors->has('costPrice'))
                                <i class="require"> {{$errors->first('costPrice')}}</i>
                            @else
                                <span><i class="fa fa-exclamation-circle yellow"></i>直接进货价加采管成本后的价格</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>标准售价：</th>
                        <td>
                            <input type="text" class="md" name="standardPrice" placeholder="0000.00" value="{{$data->standardPrice}}">元
                            @if($errors->has('standardPrice'))
                                <i class="require"> {{$errors->first('standardPrice')}}</i>
                            @else
                                <span><i class="fa fa-exclamation-circle yellow"></i>针对未分级客户或标准级客户的售价</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>分类售价一：</th>
                        <td>
                            <input type="text" class="md" name="oneTypePrice" placeholder="0000.00" value="{{$data->oneTypePrice}}">元
                            @if($errors->has('oneTypePrice'))
                                <i class="require"> {{$errors->first('oneTypePrice')}}</i>
                            @else
                                <span><i class="fa fa-exclamation-circle yellow"></i>针对分级客户的售价</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>分类售价二：</th>
                        <td>
                            <input type="text" class="md" name="twoTypePrice" placeholder="0000.00" value="{{$data->twoTypePrice}}">元
                            @if($errors->has('twoTypePrice'))
                                <i class="require"> {{$errors->first('twoTypePrice')}}</i>
                            @else
                                <span><i class="fa fa-exclamation-circle yellow"></i>针对分级客户的售价</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>条形码：</th>
                        <td>
                            <input type="text" name="barCode" value="{{$data->barCode}}">
                            <input id="barCode_upload" name="barCode_upload" type="file" multiple="true">

                            <script type="text/javascript">
                                <?php $timestamp = time();?>
                                $(function() {
                                    $('#barCode_upload').uploadify({
                                        'buttonText' : '图片上传',
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                            '_token'     : "{{csrf_token()}}",
                                        },
                                        'swf'      : "{{asset('resources/OfficeCMS/uploadify/uploadify.swf')}}",
                                        'uploader' : "{{url('cms/upload')}}",
                                        'onUploadSuccess' : function(file, data, response) {
                                            $('input[name=barCode]').val(data);
                                           // $('#art_thumb_img').attr('src','/'+data);
                                        }

                                    });
                                });
                            </script>
                            @if($errors->has('barCode'))
                                <i class="require"> {{$errors->first('barCode')}}</i>
                            @else
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>二维码：</th>
                        <td>
                            <input type="text" name="qrCode" value="{{$data->qrCode}}">
                            <input id="qrCode_upload" name="qrCode_upload" type="file" multiple="true">

                            <script type="text/javascript">
                                <?php $timestamp = time();?>
                                $(function() {
                                    $('#qrCode_upload').uploadify({
                                        'buttonText' : '图片上传',
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                            '_token'     : "{{csrf_token()}}",
                                        },
                                        'swf'      : "{{asset('resources/OfficeCMS/uploadify/uploadify.swf')}}",
                                        'uploader' : "{{url('cms/upload')}}",
                                        'onUploadSuccess' : function(file, data, response) {
                                            $('input[name=qrCode]').val(data);
                                            // $('#art_thumb_img').attr('src','/'+data);
                                        }

                                    });
                                });
                            </script>
                            @if($errors->has('qrCode'))
                                <i class="require"> {{$errors->first('qrCode')}}</i>
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