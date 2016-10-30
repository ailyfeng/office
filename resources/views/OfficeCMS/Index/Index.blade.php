@extends('officecms.layout.cms')
@section('content')

	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">后台管理</div>
			<ul>
				<li><a href="#" class="active">首页</a></li>
				<li><a href="#">管理页</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li>管理员：admin</li>
				<li><a href="pass.html" target="main">修改密码</a></li>
				<li><a href="login.html">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
            <li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>常用操作</h3>
                <ul class="sub_menu">
                    <li><a href="add.html" target="main"><i class="fa fa-fw fa-plus-square"></i>添加页</a></li>
                    <li><a href="list.html" target="main"><i class="fa fa-fw fa-list-ul"></i>列表页</a></li>
                    <li><a href="tab.html" target="main"><i class="fa fa-fw fa-list-alt"></i>tab页</a></li>
                    <li><a href="img.html" target="main"><i class="fa fa-fw fa-image"></i>图片列表</a></li>
                    <li><a href="element.html" target="main"><i class="fa fa-fw fa-tags"></i>详情</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-cog"></i>系统设置</h3>
                <ul class="sub_menu">
                    <li><a href="#" target="main"><i class="fa fa-fw fa-cubes"></i>网站配置</a></li>
                    <li><a href="#" target="main"><i class="fa fa-fw fa-database"></i>备份还原</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-thumb-tack"></i>产品管理</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('cms/supplier_list')}}" target="main"><i class="fa fa-fw fa-chain"></i>供应商管理</a></li>
                    <li><a href="{{url('cms/product_list')}}" target="main"><i class="fa fa-fw fa-font"></i>公司产品</a></li>
                    <li><a href="{{url('cms/warehouse_list')}}" target="main"><i class="fa fa-fw fa-chain"></i>库房管理</a></li>
                </ul>
            </li>
        </ul>
	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">
		<iframe src="info.html" frameborder="0" width="100%" height="100%" name="main"></iframe> 
	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->
	<div class="bottom_box">
		CopyRight © 2015. Powered By <a href="http://aily.company.com">http://aily.company.com</a>.
	</div>
	<!--底部 结束-->

@endsection