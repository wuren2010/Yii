<?php

class NewsController extends Controller {

    public function actionIndex() {

        $this->render('index');
    }

    public function actionSystem() {

        $this->render('system');
    }

    public function actionOther() {

        $this->render('other');
    }

}

?>
