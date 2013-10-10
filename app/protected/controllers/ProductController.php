<?php

/**
 * 产品控制器
 */
class ProductController extends Controller {

    public $pic_module = 'product';

    /**
     * 产品首页
     */
    public function actionIndex() {
        $category_id = (int) Yii::app()->request->getParam('cid');
        $criteria = new CDbCriteria();
        if (!empty($category_id)) {
            $criteria->addCondition('category_id=' . $category_id);
        }
        $list = Product::model()->findAll($criteria);
        $this->render('index', array(
            'list' => $list,
        ));
    }

    /**
     * 产品详情页
     */
    public function actionView() {
        if (!$id = Yii::app()->request->getParam('id')) {
            throw new CHttpException(404, '此页面不存在');
        }
        $criteria = new CDbCriteria();
        $criteria->alias = 't';
        //$criteria->select = 't.*,p.*';
        // $criteria->join = 'LEFT JOIN {{picture}} AS p ON p.pic_foreign_id = t.product_id AND p.pic_module = "' . $this->pic_module . '"';
        $criteria->condition = 'product_id =' . $id;
        $criteria->with = array('picture');
        $data = Product::model()->findAll($criteria);
        $this->render('view', array(
            'data' => $data[0],
        ));
    }

}