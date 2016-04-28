<?php
return array(
	//数据库信息
'DB_TYPE'=>'mysql',// 数据库类型
'DB_HOST'=>'127.0.0.1',// 服务器地址
'DB_NAME'=>'demo',// 数据库名
'DB_USER'=>'root',// 用户名
'DB_PWD'=>'',// 密码
'DB_PORT'=>3306,// 端口
'DB_PREFIX'=>'think_',// 数据库表前缀
'DB_CHARSET'=>'utf8',// 数据库字符集
	//模板配置
'DEFAULT_V_LAYER'       =>  '../../Template/Admin', // 设置默认的视图层名称
'TMPL_FILE_DEPR'=>'_', //设置默认分隔符
'UPLOAD_SITEIMG_QINIU' => array ( 
                'maxSize' => 5 * 1024 * 1024,//文件大小
                'rootPath' => './',
                'saveName' => array ('uniqid', ''),
                'driver' => 'Qiniu',
                'driverConfig' => array (
                        'secretKey' => 'HLP8N5TOBhcF7hgc__x3iHh0OLa-bFyWrpepBhNO', 
                        'accessKey' => '4cCO6JHoMUq4e0J9GWNt8jpRJO7MLKUa3pMzDM_k',
                        'domain' => 'o6aoiled2.qnssl.com',
                        'bucket' => 'laibo', 
            ))
);
