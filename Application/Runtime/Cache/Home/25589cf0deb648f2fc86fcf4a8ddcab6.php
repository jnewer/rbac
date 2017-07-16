<?php if (!defined('THINK_PATH')) exit();?><!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="keywords" content="">
    <meta name="description" content="后台管理系统">
    <title>后台管理系统</title>
    <link rel="stylesheet" type="text/css" href="/Public/static/h-ui/css/H-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/H-ui.admin.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/lib/Hui-iconfont/1.0.8/iconfont.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/skin/default/skin.css" id="skin"/>
    <link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/style.css"/>
    
    <!--[if IE 6]>
    <script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="lib/html5.js"></script>
    <script type="text/javascript" src="lib/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!--_header 作为公共模版分离出去-->
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl">
            <a class="logo navbar-logo f-l mr-10 hidden-xs" href="">H-ui.admin</a>
            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <!--<li>超级管理员</li>-->
                    <li class="dropDown dropDown_hover"><a class="dropDown_A"><?php echo ($sessionUsername); ?><i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="<?php echo U('/Home/Login/logout');?>">退出</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->
<aside class="Hui-aside">
    <input runat="server" id="divScrollValue" type="hidden" value=""/>
    <div class="menu_dropdown bk_2">
        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="<?php echo U('/Home/Role/list');?>" data-title="角色管理">角色管理</a></li>
                    <li><a href="<?php echo U('/Home/Role/add');?>" data-title="角色添加">角色添加</a></li>
                    <li><a href="<?php echo U('/Home/Permission/list');?>" data-title="权限管理">权限管理</a></li>
                    <li><a href="<?php echo U('/Home/Permission/add');?>" data-title="权限添加">权限添加</a></li>
                    <li><a href="<?php echo U('/Home/User/list');?>" data-title="用户管理">用户管理</a></li>
                    <li><a href="<?php echo U('/Home/User/add');?>" data-title="用户添加">用户添加</a></li>
                </ul>
            </dd>
        </dl>
    </div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a>
</div>
<!--/_menu 作为公共模版分离出去-->


<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/Public/static/h-ui.admin/js/H-ui.admin.page.js"></script>
<script>
    $(function () {
        var navTitle = "<?php echo ($navTitle); ?>";
        if (navTitle) {
            $(".c-666").text(navTitle);
            var currentLiObj = $("[data-title='" + navTitle + "']").parent();
            currentLiObj.addClass("current");
            console.log(currentLiObj.parent().parent().addClass("selected"));
        }
    });
</script>

</body>
</html>

    <section class="Hui-article-box">
        <nav class="breadcrumb"><i class="Hui-iconfont"></i> <a href="/" class="maincolor">首页</a> <span
                class="c-999 en">&gt;</span><span class="c-666">角色管理</span> <a class="btn btn-success radius r"
                                                                               style="line-height:1.6em;margin-top:3px"
                                                                               href="javascript:location.replace(location.href);"
                                                                               title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a>
        </nav>
        <div class="Hui-article">
            <article class="cl pd-20">
                <div class="cl pd-5 bg-1 bk-gray">
                    <a class="btn btn-primary radius" href="add.html"><i class="Hui-iconfont">&#xe600;</i> 添加角色</a>
                    <span class="r">共有数据：<strong><?php echo (count($list)); ?></strong> 条</span></div>
                <div class="mt-10">
                    <table class="table table-border table-bordered table-hover table-bg">
                        <thead>
                        <tr>
                            <th scope="col" colspan="6">角色管理</th>
                        </tr>
                        <tr class="text-c">
                            <th width="40">ID</th>
                            <th width="200">角色名</th>
                            <th width="70">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
                                <td><?php echo ($vo["id"]); ?></td>
                                <td><?php echo ($vo["role_name"]); ?></td>
                                <td class="f-14">
                                    <a title="编辑" href="<?php echo U('/Home/Role/edit/id/'.$vo['id']);?>"><i class="Hui-iconfont">&#xe6df;</i></a>
                                    <a title="删除" href="<?php echo U('/Home/Role/delete/id/'.$vo['id']);?>"><i
                                            class="Hui-iconfont">&#xe6e2;</i></a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
            </article>
            <footer class="footer">
                <?php echo ($footerTips); ?>
            </footer>
        </div>
    </section>