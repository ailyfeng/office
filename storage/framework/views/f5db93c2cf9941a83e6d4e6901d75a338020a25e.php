<?php $__env->startSection('content'); ?>
<div class="page-container">
	<p class="f-20 text-success">成都欧飞仕科技贸易有限公司 <span class="f-14">v2.4</span>后台模版！</p>
	<p>登录次数：18 </p>
	<p>上次登录IP：222.35.131.79.1  上次登录时间：2014-6-14 11:19:55</p>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th colspan="7" scope="col">信息统计</th>
			</tr>
			<tr class="text-c">
				<th>统计</th>
				<th>资讯库</th>
				<th>图片库</th>
				<th>产品库</th>
				<th>用户</th>
				<th>管理员</th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<td>总数</td>
				<td>92</td>
				<td>9</td>
				<td>0</td>
				<td>8</td>
				<td>20</td>
			</tr>
			<tr class="text-c">
				<td>今日</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
			</tr>
			<tr class="text-c">
				<td>昨日</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
			</tr>
			<tr class="text-c">
				<td>本周</td>
				<td>2</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
			</tr>
			<tr class="text-c">
				<td>本月</td>
				<td>2</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
			</tr>
		</tbody>
	</table>
	<table class="table table-border table-bordered table-bg mt-20">
		<thead>
			<tr>
				<th colspan="2" scope="col">服务器信息</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th width="30%">服务器计算机名</th>
				<td><span id="lbServerName">http://127.0.0.1/</span></td>
			</tr>
			<tr>
				<td>服务器IP地址</td>
				<td><?php echo $_SERVER['SERVER_ADDR'];?></td>
			</tr>
			<tr>
				<td>服务器域名</td>
				<td><?php echo $_SERVER['SERVER_NAME'];?></td>
			</tr>
			<tr>
				<td>服务器端口 </td>
				<td><?php echo $_SERVER['SERVER_PORT'];?></td>
			</tr>
			<tr>
				<td>服务器 </td>
				<td><?PHP echo $_SERVER['SERVER_SOFTWARE'];?></td>
			</tr>
			<tr>
				<td>本文件所在文件夹 </td>
				<td><?php echo $_SERVER['DOCUMENT_ROOT'];?></td>
			</tr>
			<tr>
				<td>服务器操作系统 </td>
				<td>centos7</td>
			</tr>
			<tr>
				<td>服务器脚本超时时间 </td>
				<td><?php echo ini_get("max_execution_time");?>秒</td>
			</tr>
			<tr>
				<td>服务器的语言种类 </td>
				<td>PHP 5.6.2 (cli) (built: Oct 23 2016 15:22:32)</td>
			</tr>
			<tr>
				<td>服务器当前时间 </td>
				<td><?php echo date('Y-m-d H:i:s',time());?></td>
			</tr>
			<tr>
				<td>服务器上次启动到现在已运行 </td>
				<td><?php $arRuntime =explode(",", exec('uptime')); echo $arRuntime[0];?>分钟</td>
			</tr>
		</tbody>
	</table>
</div>
<footer class="footer mt-20">
	<div class="container">
		<p>感谢jQuery、layer、laypage、Validform、UEditor、My97DatePicker、iconfont、Datatables、WebUploaded、icheck、highcharts、bootstrap-Switch<br>
			Copyright &copy;2016 成都欧飞仕科技贸易有限公司 v.d.1.0 All Rights Reserved.<br>
			本后台系统由<a href="#" target="_blank" >成都欧飞仕科技贸易有限公司</a>技术部技术支持</p>
	</div>
</footer>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>