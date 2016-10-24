<?php

return array(
    //'配置项'=>'配置值'
    //RBAC
    'USER_AUTH_ON' => TRUE, //是否开启验证
    'USER_AUTH_TYPE' => 1, //1登陆验证，2代表时时验证
    'USER_AUTH_KEY' => 'back_uid', //用户认证识别号
    'RBAC_SUPERADMIN' => 'admin', //指定超级管理员账号
    'ADMIN_AUTH_KEY' => 'superadmin', //超级管理员识别
    'REQUIRE_AUTH_MODULE' => '',
    'NOT_AUTH_MODULE' => 'Index', //无需验证的控制器
    'NOT_AUTH_FUNCTION' => '', //无需验证的方法
    'RBAC_ROLE_TABLE' => 'roles', //角色表名称
    'RBAC_USER_TABLE' => 'roles_users', //角色与用户的中间表名称
    'RBAC_ACCESS_TABLE' => 'access', //权限表名称
    'RBAC_NODE_TABLE' => 'nodes', //节点表名称

      /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/static',
        '__IMG__' => __ROOT__ . '/Public/' . MODULE_NAME . '/img',
        '__CSS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
        '__JS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/js',
    ),
  
    /* 后台错误页面模板 */
    'TMPL_ACTION_ERROR' => MODULE_PATH . 'View/Base/error.html', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => MODULE_PATH . 'View/Base/success.html', // 默认成功跳转对应的模板文件
    'TMPL_EXCEPTION_FILE' => MODULE_PATH . 'View/Base/exception.html', // 异常页面的模板文件
);
