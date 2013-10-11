<?php

// 主配置文件
$config = array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..', //项目路径
    'name' => 'Yii学习', //项目名称
    'sourceLanguage' => 'zh_cn', //系统语言
    'timeZone' => 'Asia/Shanghai', //时区
    'theme' => 'default', //主题
    'defaultController' => 'site/index', //默认控制器
    'layout' => 'layout', //layout文件
    'preload' => array('log'),
    //模块配置
    'modules' => array(
        'admin' => array(
            'class' => 'application.modules.admin.AdminModule',
            'defaultController' => 'setting/index',
        ),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123456', //访问密码
            'ipFilters' => array('127.0.0.1', '::1'), //只允许本地访问
        ),
    ),
    //自动加载类
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'components' => array(
        //404错误跳转到所在方法
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        //user组件
        'user' => array(
            'class' => 'WebUser', //这个WebUser是继承CwebUser
            'allowAutoLogin' => true, //允许cookie保存登录信息，以便下次自动登录 
            'stateKeyPrefix' => 'member_', //前台session的前缀 
        ),
        //数据库配置
        'db' => require(dirname(__FILE__) . '/database.php'),
        'urlManager' => array(
            'urlFormat' => 'path', //pathinfo模式
            'showScriptName' => false, //隐藏index.php时需要设置false
            //'urlSuffix' => '.html', //url后缀相当于伪静态
            'rules' => array(
            ),
        ),
        //PHPmail
        'mailer' => array(
            'class' => 'application.extensions.mailer.EMailer',
            'pathViews' => 'application.views.email',
            'pathLayouts' => 'application.views.email.layouts'
        ),
        // debug
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CWebLogRoute',
                    'levels' => 'trace,error, warning',
                //'categories' => 'system.*',
                ),
//                array(
//                    'class' => 'CFileLogRoute',
//                    'class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
//                    'ipFilters' => array('127.0.0.1'),
//                    'levels' => 'error, warning',
//                ),
            ),
        ),
    ),
    'params' => require(dirname(__FILE__) . '/params.php'),
);

return $config;
?>
