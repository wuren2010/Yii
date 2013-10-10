<?php

/**
 * 面包屑widget
 * 在需要面包屑导航的模版中使用：
 * $id 必须  为category_id
 * $this->widget('ext.breadcrumbs.BreadcrumbsWidget');
 */
class BreadcrumbsWidget extends CWidget {

    public $id;

    public function init() {
        $this->id = Yii::app()->request->getParam('cid');
        if (!isset($this->id)) {
            $route = Yii::app()->controller->id . '/' . Yii::app()->controller->action->id;
            $category = Category::model()->findByAttributes(array('category_url' => $route));
            if (empty($category)) {
                throw new CHttpException('404', '缺少分类id');
            }
            $this->id = $category['category_id'];
        }
    }

    public function run() {
        $current = Category::model()->findByPk($this->id);
        $bread = Category::model()->findAll('category_id in(' . str_replace('-', ',', $current['category_path']) . ')');
        foreach ($bread as $value) {
            $breadcrumbs[] = array('name' => $value['category_name'], 'url' => Yii::app()->createUrl($value['category_url']));
        }
        array_push($breadcrumbs, array('name' => $current['category_name'], 'url' => ''));
        $this->render('breadcrumbs', array(
            'breadcrumbs' => $breadcrumbs,
        ));
    }

}

?>
