<?php

class SiteController extends Controller {

    /**
     * 首页
     */
    public function actionIndex() {
        //Tool::sendMail('Hello Word!', '55015221@qq.com', 'test');
        $this->render('index');
    }

    /**
     * 文件上传页面
     */
    public function actionUpload() {
        //Tool::tips('成功','error',30);
        $model = new Pictures;
        $model->pic_module = 'categary';
        if (isset($_POST['Pictures'])) {
            $this->performAjaxValidation($model);
            $model->attributes = $_POST['Pictures'];
            $model->pic_create_time = date('Y-m-d H:i:s', time());
            if ($model->validate()) {
                //上传文件
                $model->pic_path = Tool::uploadFile($model, 'pic_path', 'images');
                if ($model->save()) {
                    $this->redirect(array('index', 'pic_id' => $model->primaryKey));
                }
            }
        }

        $this->render('upload', array('model' => $model));
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * 编辑页面
     */
    public function actionEdit() {
        $post = $_POST;
        $error = null;
        if (isset($post['submit'])) {
            //$code = $this->createAction('captcha')->getVerifyCode();
            if (!$this->createAction('captcha')->validate($post['verify'], false)) {
                $error = '验证码错误！';
            }
        }

        var_dump($error);
        // $this->render('edit', array('error', $error));
    }

    public function actions() {
        return array(
            'captcha' => array(
                'class'       => 'CCaptchaAction',
                'backColor'   => 0xFFFFFF, //背景颜色
                'minLength'   => 4, //最短为4位
                'maxLength'   => 4, //最长为4位
                'width'       => 80,
                'height'      => 30,
                'offset'      => 6, //字间距
                'transparent' => true, //显示为透明
            ),
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index', 'captcha'),
                'users' => array('*'),
            )
        );
    }

}