<?php

namespace Home\Controller;

use Think\Controller;

/**
 * 登录控制器
 * @package Home\Controller
 */
class LoginController extends Controller
{
    function _initialize()
    {
        $this->model = D('user');//实例化模型
    }

    /**
     * 登录展示页面
     */
    public function index()
    {
        $this->display();//加载模板
    }

    /**
     * 登录验证
     */
    public function login()
    {
        //验证用户名和密码
        $username = I('post.username');//接收用户名
        $password = I('post.password');//接收密码
        $map['username'] = $username;//根据用户名称作为条件
        $user_info = $this->model->where($map)->find();//查询用户的数据
        if (!$user_info) {
            $this->error("用户名不存在！");
            exit;
        }
        //说明用户名已经有了
        if ($user_info['password'] != md5($password)) {
            //告知用户名 密码错误
            $this->error("密码错误！");
            exit;
        }
        //此处说明用户名和密码都正确
        session("user_info", $user_info);//将用户信息放入session
        $this->success("登录成功！", U('/Home/Index/index'));
    }

    /**
     * 注销方法
     */
    public function logout()
    {
        session("user_info", null);//清空session
        session_destroy();
        $this->success("退出成功！", U('/Home/Login/index'));//退出到登录页面
    }
}