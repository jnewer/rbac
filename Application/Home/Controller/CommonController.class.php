<?php
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 2017/7/14
 * Time: 18:51
 */

namespace Home\Controller;

use Think\Controller;

/**
 * 公共控制器
 * @package Home\Controller
 */
class CommonController extends Controller
{
    function _initialize()
    {
        $session = session("user_info");
        if (empty($session)) {
            $this->error("请先登录！", U('/Home/Login/index'));
        }

        $userId = session('user_info.id');
        $this->assign('sessionUsername', session('user_info.username'));

        $url = CONTROLLER_NAME . '/' . ACTION_NAME;
        $map = array(
            "url" => $url,
            "status" => 1
        );
        $isUsedNode = D('node')->where($map)->find();
//        dd($isUsedNode);
        if ($isUsedNode) {
            $nodeId = $isUsedNode['id'];
            $roleInfo = D('role_user')->where(array("user_id" => $userId, "status" => 1))->find();
//            dd($roleInfo);
            $accessMap = array(
                "role_id" => $roleInfo['role_id'],
                "node_id" => $nodeId,
                "status" => 1
            );
            $accessInfo = D('access')->where($accessMap)->find();
//            dd($accessInfo);
            if ($accessInfo) {
                //通过
            } else {
                die("no access!");
            }
        }

        $navTitleArray=C('nav_title_array');//获取导航配置数组
        $navTitle = $navTitleArray[$url];
        $this->assign('navTitle',$navTitle);//赋值导航
        $this->assign('footerTips',C('footer_tips'));//赋值页脚信息

    }
}