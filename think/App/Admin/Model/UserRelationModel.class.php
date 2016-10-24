<?php

namespace Admin\Model;

use Think\Model\RelationModel;

/**
 * 用户与角色关联模型
 */
class UserRelationModel extends RelationModel {

    //定义主表
    protected $tableName = 'users';
    //定义关联关系
    protected $_link = array(
        'roles' => array(
            'mapping_type' => self::MANY_TO_MANY, //多对多关系
            'foreign_key' => 'user_id', //主表在中间表中关联字段名称
            'relation_foreign_key' => 'role_id', //副表在中间表管理字段名称
            'relation_table' => 'roles_users', //中间表名称
            'mapping_fields' => 'id,name,remark'//提取副表的字段
        ),
        'roles_users' => array(
            'mapping_name' => 'user_roles',
            'mapping_type' => self::HAS_MANY, //多对多关系
            'class_name' => 'roles_users',
            'foreign_key' => 'user_id', //主表在中间表中关联字段名称
        )
    );
    
    //表单验证
    protected $_validate = array(
        array('verify', 'require', '验证码必须！'), // 都有时间都验证
    );

}

?>
