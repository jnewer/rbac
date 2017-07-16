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
                class="c-999 en">&gt;</span><span class="c-666">用户编辑</span> <a class="btn btn-success radius r"
                                                                               style="line-height:1.6em;margin-top:3px"
                                                                               href="javascript:location.replace(location.href);"
                                                                               title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a>
        </nav>
        <div class="Hui-article">
            <article class="cl pd-20">
                <form action="<?php echo U('/Home/User/update');?>" method="post" class="form form-horizontal"
                      id="form-admin-add">
                    <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="<?php echo ($info["username"]); ?>" placeholder="" id="username"
                                   name="username">
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="password" class="input-text" autocomplete="off" value="" placeholder="密码"
                                   id="password" name="password">
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-3">角色：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                        <span class="select-box" style="width:150px;">
                            <select class="select" name="role_id" size="1">
                                <!--<option value="">选择分类</option>-->
                                <?php if(is_array($roleList)): $i = 0; $__LIST__ = $roleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if($vo["id"] == $info['role_id']): ?>selected<?php endif; ?> value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["role_name"]); ?>
                                    </option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </span>
                        </div>
                    </div>
                    <div class="row cl">
                        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                            <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                        </div>
                    </div>
                </form>
            </article>
            <footer class="footer">
                <?php echo ($footerTips); ?>
            </footer>
        </div>
    </section>