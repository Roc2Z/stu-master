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
                    
                </ul>
            </div>
            <div class="subnav">
                <h3>
                    <i class="icon"></i>
                    学生信息
                </h3>
                <ul class="side-sub-menu">
                    <li><a href="<?php echo U('Article/setin');?>" class="item">导入信息</a></li>
                    <li><a href="<?php echo U('Article/search');?>" class="item">查找信息</a></li>
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
            <div class="main-title">已审核(<?php echo ($num); ?>)</div>
            <div class="cf">
                <a href="" class="btn">回复</a>
                <a href="" class="btn">彻底删除</a>
            </div>
            <div class="data-table">
                        <table class="">
                            <thead>
                                <tr>
                                <th class="row-selected row-selected"><input class="check-all" type="checkbox"/></th>
                                <th class="">编号</th>
                                <th class="">标题</th>
                                <th class="">创建者</th>
                                <th class="">类型</th>
                                <th class="">分类</th>
                                <th class="">发布时间</th>
                                <th class="">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input class="ids" type="checkbox" name="ids[]" value="12" /></td>
                                    <td>12 </td>
                                    <td><a href="<?php echo U('article/content',array('id'=>$id));?>">gsregrs</a></td>
                                    <td><span>aaa</span></td>
                                    <td><span>默认分类</span></td>
                                    <td>0</td>
                                    <td><span>2015-05-03 09:20</span></td>
                                    <td>
                                        <a href="<?php echo U('article/wait');?>/status/0/id/<?php echo ($id); ?>" class="ajax-get">取消</a>
                                        
                                        <a href="<?php echo U('article/wait');?>/id/<?php echo ($id); ?>" class="confirm ajax-get">恢复</a>
                                        </td>
                                </tr>
                            </tbody>
                        </table> 

            </div>
            <div class="page"></div>
        </div>
        <div class="ldsn-cp">&copy;2015 LDSN, <a href="http://www.ldustu.com" style="display:inline;">鲁大学生网</a> 版权所有</div>
    </div>

        
	<script type="text/javascript">
	$('document').ready(function(){
		//导航高亮
       	highlight_subNav('<?php echo U('Article/recycle');?>');
	});
	</script>
   
    </body>
</html>