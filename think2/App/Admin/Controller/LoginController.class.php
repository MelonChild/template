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
            $this->redirect('Index/index');
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

    //验证码生成
    public function verify() {
        ob_clean();
        $config = array(
            'fontSize' => 16, // 验证码字体大小   
            'length' => 1, // 验证码位数    
            'useNoise' => false, // 关闭验证码杂点
            'imageW' => '110px',
        );
        $Verify = new \Think\Verify($config);
        $Verify->codeSet = '123456789';
        $Verify->entry();
    }

    //检测验证码是否正确
    function check_verify($code, $id = '') {
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }

    public function checkVerify() {
        $code = I('code', 0);
        //验证码检测
        $verfity = $this->check_verify($code, '');
        if ($verfity) {
            $this->ajaxReturn(true);
        } else {
            $this->ajaxReturn(false);
        }
    }

}
