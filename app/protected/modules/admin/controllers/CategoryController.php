<?php

class CategoryController extends Controller {

    public function actionIndex() {
        $criteria = new CDbCriteria();
        $criteria->select = "*,category_path||'-'||category_id AS path";
        $criteria->order = "path ASC";
        $criteria->addCondition("category_name<>'首页'");
        $list = Category::model()->findAll($criteria);

        $this->render('index', array('list' => $list));
    }

    public function actionNode() {
        $model = new Category;
        $list = CJSON::encode($model->nodes());
        $this->render('node', array('list' => $list));
    }

    public function actionSystem() {

        $this->render('system');
    }

    public function actionOther() {

        $this->render('other');
    }

}

?>
