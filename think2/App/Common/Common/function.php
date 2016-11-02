<?php

/**
 * get_field_by_field
 * 获取表单字段值
 * 
 * @access public
 * @param string $model 表名
 * @param mix $where 条件值
 * @param string $model 条件字段
 * @param string $field 查询字段
 * @return array 
 * @author  fangzheng<zheng.fang@wemax.org> 
 */
function get_field_by_field($model, $where, $field = 'name', $whereField = 'id') {
    $map[$whereField] = $where;
    $return = M($model)->where($map)->getField($field);
    return $return;
}
