<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
        <meta charset="utf-8" />
        <title>管理系统</title>
        <link rel="stylesheet" type="text/css" href="/stu-manage/Public/css/common.css"/>
        <script src="/stu-manage/Public/js/jquery.js"></script>
        <script src="/stu-manage/Public/js/common.js"></script>

        
    <style>
        body{
            padding:50 0 0 0;
        }
    </style>

    </head>
    <body>
        <!-- 头部 -->
        <div class="header">
            <!-- logo -->
            <span class="logo"></span>
            <!-- 顶部导航 -->
            <ul class="main-nav">
                <li><a href="<?php echo U('Index/index');?>">首页</a></li>
                <li><a href="<?php echo U('Article/wait');?>">内容</a></li>
                <li><a href="<?php echo U('User/upinfo');?>">用户</a></li>
                <li><a href="<?php echo U('Sys/index');?>">系统</a></li>
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
        
        
        <!-- 内容部分-->   
        
    <div class="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display:none;">
            <button class="fixed close">X</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div class="main" id="main" >
            <div class="index-main">
                <div class="index-top">
                    <h1><?php echo ($username); ?>你好！<br/>
                        <span>欢迎登录,共有<?php echo ($count); ?>条消息记录待审核</span>
                    </h1>
                    <hr/>
                </div>
                <div class="index-contain">
                    <div class="data-table">
                        <table class="">
                            <thead>
                                <tr>
                                <th class="row-selected row-selected"><input class="check-all" type="checkbox"/></th>
                                <th class="">编号</th>
                                <th class="">标题</th>
                                <th class="">创建者</th>
                                <th class="">学号</th>
                                <th class="">分类</th>
                                <th class="">学期</th>
                                <th class="">发布时间</th>
                                <th class="">状态</th>
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
                                    <td>
                                    <span><?php echo ($one["status"]); ?></span>
                                        </td>
                                        
                                    
                                </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table> 
                        <div class="page">
                            <?php echo ($show); ?>
                        </div>  
            </div>
        </div>
        <div class="ldsn-cp">&copy;2015 LDSN, <a href="http://www.ldustu.com" style="display:inline;">鲁大学生网</a> 版权所有</div>
    </div>

        
    <script type="text/javascript">
    $('document').ready(function(){
        //导航高亮
        highlight_manNav('<?php echo U('Index/index');?>');
    });
    </script>
   
    </body>
</html>