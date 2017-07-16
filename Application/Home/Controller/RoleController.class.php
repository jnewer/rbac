<?php
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 2017/7/14
 * Time: 17:48
 */

namespace Home\Controller;

/**
 * 角色管理控制器
 * @package Home\Controller
 */
class RoleController extends CommonController
{
    private $userId=0;
    function _initialize()
    {
        parent::_initialize();
        $this->model = D('role');
        $this->userId=session("user_info.id");//从session里获取用户id
    }

    public function index()
    {
        $this->display();
    }

    public function list()
    {
        $roleList = $this->model->getAll();
//        dd($roleList);
        $this->assign("list", $roleList);
        $this->display();
    }

    public function add()
    {
        $nodeTree = D('node')->getTreeNode();
//        var_dump($nodeTree);die();
        $this->assign('nodeTree', $nodeTree);
        $this->display();
    }

    public function addHandler()
    {
        $roleName = I("post.role_name");
        $nodeIdList = I("post.node_id");
//        dd($nodeIdList);
        $access = D('access');
        $roleId = $this->model->add(array("role_name"=>$roleName));
//        dd($roleId);
        if ($roleId) {
            foreach ($nodeIdList as $v) {
                $roleAccess[] = array(
                    "node_id" => $v,
                    "role_id" => $roleId,
                    "status" => 1
                );
            }
            $result = $access->addAll($roleAccess);
            if ($result) {
                $this->success('角色添加成功！', U('/Home/Role/list'));
                exit();
            } else {
                $this->error('权限添加失败！');
            }
        }
        $this->error('角色添加失败！', U('/Home/Role/list'));
    }

    public function edit()
    {
        $id = I('get.id')+0;
        $info=$this->model->find($id);
//        dd($info);
        $this->assign('info',$info);
        $nodeTree = D('node')->getTreeNode();
//        dd($nodeTree);
        $this->assign('nodeTree', $nodeTree);
        $ownNodeList = $this->getOwnNodeList($info['id']);
//        dd($ownNodeList);
        $this->assign('ownNodeList',$ownNodeList);
        $this->display();
    }

    public function update()
    {
        $id = I("post.id");
        $roleName = I("post.role_name");
        $nodeIdList = I("post.node_id");
        $data=array();
        $data['role_name']=$roleName;
        $access=D('access');
        if($id){
            //更新角色
            $editResult=$this->model->where(array("id"=>$id))->save($data);
                if($editResult!==false){
                    //角色名称更新成功，开始更新权限
                    //先删除原有权限，可以将status选项置为0
                    $removeOldPermission = $access->where(array("role_id"=>$id))->save(array("status"=>0));
//                    dd($removeOldPermission);
                    if($removeOldPermission){
                        //添加现有权限
                        $addedAccess = array();
                        foreach ($nodeIdList as $v) {
                            $findInfo=$access->where(array("role_id"=>$id,"node_id"=>$v))->find();
                            if($findInfo){
                                if($findInfo['status']!=1){
                                    //若表中存在，则只需将其status置为1
                                    $access->where(array("id"=>$findInfo['id']))->save(array("status"=>1));
                                }
                            }else{
                                //若表中不存在，则进行新增
                                $addedAccess[]=array(
                                    "node_id"=>$v,
                                    "role_id"=>$id,
                                    "status"=>1
                                );
                            }
                        }
                        if($addedAccess){
                            $result=$access->addAll($addedAccess);
                        }
                    }
                }
                $this->success('更新成功！',U('/Home/Role/list'));
                exit();

        }else{
            $this->error('更新失败！',('/Home/Role/list'));
        }
    }

    public function delete()
    {
        $id = I("get.id", 0) + 0;
        if ($id < 0) {
            $this->error("传参不正确！");
        }

        $result = $this->model->where(array("id" => $id))->delete();
        if ($result) {
            $this->success("删除成功！", U('/Home/Role/list'));
        } else {
            $this->error("删除失败！");
        }
    }

    protected function getOwnNodeList($roleId)
    {
        //获取当前用户的权限
        $nodeList=array();
        $access=D('access');
//        $roleId = D('role_user')->where(array("status"=>1,"user_id"=>$this->userId))->getField("role_id");
        $map['role_id']=$roleId;
        $map['status']=1;
        $list=$access->field("node_id")->where($map)->select();
        foreach ($list as $v) {
            $nodeList[]=$v['node_id'];
        }

        return $nodeList;
    }
}