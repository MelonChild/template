<?php

/**

 * RBAC
 * 
 * @access  public 
 * @author  fangzheng<zheng.fang@wemax.org> 
 */

namespace Admin\Controller;

use Think\Controller;

class RbacController extends BaseController {

    //用户列表
    public function user() {
        //输出标题
        $this->title = "用户列表";
        $users = D('UserRelation');

        $p = I('get.p', 1, 'intval');
        $list = $users->field('password', TRUE)->relation('roles')->page($p . ',10')->select();
        $this->assign('list', $list); // 赋值
        $count = $users->count(); // 查询满足要求的总记录数
        $Page = new \Think\Page($count, 10); // 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('header', '个用户');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('first', '第一页');
        $Page->setConfig('last', '最后页');
        $show = $Page->show(); // 分页显示输出

        $this->assign('page', $show); // 赋值分页输出

        $this->display();
    }

    //添加用户
    public function addUser() {
        //处理添加
        if (IS_POST) {
            $this->title = '添加用户处理';
            //用户信息
            $user = array(
                'username' => I('username'),
                'password' => I('password', '', 'md5')
            );

            $role = array();
            if ($uid = M('users')->add($user)) {
                foreach ($_POST['role_id'] as $v) {
                    $role[] = array(
                        'role_id' => $v,
                        'user_id' => $uid
                    );
                }
                M('roles_users')->addAll($role);
                $this->success("添加成功", U('user'));
            } else {
                $this->error('添加失败');
            }
        }
        $this->title = '添加用户';
        $this->roles = M('roles')->select();
        $this->display();
    }

    //修改用户
    public function editUser() {
        $user_model = D("UserRelation");

        if (IS_POST) {
            $id = I('id', 0, 'intval');
            $data['id'] = $id;
            $data["username"] = I('username');
            $data["password"] = I('password', '');
            $pwd = M('users')->where('id=' . $id)->getField('password');
            if ($pwd !== $data["password"]) {
                $data["password"] = I('password', '', 'md5');
            }

            M('roles_users')->where('user_id=' . $id)->delete();
            $data['user_roles'] = array();
            foreach ($_POST['role_id'] as $v) {
                if ($v) {
                    $data['user_roles'][] = array(
                        'role_id' => $v,
                        'user_id' => $id
                    );
                }
            }

            $map['id'] = $id;

            $result = $user_model->relation("user_roles")->where($map)->save($data);
            if ($result !== false) {
                $this->success("修改成功", U('user'));
            } else {
                $this->error("出错了，请联系管理员");
            }
        }
        $id = I('id', session(C('USER_AUTH_KEY')), 'intval');
        $this->title = "修改用户";
        $this->user = $user_model->relation("user_roles")->where('id=' . $id)->find();
        $this->roles = M('roles')->select();
        $this->display();
    }

    //删除用户
    public function deleteUser() {
        $id = I('id', 0, 'intval');
        $user_model = D('UserRelation');
        $result = $user_model->relation("user_roles")->delete($id);
        if ($result) {
            $this->success("删除成功", U('user'));
        } else {
            $this->error("出现错误，请联系管理员");
        }
    }

    //角色列表
    public function role() {
        $this->title = '角色列表';
        $this->roles = M('roles')->select();
        $this->display();
    }

    //添加角色
    public function addRole() {
        //编辑角色处理
        if (IS_POST) {
            if (M('roles')->add($_POST)) {
                $this->success("添加成功", U('role'));
            } else {
                $this->error('添加失败');
            }
        }

        //设置标题
        $this->title = '添加角色';
        $this->display();
    }

    //删除角色
    public function deleteRole() {
        $id = I('rid', 0, 'intval');
        M('roles')->delete($id);
        M('roles_users')->where('role_id=' . $id)->delete();
        M('access')->where('role_id=' . $id)->delete();
        $this->success("删除成功", U('role'));
    }

    //编辑角色
    public function editRole() {
        $model = M('roles');
        if (IS_POST) {
            if ($model->save($_POST) !== false) {
                $this->success('修改成功', U('role'));
            } else {
                $this->error('修改失败');
            }
        }
        $id = I('id', 0, 'intval');

        $this->role = $model->find($id);
        $this->title = '编辑角色';
        $this->display();
    }

