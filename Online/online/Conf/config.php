<?php
return array(
// 	//'配置项'=>'配置值'

//     // 开启路由
    'URL_ROUTER_ON' => true,
	'URL_CASE_INSENSITIVE'  =>  true,   // 默认false 表示URL区分大小写 true则表示不区分大小写
    
    'URL_ROUTE_RULES' => array(
        'Index/info/:uid' => 'Index/info',
        'Index/info_c/:uid' => 'Index/info_c',
        'Index/info_b/:uid' => 'Index/info_b',
        'Admin/index/:id' => 'Admin/index',
        'Admin/audit_info/:uid' => 'Admin/audit_info',
        'Register/index/:source' => 'Register/index',
        'Weixin/info/:uid' => 'Weixin/info',
        'Weixin/info_c/:uid' => 'Weixin/info_c',
        'Weixin/info_b/:uid' => 'Weixin/info_b',
        'Product/info/:pid' => 'Product/info',
        'Product/edit/:pid' => 'Product/edit',
        'Product/listO/:uid' => 'Product/listO',
    ),
);