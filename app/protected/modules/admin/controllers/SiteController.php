<?php

class SiteController extends CController {

    public $layout = '_layout';

    public function actionIndex() {

        $this->render('index');
    }

    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            }
            $this->render('error', array('error' => $error));
        }
    }

    public function actionLogin() {
        if (!defined('CRYPT_BLOWFISH') || !CRYPT_BLOWFISH)
            throw new CHttpException(500, "This application requires that PHP was compiled with Blowfish support for crypt().");

        $model = new LoginForm;
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if (!$this->createAction('captcha')->validate($model->verifyCode, false)) {
                $model->addError('verifyCode', '验证码不正确！');
            } else {
                if ($model->validate() && $model->login()) {
                    $this->redirect(Yii::app()->createUrl('admin/setting/index'));
                }
            }
        }
        $this->render('login', array('model' => $model));
    }

    public function actionLogout() {
        Yii::app()->user->logout(false);
        $this->redirect(Yii::app()->createUrl('admin/site/login'));
    }

    public function actions() {
        return array(
            'captcha' => array(
                'class'       => 'CCaptchaAction',
                'backColor'   => 0xFFFFFF, //背景颜色
                'minLength'   => 4, //最短为4位
                'maxLength'   => 4, //最长为4位
                'width'       => 80,
                'height'      => 35,
                'offset'      => 6, //字间距
                'transparent' => true, //显示为透明
            ),
        );
    }

}