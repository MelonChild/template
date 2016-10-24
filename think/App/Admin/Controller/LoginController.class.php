<?php

/**

 * 后台登录
 * 
 * @access  public 
 * @author  fangzheng<zheng.fang@wemax.org> 
 */

namespace Admin\Controller;

use Think\Controller;
use Org\Util\Rbac;
use Think\Verify;

class LoginController extends Controller {

    public function index() {

        if (IS_POST) {
            //获取参数
            $username = I('username');
            $pwd = I('password', '', 'md5');

            //用户账号密码检测
            $user = M('users')->where(array('username' => $username))->find();
            if (!$user || $user['password'] != $pwd) {
                $this->error('用户账号或者密码错误');
            }
            if ($user['is_active'] == 0) {
                $this->error('用户被禁用');
            }

            //更新用户信息
            $data = array(
                'id' => $user['id'],
                'last_login' => time(),
                'logins' => $user['logins'] + 1,
            );
            M('users')->save($data);

            //写入session
            session(C('USER_AUTH_KEY'), $user['id']);
            session('bg_username', $user['username']);
            session('logintime', date('Y-m-d H:i:s'), $user['last_login']);

            //识别超级管理员，并修改session
            if ($user['username'] == C('RBAC_SUPERADMIN')) {
                session(C('ADMIN_AUTH_KEY'), TRUE);
            }

            //读取用户权限
            new \Org\Util\Rbac();
            Rbac::saveAccessList();

            //到后台主页
            $this->success('登录成功', U('Index/index'));
        }

        $this->title = "后台用户登录";
        $this->display();
    }

    //退出登录，删除session
    public function logout() {
        session_unset();
        session_destroy();
        $this->redirect('Admin/Login/index');
    }

}
