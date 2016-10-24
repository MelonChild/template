<?php

/**

 * 路由设置
 * 
 * @author  fangzheng<zheng.fang@wemax.org> 
 */
return array(
    /* 路由定义 */
    'URL_ROUTER_ON' => true, //开启路由
    'URL_ROUTE_RULES' => array(
        'homepages$' => "aaa/content/index",
        'location$' => 'Home/Location/index',
        'college/:id\d$' => 'Home/College/info',
        'college/:id/:p\.$' => 'Home/College/detail',
    ),
);

