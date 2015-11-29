<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
        <meta charset="utf-8" />
        <title>管理系统</title>
        <link rel="stylesheet" type="text/css" href="/stu-manage/Public/css/common.css"/>
        <script src="/stu-manage/Public/js/jquery.js"></script>
        <script src="/stu-manage/Public/js/common.js"></script>

        
    </head>
    <body>
        <!-- 头部 -->
        <div class="header">
            <!-- logo -->
            <span class="logo"></span>
            <!-- 顶部导航 -->
            <ul class="main-nav">
                <li><a href="<?php echo U('Index/index1');?>">首页</a></li>
                <li><a href="<?php echo U('Article/wait');?>">内容</a></li>
                <li><a href="<?php echo U('User/upinfo');?>">用户</a></li>
                
            </ul>
            <!-- 用户栏 -->
            <div class="user-bar">
                <a href="javascript:;" class="user-entrance">用户</a>
                <ul class="user-menu hidden">
                    <li>你好!<em title=""><?php echo ($name); ?></em></li>
                    <li><a href="<?php echo U('User/repswd');?>">修改密码</a></li>
                    <li><a href="<?php echo U('User/upinfo');?>">更新资料</a></li>
                    <li><a href="<?php echo U('Login/logout');?>">退出</a></li>
                </ul>
            </div>
        </div>
        <!-- /头部 -->
        <!-- 侧边栏 -->
        
	        <div class="sideleft">
            <div class="subnav">
                <h3>
                    <i class="icon"></i>
                    个人中心
                </h3>
                <ul class="side-sub-menu">
                    <li><a href="<?php echo U('User/upinfo');?>" class="item">更新资料</a></li>
                    <li><a href="<?php echo U('User/repswd');?>" class="item">更改密码</a></li>
                </ul>
            </div>
<!--             <div class="subnav">
                <h3>
                    <i class="icon"></i>
                    个人中心
                </h3>
                <ul class="side-sub-menu">
                    <li><a href="" class="item">我的文档</a></li>
                    <li><a href="" class="item">草稿箱</a></li>
                </ul>
            </div> -->
        </div>
        <!-- /侧边栏 -->

        <!-- 内容部分-->   
        
    <div class="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display:none;">
            <button class="fixed close">X</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div class="main">
            <div class="main-title">修改个人资料</div>
            <div class="main-upinfo">
                <form class="upinfo-form" action="<?php echo U('artical/setupinfo');?>" method="post">
                    <label for="info-title" class="label"><?php echo ($name); ?>你好</label>
                    <label for="info-title" class="label">邮件</label>
                    <input type="text" name="email" value="<?php echo ($email); ?>"/>
                    <label for="info-title" class="label">邮编</label>
                    <input type="text" name="zipcode"  value="<?php echo ($zipcode); ?>"/>
                    <label for="info-title" class="label">手机号码</label>
                    <input type="text" name="phone"  value="<?php echo ($phone); ?>"/>
                    <label for="info-title" class="label">家庭电话</label>
                    <input type="text" name="home_phone"  value="<?php echo ($home_phone); ?>"/>
                    <label for="info-title" class="label">家庭住址</label>
                    <input type="text" name="address"  value="<?php echo ($address); ?>"/>
                    <label for="info-title" class="label">健康状况</label>
                    <input type="text" name="health"  value="<?php echo ($health); ?>"/>
                    <input type="submit" name="submit" value="更新资料" class="btn" />
                </form> 
                
                <div class="upinfo-right">
                	
                    <div>
                        <label for="info-title" class="label">姓名：</label>
                        <input type="text" name="email" value="<?php echo ($name); ?>"/>
                    </div>
                    <div>
                        <label for="info-title" class="label">学号：</label>
                        <input type="text" name="email" value="<?php echo ($student_id); ?>"/>
                    </div>
                    <div>
                        <label for="info-title" class="label">专业：</label>
                        <input type="text" name="email" value="<?php echo ($major); ?>"/>
                    </div>
                    <div>
                        <label for="info-title" class="label">入学年份：</label>
                        <input type="text" name="email" value="<?php echo ($grade); ?>"/>
                        
                    </div>
                    <div>
                        <label for="info-title" class="label">性别：</label>
                        <input type="text" name="email" value="<?php echo ($gender); ?>"/>
                        
                    </div>
                    <div>
                        <label for="info-title" class="label">民族：</label>
                        <input type="text" name="email" value="<?php echo ($nation); ?>"/>
                        
                    </div>
                    
                    
                    
                    
                </div>
                <div class="upinfo-right">
                	
                	<div>
                        <label for="info-title" class="label">政治面貌：</label>
                        <input type="text" name="email" value="<?php echo ($political_status); ?>"/>
                    </div>
                    <div>
                        <label for="info-title" class="label">身份证：</label>
                        <input type="text" name="email" value="<?php echo ($id_card); ?>"/>
                    </div>
                    <div>
                        <label for="info-title" class="label">出生日期：</label>
                        <input type="text" name="email" value="<?php echo ($birth); ?>"/>
                    </div>
                    <div>
                        <label for="info-title" class="label">籍贯：</label>
                        <input type="text" name="email" value="<?php echo ($country); ?>"/>
                    </div>
                    
                	
                </div>
            </div>
        </div>
        <div class="ldsn-cp">&copy;2015 LDSN, <a href="http://www.ldustu.com" style="display:inline;">鲁大学生网</a> 版权所有</div>
    </div>

        
	<script type="text/javascript">
	$('document').ready(function(){
		//导航高亮
       	highlight_subNav('<?php echo U('Article/search');?>');
	});
	</script>
   
    </body>
</html>