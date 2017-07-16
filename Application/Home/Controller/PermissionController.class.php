<?php
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 2017/7/15
 * Time: 8:34
 */

namespace Home\Controller;


class PermissionController extends CommonController
{
    function _initialize()
    {
        parent::_initialize(); // 先调用父类的构造方法
        $this->model = D('node');//实例化模型
    }

    public function list()
    {
        $list = $this->model->getAll();
        $this->assign("list", $list);
//        var_dump($list);die();
        $this->display();
    }

    public function add()
    {
        $this->display();
    }

    public function addHandler()
    {
        $name = I('post.name');
        $url = I('post.url');
        $data = array();
        $data = compact('name', 'url');

        $result = $this->model->add($data);
        if ($result) {
            $this->success('添加成功！', U('/Home/Permission/list'));
            exit;
        }

        $this->error('添加失败', U('/Home/Permission/list'));
    }

    public function edit()
    {
        $id = I('get.id') + 0;
        $info = $this->model->find($id);
        $this->assign("info", $info);
        $this->display();
    }

    public function update()
    {
        $id = I('post.id');
        $name = I('post.name');
        $url = I('post.url');
        $data = compact('name', 'url');
//        var_dump($data);die();
        if ($id) {
            $result = $this->model->where(array("id" => $id))->save($data);

            if ($result) {
                $this->success('更新成功！', U('/Home/Permission/list'));
                exit;
            }
        }
        $this->error('更新失败！', U('/Home/Permission/list'));
    }

}



















