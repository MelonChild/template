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
        
        $this->title = "后台首页";
        $this->display();
    }

}
