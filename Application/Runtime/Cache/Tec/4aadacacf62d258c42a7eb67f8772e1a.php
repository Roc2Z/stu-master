<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<meta charset="utf-8">
		<title>管理员登录页面</title>
        <style type="text/css">
		*{
			padding:0;
			margin:0;
			}
        .myform{
			width:30%;
			height:200px;
			border:2px #0cf solid;
			margin:auto;
			margin-top:150px;
			padding-top:30px;
			}
		.user_txt{
			display:block;
			width:100%;
			height:40px;
			font-size:16px;
			font-weight:normal;
			line-height:40px;
			padding-left:50%;
			margin-left:-140px;		
		}
		#user_button{
			margin-top:20px;
		}	
        
        </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
		<form class="myform" action="/stu-manage/index.php/Tec/User/login" method="post">
			<span class="user_txt">账号：<input type="txt" name="account" placeholder="请输入账号"/></span>
			<span class="user_txt">密码：<input type="password" name="password" placeholder="请输入密码"/></span>
			<span class="user_txt" id="user_button"><input type="submit" name="submit" value="登录" class="submit"><span>
        
        
        	</form>
	</body>
</html>