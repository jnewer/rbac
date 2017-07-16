<?php
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 2017/7/14
 * Time: 17:56
 */

namespace Home\Model;

use Think\Model;

class RoleModel extends Model
{
    public function getAll($limit = 10)
    {
        return $this->field('id,role_name')->order("id asc")->limit($limit)->select();

    }

}