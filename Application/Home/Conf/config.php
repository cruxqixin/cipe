<?php
return array(
	//'配置项'=>'配置值'
	 /* URL设置 */
   
   
	'URL_ROUTE_RULES'       =>  array(
		'theme/:id\d'=>'Home/Theme/index/id/:1',
		 'opticalfiber'=>'Home/Theme2/index?id=25', 
		 'optical'=>'Home/Theme2/index?id=27', 
		 'News/:id\d'=>'Home/News/details',
		 'exhibiton'=>'Home/News/index?type=1',
		  'Express'=>'Home/News/index?type=2',
		   'video'=>'Home/News/index?type=3',
		 'register'=>'Home/Visit/index?type=1',
		 'LaunchTime'=>'Home/Visit/index?type=2',
		 'TrafficGuidance'=>'Home/Visit/index?type=3',
		 'themet'=>'Home/Themet/index',
		  
		 
		 'apply'=>'Home/Visit/apply?type=4',
		 'manual'=>'Home/Visit/apply?type=5',
		 'BoothMap'=>'Home/Visit/apply?type=6',
		 'directory'=>'Home/Visit/apply?type=7',
		 'Consultation'=>'Home/Visit/apply?type=8',
		 'Build'=>'Home/Visit/apply?type=9',
		 'Activity'=>'Home/Activity/index',
		 'Download'=>'Home/Download/index',
		 'medias'=>'Home/Index/media',
		 'business'=>'Home/Index/business',
		 'about'=>'Home/Index/about',
	), // 默认路由规则 针对模块
	/* 日志设置 */
    'LOG_RECORD'            =>  false,   // 默认不记录日志
    'LOG_TYPE'              =>  'File', // 日志记录类型 默认为文件方式
    'LOG_LEVEL'             =>  'INFO,DEBUG',// 允许记录的日志级别
    'LOG_FILE_SIZE'         =>  1,	// 日志文件大小限制
    'LOG_EXCEPTION_RECORD'  =>  false,    // 是否记录异常信息日志
	
	 
);