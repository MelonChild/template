<?php

/**

 * 后台基类控制器
 * 
 * @access  public 
 * @author  fangzheng<zheng.fang@wemax.org> 
 */

namespace Admin\Controller;

use Think\Controller;
use Org\Util\Rbac;

class BaseController extends Controller {

    public $model;
    public $limit = 8;

//    初始化成员属性
    public function _initialize() {
        if (!isset($_SESSION[C('USER_AUTH_KEY')])) {
            $this->redirect('Admin/Login/index');
        }
        $not_auth = in_array(CONTROLLER_NAME, explode(',', C('NOT_AUTH_MODULE'))) || in_array(ACTION_NAME, explode(',', C('NOT_AUTH_FUNCTION')));

        //判断是否开启登陆验证
        if (C('USER_AUTH_ON') && !$not_auth) {
            Rbac::AccessDecision() || $this->error('没有权限进行操作');
        }

        //排除的控制器，初始化数据表
        $array = array("Index", 'Rbac');
        if (in_array(CONTROLLER_NAME, $array)) {
            
        } else {
            $this->model = D(CONTROLLER_NAME);
        }

        //获取侧边栏
        $this->menus = $this->getMenus();

        //获取后台管理员信息
        $this->adminusers = M("users")->find(session(C('USER_AUTH_KEY')));

        //用户权限查询，得到用户role_id
        $_SESSION["id"] = session_id("id");
        if (C('RBAC_SUPERADMIN') == session('bg_username')) {
            $this->rolename = '超级管理员';
        } else {
            $session_map["user_id"] = session(C('USER_AUTH_KEY'));
            $this->role_id = M("roles_users")->where($session_map)->getField("role_id");
            $this->rolename = M('roles')->where('id=' . $this->role_id)->getField('name');
        }


        //侧边栏
        $this->this_menu = CONTROLLER_NAME . '/index';
        $this->this_child_menu = CONTROLLER_NAME . '/' . ACTION_NAME;
    }

    /**
     * 获取控制器菜单数组
     */
    final public function getMenus() {
        $menus = session('ADMIN_MENU_LIST');
        if (empty($menus)) {
            // 获取主菜单
            $where['pid'] = 0;
            $where['hide'] = 0;

            $menus = M('backmenu')->where($where)->order('sort ASC')->select();
            foreach ($menus as $key => $menu) {
                $menus[$key]['child'] = $this->getExtraMenu($menu['id']);
            }
        }
        return $menus;
    }

    final public function getExtraMenu($praent_menu_id) {
        if ($praent_menu_id) {
            $map['pid'] = $praent_menu_id;
            $map['hide'] = 0;
            $menu = M('backmenu')->where($map)->order('sort ASC')->select();
        }
        return $menu;
    }

    protected function lists($count, $limit) {
        if ($limit) {
            $limit = $this->limit;
        }
        $Page = new \Think\Page($count, $limit);
        $Page->setConfig('header', '个文章');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('first', '第一页');
        $Page->setConfig('last', '最后页');
        return $Page;
    }

    //查询条件
    public function searchConditionById() {
        $id = I('id', '', 'intval');
        $map['id'] = $id;
        return $map;
    }

    //公共查询条件
    public function searchConditionByField($field = 'name') {
        $map[$field] = array('like', '%' . trim(I($field)) . '%');
        return $map;
    }

    //公共查询条件
    public function searchConditionByActive($value = 0) {
        $map['is_active'] = $value;
        return $map;
    }

    public function searchConditionByIdNeq($id = null) {
        $map['id'] = array('NEQ', $id);
        return $map;
    }

}
