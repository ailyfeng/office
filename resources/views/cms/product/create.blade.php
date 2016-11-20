@extends("cms.layouts.admin")
@section("content")

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 公司产品 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

    <article class="page-container">
        <form class="form form-horizontal" id="form-article-add">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章标题：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="" name="">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">简略标题：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="" name="">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类栏目：</label>
                <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
                    <select name="" class="select">
                        <option value="0">全部栏目</option>
                        <option value="1">新闻资讯</option>
                        <option value="11">├行业动态</option>
                        <option value="12">├行业资讯</option>
                        <option value="13">├行业新闻</option>
                    </select>
                    </span> </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章类型：</label>
                <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
                    <select name="" class="select">
                        <option value="0">全部类型</option>
                        <option value="1">帮助说明</option>
                        <option value="2">新闻资讯</option>
                    </select>
                    </span> </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">排序值：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="0" placeholder="" id="" name="">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">关键词：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="" name="">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">文章摘要：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <textarea name="" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,200)"></textarea>
                    <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">文章作者：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="0" placeholder="" id="" name="">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">文章来源：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="0" placeholder="" id="" name="">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">允许评论：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <div class="check-box">
                        <input type="checkbox" id="checkbox-pinglun">
                        <label for="checkbox-pinglun">&nbsp;</label>
                    </div>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">评论开始日期：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss',maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" id="datemin" class="input-text Wdate">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">评论结束日期：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss',minDate:'#F{$dp.$D(\'datemin\')}'})" id="datemax" class="input-text Wdate">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">使用独立模版：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <div class="check-box">
                        <input type="checkbox" id="checkbox-moban">
                        <label for="checkbox-moban">&nbsp;</label>
                    </div>
                    <button onClick="mobanxuanze()" class="btn btn-default radius ml-10">选择模版</button>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">缩略图：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <div class="uploader-thum-container">
                        <div id="fileList" class="uploader-list"></div>
                        <div id="filePicker">选择图片</div>
                        <button id="btn-star" class="btn btn-default btn-uploadstar radius ml-10">开始上传</button>
                    </div>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">文章内容：</label>
                <div class="formControls col-xs-8 col-sm-9"> 
                    <script id="editor" type="text/plain" style="width:100%;height:400px;"></script> 
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                    <button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</button>
                    <button onClick="article_save();" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存草稿</button>
                    <button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
                </div>
            </div>
        </form>
    </article>
</div>
@endsection