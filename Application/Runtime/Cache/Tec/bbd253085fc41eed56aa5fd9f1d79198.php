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
                    综合信息
                </h3>
                <ul class="side-sub-menu">
                    <li><a href="<?php echo U('Article/wait');?>" class="item">待审核</a></li>
                    <li><a href="<?php echo U('Article/set');?>" class="item">已审核</a></li>
                    <li><a href="<?php echo U('Article/search');?>" class="item">综合素质</a></li>
                    
                </ul>
            </div>
            <div class="subnav">
                <h3>
                    <i class="icon"></i>
                    学生信息
                </h3>
                <ul class="side-sub-menu">
                    <li><a href="<?php echo U('Article/setin');?>" class="item">导入信息</a></li>
                    <li><a href="<?php echo U('Article/search_info');?>" class="item">查找信息</a></li>
                </ul>
            </div>
            
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
			<div class="upinfo-form_tec">
				
                   <div class="upinfostu_tec">
						<label for="info-title" class="label">邮件</label>
						<label for="info-title" class="label"><?php echo ($email); ?></label>
						
						<label for="info-title" class="label">邮编</label>
						
						<label for="info-title" class="label"><?php echo ($zipcode); ?></label>
						<label for="info-title" class="label">手机号码</label>
						
						<label for="info-title" class="label"><?php echo ($phone); ?></label>
						<label for="info-title" class="label">家庭电话</label>
					
						<label for="info-title" class="label"><?php echo ($home_phone); ?></label>
						<label for="info-title" class="label">家庭住址</label>
					
						<label for="info-title" class="label"><?php echo ($address); ?></label>
						<label for="info-title" class="label">健康状况</label>
					
						<label for="info-title" class="label"><?php echo ($health); ?></label>
				   
				   </div>
				   <div class="upinfostu_tec">
						<label for="info-title" class="label">姓名：</label>
                      
						<label for="info-title" class="label"><?php echo ($name); ?></label>
						<label for="info-title" class="label">学号：</label>
                       
						<label for="info-title" class="label"><?php echo ($student_id); ?></label>
						<label for="info-title" class="label">专业：</label>
                      
						<label for="info-title" class="label"><?php echo ($major); ?></label>
						<label for="info-title" class="label">入学年份：</label>
                       
						<label for="info-title" class="label"><?php echo ($grade); ?></label>
						<label for="info-title" class="label">性别：</label>
                       
						<label for="info-title" class="label"><?php echo ($gender); ?></label>
						<label for="info-title" class="label">民族：</label>
                      
						<label for="info-title" class="label"><?php echo ($nation); ?></label>
				   </div>
				   <div class="upinfostu_tec">
						<label for="info-title" class="label">政治面貌：</label>
                        
						<label for="info-title" class="label"><?php echo ($political_status); ?></label>
						<label for="info-title" class="label">身份证：</label>
                       
						<label for="info-title" class="label"><?php echo ($id_card); ?></label>
						<label for="info-title" class="label">出生日期：</label>
                        
						<label for="info-title" class="label"><?php echo ($birth); ?></label>
						<label for="info-title" class="label">籍贯：</label>
                        
						<label for="info-title" class="label"><?php echo ($country); ?></label>
				   </div>
                    
                </div> 
                <form class="upinfo-form_tec" action="<?php echo U('article/setupinfo');?>" method="post">
				
                   <div class="upinfostu_tec">
						<label for="info-title" class="label">邮件</label>
						<input type="text" name="email" />
						<label for="info-title" class="label">邮编</label>
						<input type="text" name="zipcode"  />
						<label for="info-title" class="label">手机号码</label>
						<input type="text" name="phone"  />
						<label for="info-title" class="label">家庭电话</label>
						<input type="text" name="home_phone"  />
						<label for="info-title" class="label">家庭住址</label>
						<input type="text" name="address" />
						<label for="info-title" class="label">健康状况</label>
						<input type="text" name="health"  />
						<input type="submit" name="submit" value="更新资料" class="btn" />
				   
				   </div>
				   <div class="upinfostu_tec">
						<label for="info-title" class="label">姓名：</label>
                        <input type="text" name="name" />
						<label for="info-title" class="label">学号：</label>
                        <input type="text" name="student_id" />
						<label for="info-title" class="label">专业：</label>
                        <input type="text" name="major" />
						<label for="info-title" class="label">入学年份：</label>
                        <input type="text" name="grade" />
						<label for="info-title" class="label">性别：</label>
                        <input type="text" name="gender" />
						<label for="info-title" class="label">民族：</label>
                        <input type="text" name="nation" />
				   </div>
				   <div class="upinfostu_tec">
						<label for="info-title" class="label">政治面貌：</label>
                        <input type="text" name="political" />
						<label for="info-title" class="label">身份证：</label>
                        <input type="text" name="id_card" />
						<label for="info-title" class="label">出生日期：</label>
                        <input type="text" name="birth" />
						<label for="info-title" class="label">籍贯：</label>
                        <input type="text" name="country" />
				   </div>
                    
                </form> 
                
                
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