<?php
return array(
// 	//'配置项'=>'配置值'

//     // 开启路由
//'site_status'=> 1, 此处无效 
    'URL_ROUTER_ON' => true,
	'URL_MODEL'             =>  1,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
	 'URL_CASE_INSENSITIVE'  =>  true,   // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_ROUTE_RULES' => array(
        'Index/info/:uid' => 'Index/info',
        'Index/info_c/:uid' => 'Index/info_c',
        'Index/info_b/:uid' => 'Index/info_b',
        'Admin/index/:id' => 'Admin/index',
        'Admin/audit_info/:uid' => 'Admin/audit_info',
    ),
);