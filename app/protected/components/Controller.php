<?php

//控制器基类
class Controller extends CController {

    public $layout = 'layout';
    public $menu = array();
    public $breadcrumbs = array();

    public function init() {
        parent::init();
    
    }

    /**
     * 出现错误显示的页面
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            }
            $this->render('//layouts/error', array('error' => $error));
            //不加载layout用下面的
            //$this->renderPartial('/layouts/error', array('error' => $error));
        }
    }

}

?>
