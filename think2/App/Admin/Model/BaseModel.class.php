<?php

/**

 * 数据
 * 
 * @access  public 
 * @author  fangzheng<zheng.fang@wemax.org> 
 */

namespace Admin\Model;

use Think\Model;

/**
 * 基
 */
class BaseModel extends Model {

    /**
     * 获取详情页数据
     * @param  integer $id ID
     * @return array       详细数据
     */
    public function detail($id, $model) {      
        /* 获取基础数据 */
        $model = empty($model) ? $this : D($model);
        $info = $model->field(true)->find($id);
        if (!(is_array($info) || 1 !== $info['is_active'])) {
            $this->error = '数据禁用或已删除！';
            return false;
        }
        return $info;
    }

}
