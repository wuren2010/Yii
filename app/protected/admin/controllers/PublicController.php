<?php

class PublicController extends Controller {

    /**
     * 出现错误显示的页面
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            }
            $this->render('/layouts/error', array('error' => $error));
            //不加载layout用下面的
            //$this->renderPartial('/layouts/error', array('error' => $error));
        }
    }

}