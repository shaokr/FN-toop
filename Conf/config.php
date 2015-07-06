<?php
return array(
	//'配置项'=>'配置值'
	'DEFAULT_THEME'     => 'skr', //默认模块
	'SESSION_AUTO_START' => true, //是否开启session
	'URL_MODEL'          => '2', //URL模式
	'this_d'=>"D:/svncode/wap/",
	'environment'=>[
		'dev-test' =>[
			[
				'site' => '/trunk/webapp/m.feiniu.com/',
				'html' => '/public/',
				'php'  => '',
				'js' => '/public/static/js/',
				'css'=> '/public/static/css/'
			],
			[
				'site'=>'/tags/testv1/webapp/m.feiniu.com/',
				'html' => '/public/',
				'php'  => '',
				'js' => '/public/static/js/',
				'css'=> '/public/static/css/'
			]
		],
		'test-preview'=>[
			[
				'site'=>'/tags/testv1/webapp/m.feiniu.com/',
				'html' => '/public/',
				'php'  => '',
				'js' => '/public/static/js/',
				'css'=> '/public/static/css-build/'
			],
			[
				'site'=>'/release/',
				'html' => '/online01/touch_brancheonline/touch_20150112/public/',
				'php'  => '',
				'js' => '/onlinejs01/js/',
				'css'=> '/online01/touch_brancheonline/touch_20150112/public/static/css-build/'
			]
		]
	],

);