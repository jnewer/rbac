<?php if (!defined('THINK_PATH')) {
	exit();
}
?> <!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/Public/static/h-ui.admin/js/H-ui.admin.page.js"></script>
<!--/_footer /作为公共模版分离出去-->
<title>后台管理系统</title>
<meta name="keywords" content="">
<meta name="description" content="后台管理系统">
</head>
<body>
<!--_header 作为公共模版分离出去-->
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl">
            <a class="logo navbar-logo f-l mr-10 hidden-xs" href="">H-ui.admin</a>
            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <li>超级管理员</li>
                    <li class="dropDown dropDown_hover"> <a class="dropDown_A"><?php echo ($sessionUsername); ?><i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="<?php echo U('/Home/Login/logout'); ?>">退出</a></li>
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
    <input runat="server" id="divScrollValue" type="hidden" value="" />
    <div class="menu_dropdown bk_2">
        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="<?php echo U('/Home/Role/list'); ?>" data-title="角色管理">角色管理</a></li>
                    <li><a href="<?php echo U('/Home/Role/add'); ?>" data-title="角色添加">角色添加</a></li>
                    <li><a href="<?php echo U('/Home/Permission/list'); ?>" data-title="权限管理">权限管理</a></li>
                    <li><a href="<?php echo U('/Home/Permission/add'); ?>" data-title="权限添加">权限添加</a></li>
                    <li><a href="<?php echo U('/Home/User/list'); ?>" data-title="用户管理">用户管理</a></li>
                    <li><a href="<?php echo U('/Home/User/add'); ?>" data-title="用户添加">用户添加</a></li>
                </ul>
            </dd>
        </dl>
    </div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<!--/_menu 作为公共模版分离出去-->






<script>
    $(function(){
        var nav_title="<?php echo ($nav_title); ?>";
        if(nav_title)
        {
            $(".c-666").text(nav_title);
            var now_title=nav_title;
            var current_li_obj=$("[data-title='"+now_title+"']").parent();
            current_li_obj.addClass("current");
            current_li_obj.parent().parent().addClass("selected");

        }
    });
</script>

</body>
</html>



    <section class="Hui-article-box">
        <nav class="breadcrumb"><i class="Hui-iconfont"></i> <a href="/" class="maincolor">首页</a> <span
                class="c-999 en">&gt;</span><span class="c-666">角色编辑</span> <a class="btn btn-success radius r"
                                                                               style="line-height:1.6em;margin-top:3px"
                                                                               href="javascript:location.replace(location.href);"
                                                                               title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a>
        </nav>
        <div class="Hui-article">
            <article class="cl pd-20">
                <form action="<?php echo U('/Home/Role/update'); ?>" method="post" class="form form-horizontal"
                      id="form-admin-role-add">
                    <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名称：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="<?php echo ($info["role_name"]); ?>" placeholder="" id="role_name"
                                   name="role_name" datatype="*4-16" nullmsg="用户账户不能为空">
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-3">节点权限：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <?php if (is_array($nodeTree)): $i = 0;
	$__LIST__ = $nodeTree;if (count($__LIST__) == 0): echo "";else:foreach ($__LIST__ as $key => $vo): $mod = ($i % 2); ++$i;?><dl class="permission-list">
			                                    <dt>
			                                        <label>
			                                            <input type="checkbox" value="" name="user-Character-0"
			                                                   id="user-Character-0">
			                                            <?php echo ($key); ?>
			                                        </label>
			                                    </dt>
			                                    <dd>
			                                        <dl class="cl permission-list2">
			                                            <?php if (is_array($vo)): $i = 0;
				$__LIST__ = $vo;if (count($__LIST__) == 0): echo "";else:foreach ($__LIST__ as $key => $v): $mod = ($i % 2); ++$i;?><dt>
						                                                    <label class="">
						                                                        <input
						                                                        <?php if (in_array($v['id'], $ownNodeList)): ?>checked="checked"<?php endif;?>
					                                                        type="checkbox" value="<?php echo ($v["id"]); ?>" name="node_id[]"><?php echo ($v["name"]); ?>
					                                                    </label>
					                                                </dt><?php endforeach;endif;else:echo "";endif;?>
		                                        </dl>
		                                    </dd>
		                                </dl><?php endforeach;endif;else:echo "";endif;?>
                        </div>
                    </div>
                    <div class="row cl">
                        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                            <button type="submit" class="btn btn-success radius"><i class="icon-ok"></i> 确定</button>
                        </div>
                    </div>
                </form>
            </article>
            <footer class="footer">
                {$footerTips}
            </footer>
        </div>
    </section>
    <script type="text/javascript">
        $(function(){
            $(".permission-list dt input:checkbox").click(function(){
                $(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
            });
        });
    </script>