<?php

date_default_timezone_set('PRC');
session_start();

$config = array(
	'rewrite' => array(
        /*
		'admin/index.html' => 'admin/main/index',
		'admin/<c>_<a>.html'    => 'admin/<c>/<a>', 
        	'<m>/<c>/<a>'          => '<m>/<c>/<a>',
		'<c>/<a>'          => '<c>/<a>',
		'/'                => 'main/index',
        */
	),

    'manager' => array(
        'admin',
    ),
);

$domain = array(
	"localhost:8080" => array( // 调试配置
		'debug' => 1,
		'mysql' => array(

				'MYSQL_HOST' => 'localhost',
				'MYSQL_PORT' => '3306',
				'MYSQL_USER' => 'root',
				'MYSQL_DB'   => 'cms-one1',
				'MYSQL_PASS' => '',
				'MYSQL_CHARSET' => 'utf8',

		),
	),
    "192.168.123.232" => array( // 调试配置
        'debug' => 1,
        'mysql' => array(

            'MYSQL_HOST' => 'localhost',
            'MYSQL_PORT' => '3306',
            'MYSQL_USER' => 'root',
            'MYSQL_DB'   => 'cms-one1',
            'MYSQL_PASS' => '',
            'MYSQL_CHARSET' => 'utf8',

        ),
    ),
    "71zz0tdaig2n.ngrok.xiaomiqiu123.top" => array( // 调试配置
        'debug' => 1,
        'mysql' => array(

            'MYSQL_HOST' => 'localhost',
            'MYSQL_PORT' => '3306',
            'MYSQL_USER' => 'root',
            'MYSQL_DB'   => 'cms-one1',
            'MYSQL_PASS' => '',
            'MYSQL_CHARSET' => 'utf8',

        ),
    ),
	"speedphp.com" => array( //线上配置
		'debug' => 0,
		'mysql' => array(),
	),
);
// 为了避免开始使用时会不正确配置域名导致程序错误，加入判断
if(empty($domain[$_SERVER["HTTP_HOST"]])) die("配置域名不正确，请确认".$_SERVER["HTTP_HOST"]."的配置是否存在！");

return $domain[$_SERVER["HTTP_HOST"]] + $config;
