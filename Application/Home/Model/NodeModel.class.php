<?php
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 2017/7/15
 * Time: 8:30
 */

namespace Home\Model;

use Think\Model;

class NodeModel extends Model
{
    public function getAll($limit = 20)
    {
        return $this->where(array("status" => 1))->order("id asc")->limit($limit)->select();

    }

    public function getTreeNode()
    {
        //获取权限列表
        $nodeList = $this->getAll();
        $controllerList = array();
        foreach ($nodeList as $v) {
            $urlInfo = explode('/', $v['url']);
            if (isset($controllerList[$urlInfo[0]])) {
                $controllerList[$urlInfo[0]][] = $v;
            } else {
                $controllerList[$urlInfo[0]] = array($v);
            }
        }
        return $controllerList;
    }
}