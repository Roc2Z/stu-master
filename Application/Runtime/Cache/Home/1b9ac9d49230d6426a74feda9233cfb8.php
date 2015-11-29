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
                <li><a href="<?php echo U('Article/informed');?>">内容</a></li>
                <li><a href="<?php echo U('User/upinfo');?>">用户</a></li>
            </ul>
            <!-- 用户栏 -->
            <div class="user-bar">
                <a href="javascript:;" class="user-entrance">用户</a>
                <ul class="user-menu hidden">
                    <li>你好!<em title=""><?php echo ($username); ?></em></li>
                    <li><a href="<?php echo U('User/repswd');?>">修改密码</a></li>
                    <li><a href="<?php echo U('User/upinfo');?>">更新资料</a></li>
                    <li><a href="<?php echo U('Index/index');?>">退出</a></li>
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
                    <li><a href="<?php echo U('Article/informed');?>" class="item">通知信息</a></li>
                    <li><a href="<?php echo U('Article/apply');?>" class="item">个人申请</a></li>
                    <li><a href="<?php echo U('Article/infoshow');?>" class="item">综合素质</a></li>
                    <li><a href="<?php echo U('Article/checkinfo');?>" class="item">综合素质得分</a></li>
                </ul>
            </div>
            <div class="subnav">
                <h3>
                    <i class="icon"></i>
                    回收站
                </h3>
                <ul class="side-sub-menu">
                    <li><a href="<?php echo U('Article/recycle');?>" class="item">已删除</a></li>
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
            <div class="main-title">个人申请(<?php echo ($count); ?>)</div>
            <div class="cf">
                <a href="<?php echo U('article/apply_content');?>" class="btn" style="float:right;">添加申请</a>
                <!--去掉查找框
                <a href="<?php echo U('article/delete',array('id'=>$id));?>" class="btn">删除</a>
                <div class="search" >
                    <input class="search-input" />
                    <a href="" class="search-a btn">查找</a>
                </div>
                -->
                <form action="<?php echo U('article/searchinfo');?>" method="get">
                <select name="item" style="height: 30px;">
                	<option value="0">全部</option>
                    <option value="1">第一学期</option>
                    <option value="2">第二学期</option>
                    <option value="3">第三学期</option>
                    <option value="4">第四学期</option>
                    <option value="5">第五学期</option>
                    <option value="6">第六学期</option>
                    <option value="7">第七学期</option>
                    <option value="8">第八学期</option>
                </select>
               
                    <input type="submit"  class="search-a btn" style="margin-top:-3px;" value="查找"/>
                </form>
            </div>
            <div class="data-table">
                        <table class="">
                            <thead>
                                <tr>
                                <th class="row-selected row-selected"><input class="check-all" type="checkbox"/></th>
                                <th class="">编号</th>
                                <th class="">名称</th>
                                <th class="">姓名</th>
                                <th class="">学号</th>
                                <th class="">分类</th>
                                <th class="">学期</th>
                                <th class="">年级</th>
                                <th class="">状态</th>
                                <th class="">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($moban_info)): foreach($moban_info as $key=>$one): ?><tr>
                                    <td><input class="ids" type="checkbox" name="ids[]" value="12" /></td>
                                    <td><?php echo ($one["mix_id"]); ?></td>
                                    <td><a href="<?php echo U('article/detial',array('mix_id'=>$one['mix_id']));?>"><?php echo ($one["name"]); ?></a></td>
                                    <td><span><?php echo ($one["stu_name"]); ?></span></td>
                                    <td><span><?php echo ($one["student_id"]); ?></span></td>
                                    <td><?php echo ($one["info_type"]); ?></td>
                                    <td><?php echo ($one["item"]); ?></td>
                                    <td><span><?php echo ($one["grade"]); ?></span></td>
                                    <td><span><?php echo ($one["status"]); ?></span></td>
                                    <td>
                                        <a href="<?php echo U('article/detial',array('mix_id'=>$one['mix_id']));?>" class="ajax-get">查看</a>
                                        <a href="<?php echo U('article/delete_apply',array('mix_id'=>$one['mix_id']));?>" class="confirm ajax-get">删除</a>
                                        </td>
                                        
                                    
                                </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table> 

            </div>
            <div class="page">
                <?php echo ($show); ?>
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