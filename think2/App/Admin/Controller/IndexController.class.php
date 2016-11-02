<?php

/**

 * 后台首页控制器
 * 
 * @access  public 
 * @author  fangzheng<zheng.fang@wemax.org> 
 */

namespace Admin\Controller;

use Think\Controller;

class IndexController extends BaseController {

    //后台首页
    public function index() {
        $this->lasttime = session('logintime');

        //获取用户
        $users = M('users')->field('id,name,role_id,last_login,super,is_active,create_time')->select();
        foreach ($users as $key => $user) {
            if ($user['super']==1) {
                $users[$key]['role'] = '超级管理员';
            } else {
                $map['user_id'] = $user['id'];
                $roles = M('roles_users')->where($map)->getField('role_id', true);
                $userRole = '';
                foreach ($roles as $rolekey => $role) {
                    $userRole.=get_field_by_field('roles', $role).' ';
                }
                
                $users[$key]['role'] = $userRole;
            }
        }
        $this->users = $users;

        $this->title = "后台首页";
        $this->display();
    }

}
