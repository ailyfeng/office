<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('resources/officecms/style/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('resources/OfficeCMS/style/font/css/font-awesome.min.css')}}">
    <style>
        .logoLogin{
            width: 60px;
            height:80px;
        }
    </style>
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1><img src="{{asset('resources/OfficeCMS/images/logo.png')}}" class="logoLogin"> </h1>
		<h2>欢迎使用管理平台</h2>
		<div class="form">
			<p style="color:red">用户名错误</p>
			<form action="index.html" method="post">
				<ul>
					<li>
					<input type="text" name="username" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="password" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="#" alt="">
					</li>
					<li>
						<input type="submit" value="立即登陆"/>
					</li>
				</ul>
			</form>
			<p><a href="#">返回首页</a> &copy; 2016 Powered by <a href="{{env('APP_URL')}}" target="_blank">{{env('APP_URL')}}</a></p>
		</div>
	</div>
</body>
</html>