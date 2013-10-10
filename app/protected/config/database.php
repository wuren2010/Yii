<?php

//db配置文件
return array(
    'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/cms.db',
    //'connectionString' => 'mysql:host=localhost;dbname=h.me', //数据库DNS
    'username' => 'root', //数据库用户
    'password' => '', //数据库密码
    'schemaCachingDuration' => 3306, //端口
    'charset' => 'utf8', //字符集
    'tablePrefix' => 'yii_', //表前缀
    'enableParamLogging' => true, //显示带参数的SQL
);
?>
