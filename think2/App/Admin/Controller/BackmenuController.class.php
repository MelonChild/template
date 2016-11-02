<?php

/**

 * 后台菜单
 * 
 * @access  public 
 * @author  fangzheng<zheng.fang@wemax.org> 
 */

namespace Admin\Controller;

use Think\Controller;

class BackmenuController extends BaseController {

    //列表页
    public function index() {
        $where = $this->searchConditionByField();
        $map["pid"] = I('get.pid', '0', 'intval');
        $limit = $this->limit;
        $model = $this->model;
        $p = I('get.p', 1, 'intval');
        $contents = $model->where($where)->where($map)->page($p, $limit)->order('sort ASC')->select();
        $count = $model->where($where)->where($map)->count(); // 查询满足要求的总记录数
        $this->page = $this->lists($count, $limit); // 分页显示输出
        $this->title = "列表";
        $this->contents = $contents;

        $this->display();
    }

    //
    public function _before_add() {
        $model = $this->model;
        //顶层菜单
        $map['pid'] = 0;
        $menus = $model->where($map)->field('id,name')->order('sort')->select();
        $this->allMenus = $menus;

        //菜单样式值
        $menuClasses = M('class')->select();
        $this->menuClasses = $menuClasses;
    }
    
    //
    public function _before_edit() {
        $this->_before_add();
    }

    //添加
    public function add() {
        $model = $this->model;

        if (IS_POST) {
            $verification = $model->create();
            if ($verification) {
                $data = I('post.');
                $result = $model->add($data);
                if ($result) {
                    $this->success("添加成功", 'index');
                } else {
                    $this->error("添加错误");
                }
            } else {
                $this->error($model->getError());
            }
        }

        $this->title = "后台链接新增";
        $this->display();
    }

    //编辑
    public function edit() {

        if (IS_POST) {
            $data = $this->model->create();
            if ($data) {
                if ($this->model->save() !== false) {
                    $this->success('更新成功', U('index'));
                } else {
                    $this->error('更新失败');
                }
            } else {
                $this->error($this->model->getError());
            }
        } else {
            $id = I('id', '', 'intval');

            if (empty($id)) {
                $this->error('参数不能为空！');
            }

            /* 获取一条记录的详细数据 */
            $data = $this->model->detail($id);

            if (!$data) {
                $this->error($this->model->getError());
            }
            $this->assign('content', $data);
            $this->title = '编辑';
            $this->display();
        }
    }

    //
    public function delete() {
        $model = $this->model;
        $ids = I('get.id');
        if (!empty($ids)) {
            $map['id'] = array('in', $ids);
            $result = $model->where($map)->delete();
        }

        if ($result) {
            $this->success("删除成功");
        } else {
            $this->error("删除失败");
        }
    }

}
