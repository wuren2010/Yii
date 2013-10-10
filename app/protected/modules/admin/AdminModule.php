<?php

class AdminModule extends CWebModule {

    private $_assetsUrl;

    public function init() {
        parent::init();
        Yii::app()->name = '网站后台管理';
        $this->setImport(array(
            'admin.models.*',
            'admin.components.*',
        ));
        Yii::app()->setComponents(array(
            'errorHandler' => array(
                'class'       => 'CErrorHandler',
                'errorAction' => $this->getId() . '/site/error',
            ),
            'user'        => array(
                'class'          => 'CWebUser',
                'allowAutoLogin' => true,
                'stateKeyPrefix' => 'admin_',
                'loginUrl'       => Yii::app()->createUrl($this->getId() . '/site/login'),
            ),
                ), false);
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            $route = $controller->id . '/' . $action->id;
            if (!$this->allowIp(Yii::app()->request->userHostAddress) && $route !== 'site/error')
                throw new CHttpException(403, "You are not allowed to access this page.");

            $publicPages = array(
                'site/login',
                'site/captcha',
                'site/error',
            );
            if (Yii::app()->user->isGuest && !in_array($route, $publicPages))
                Yii::app()->user->loginRequired();
            else
                return true;
        }
        return false;
    }

    protected function allowIp($ip) {
        if (empty($this->ipFilters))
            return true;
        foreach ($this->ipFilters as $filter) {
            if ($filter === '*' || $filter === $ip || (($pos = strpos($filter, '*')) !== false && !strncmp($ip, $filter, $pos)))
                return true;
        }
        return false;
    }

    public function getAssetsUrl() {
        if ($this->_assetsUrl === null)
            $this->_assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('admin.assets'), false, -1, YII_DEBUG);
        return $this->_assetsUrl;
    }

    public function setAssetsUrl($value) {
        $this->_assetsUrl = $value;
    }

}