    //权限列表    
    public function node() {
        $this->title = '权限列表';
        $field = array('id', 'name', 'title', 'remark', 'pid');
        $nodes = M('nodes')->field($field)->order('sort')->select();
        $this->nodes = node_merge($nodes);
        $this->display();
    }

    //添加节点
    public function addNode() {
        if (IS_POST) {
            if (M('nodes')->add($_POST)) {
                $this->success('添加成功', U('node'));
            } else {
                $this->error('插入失败');
            }
        }
        $this->title = '添加节点';
        $this->pid = I('pid', 0, 'intval');
        $this->level = I('level', 1, 'intval');

        switch ($this->level) {
            case 1:
                $this->type = '应用';
                break;
            case 2:
                $this->type = '控制器';
                break;
            case 3:
                $this->type = '方法';
                break;
        }
        $this->display();
    }

    //修改节点表单
    public function editNode() {
        if (IS_POST) {
            $id = I('id', 0, 'intval');
            $map['id'] = $id;
            if (M('nodes')->where($map)->save($_POST)) {
                $this->success('修改成功', U('node'));
            } else {
                $this->error('修改失败');
            }
        }
        $id = I('id', 0, 'intval');
        $map['id'] = $id;
        $this->title = '添加节点';
        $node_model = M('nodes');

        $this->node = $node_model->where($map)->find();
        $this->level = I('level', 1, 'intval');

        switch ($this->level) {
            case 1:
                $this->type = '应用';
                break;
            case 2:
                $this->type = '控制器';
                break;
            case 3:
                $this->type = '方法';
                break;
        }
        $this->display();
    }

    //删除节点处理
    public function deleteNode() {
        $id = I('id', 0, 'intval');
        $node_model = M('nodes');
        $where['pid'] = $id;
        $node_model->delete($id);
        $node_model->where($where)->delete();
        $this->success("删除成功", U('node'));
    }

    //配置权限
    public function access() {
        //获得角色id
        $role_id = I('rid', 0, 'intval');

        //取得node数组
        $field = array('id', 'name', 'title', 'pid');
        $nodes = M('nodes')->order('sort')->field($field)->select();

        //读取原有权限
        $access = M('access')->where(array('role_id' => $role_id))->getField('node_id', TRUE);

        //组合数组
        $this->nodes = node_merge($nodes, $access);
        $this->rid = $role_id;
        $this->display();
    }

    //修改权限
    public function setAccess() {
        $role_id = I('rid', 0, 'intval');

        $db = M('access');

        //组合新权限
        $data = array();
        foreach ($_POST['access'] as $value) {
            $tmp = explode('_', $value);
            $data[] = array(
                'role_id' => $role_id,
                'node_id' => $tmp[0],
                'level' => $tmp[1]
            );
        }

        //清空原权限
        $db->where(array('role_id' => $role_id))->delete();

        //设置显示的菜单数
        $this->setMenusByAccess($data);

        //添加新权限
        if ($db->addAll($data)) {
            $this->success('修改成功', U('role'));
        } else {
            $this->error('修改失败');
        }
    }

    //设置用户状态
    public function setActive() {
        $id = I('id', 0, 'intval');
        $value = I('value', 0, 'intval');
        $user_model = M('Users');
        $result = $user_model->where("id=" . $id)->setField('is_active', $value);
        if ($result !== false) {
            $this->success("设置成功", U('user'));
        } else {
            $this->error("出现错误，请联系管理员");
        }
    }

    //根据角色的权限来设置目录显示
    public function setMenusByAccess($nodes) {

        //获取nide 信息
        foreach ($nodes as $key => $node) {
            $nodes[$key]['node'] = M('nodes')->find($node['node_id']);
        }

        //设置url
        foreach ($nodes as $key => $controller) {
            if ($controller['level'] == 2) {
                foreach ($nodes as $key => $action) {
                    if ($action['node']['pid'] == $controller['node_id']) {
                        $map['url'] = $controller['node']['name'] . '/' . $action['node']['name'];
                        $temp = M('backmenu')->where($map)->getField('id');
                        $temp && $url[] = $temp;
                    }
                }
            }
        }
        $where['id'] = $nodes[0]['role_id'];
        $url = implode('-', array_unique($url));
        M('roles')->where($where)->setField('menu_ids', $url);
        return;
        ;
    }

}

?>
