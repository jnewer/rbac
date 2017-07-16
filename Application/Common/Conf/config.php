<?php
return array(
    //'配置项'=>'配置值'
    //数据库配置信息
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => 'localhost', // 服务器地址
    'DB_NAME' => 'rbac', // 数据库名
    'DB_USER' => 'root', // 用户名
    'DB_PWD' => 'root_123', // 密码
    'DB_PORT' => 3306, // 端口
    'DB_PREFIX' => '', // 数据库表前缀

    "SHOW_PAGE_TRACE"=>true,

    "nav_title_array" => array(
        "Index/index" => "欢迎页",
        "Role/list" => "角色管理",
        "Role/add" => "角色添加",
        "Role/edit" => "角色编辑",
        "Permission/list" => "权限管理",
        "Permission/add" => "权限添加",
        "Permission/edit" => "权限编辑",
        "User/list" => "用户管理",
        "User/add" => "用户添加",
        "User/edit" => "用户编辑",
    ),
    "footer_tips" => '<p>本后台系统由<a href="http://www.h-ui.net/" target="_blank" title="H-ui前端框架">H-ui前端框架</a>提供前端技术支持</p>',

);