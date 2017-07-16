<?php
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 2017/7/14
 * Time: 18:36
 */

namespace Home\Controller;

/**
 * 用户管理控制器
 * @package Home\Controller
 */
class UserController extends CommonController
{
    function _initialize()
    {
        parent::_initialize();
        $this->model = D('user');
    }

    public function list()
    {
        $userList = $this->model->getAll();
//        dd($userList);
        $this->assign("list", $userList);
        $this->display();
    }

    public function add()
    {
        $roleList = D('role')->getAll();
//        dd($roleList);
        $this->assign("roleList", $roleList);
        $this->display();
    }

    public function addHandler()
    {
        $username = I('post.username');
        $password = I('post.password');
        $roleId = I('post.role_id');
        $data['username']=$username;
        if($password){
            $data['password'] = md5($password);
        }
        $userId = $this->model->add($data);
        if($userId){
            //如果成功，则添加到role_user表
            $roleData["user_id"]=$userId;
            $roleData['role_id']=$roleId;
            $result=D('role_user')->add($roleData);
            if($result){
                $this->success('添加成功！',U('/Home/User/list'));exit;
            }
        }

        $this->error('添加失败',U('/Home/User/list'));


    }

    public function edit()
    {
        $id = I('get.id')+0;
        $info=$this->model->find($id);
        $roleId = D('role_user')->where(array("status"=>1,"user_id"=>$info['id']))->getField("role_id");
//        dd($roleId);
        $info['role_id'] = $roleId;
//        dd($info);
        $this->assign('info',$info);
        $roleList = D('role')->getAll();
//        dd($roleList);
        $this->assign("roleList", $roleList);
        $this->display();
    }

    public function update()
    {
        $userId=I('post.id');
        $username=I('post.username');
        $password=I('post.password');
        $roleId = I('post.role_id');
//        dd($roleId);
        $data['username'] = $username;
        if($password){
            $data['password'] = md5($password);
        }
//        dd($data);
        if($userId){
            $editResult=$this->model->where(array("id"=>$userId))->save($data);
//            dd($editResult);
            if($editResult){
                //检查用户的角色是否改变
                $updateResult=D('role_user')->where(array("user_id"=>$userId,"status"=>1))->save(array("role_id"=>$roleId));
                $this->success("用户更新成功！",U('/Home/User/list'));exit;
            }
            $this->error("更新失败！",U('/Home/User/list'));
        }
    }
}













