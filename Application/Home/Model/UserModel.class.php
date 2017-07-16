<?php
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 2017/7/14
 * Time: 18:30
 */

namespace Home\Model;

use Think\Model;

class UserModel extends Model
{
    public function getAll($limit = 20)
    {
//        return $this->order("id asc")->limit($limit)->getField("id,username");

        return $this->order('id asc')
            ->field('user.id,user.username,role.role_name')
            ->join('LEFT JOIN __ROLE_USER__ on user.id=role_user.user_id
                    LEFT JOIN __ROLE__ ON role_user.role_id=role.id')
            ->limit($limit)
            ->select();
    }

}