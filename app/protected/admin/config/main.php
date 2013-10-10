<?php

$backend = dirname(dirname(__FILE__));
$frontend = dirname($backend);
Yii::setPathOfAlias('backend', $backend);

$frontendArray = require($frontend . '/config/main.php');

$backendArray = array(
    'basePath' => $frontend,
    'controllerPath' => $backend . '/controllers',
    // 'viewPath' => $backend . '/views',
    'runtimePath' => $backend . '/runtime',
    'name' => '网站后台管理系统',
    'theme' => 'admin', //主题
    'defaultController' => 'site/index',
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.*',
        'backend.models.*',
        'backend.components.*',
    ),
    'components' => array(
        'user' => array(
            'class' => 'WebUser', //这个WebUser是继承CwebUser
            'allowAutoLogin' => true, //允许cookie保存登录信息，以便下次自动登录 
            'stateKeyPrefix' => 'backend_', //前台session的前缀 
        ),
        'errorHandler' => array(
            'errorAction' => 'site/error', //404错误跳转到所在方法
        ),
    ),
    'params' => CMap::mergeArray(require($frontend . '/config/params.php'), require($backend . '/config/params.php')),
);
if (isset($frontendArray['components']['user'])) {
    unset($frontendArray['components']['user']);
}
return CMap::mergeArray($frontendArray, $backendArray);

