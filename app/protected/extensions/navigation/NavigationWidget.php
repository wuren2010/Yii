<?php

/**
 * 网站导航
 * e.g: 
 * $this->widget('ext.navigation.NavigationWidget'); //样式默认为列表形式
 */
class NavigationWidget extends CWidget {

    public $controller;
    public $action;
    public $route;
    public $htmlOptions = array();

    public function init() {
        $this->controller = Yii::app()->controller->id;
        $this->action = Yii::app()->controller->action->id;
        if (isset($this->route)) {
            $class = 'nav nav-pills';
        } else {
            $this->route = $this->controller . '/' . $this->action;
            $class = 'nav nav-list ds-nav-list';
        }

        $this->htmlOptions['class'] = isset($this->htmlOptions['class']) ? $this->htmlOptions['class'] : $class;
    }

    public function run() {
        $category_url = strstr($this->route, '/', true) . '/' . Yii::app()->controller->defaultAction;
        $action = Category::model()->findByAttributes(array('category_url' => $category_url));
        $criteria = new CDbCriteria();
        $criteria->condition = 'category_pid =' . $action['category_id'];
        $category = Category::model()->findAll($criteria);
        $items[$action['category_id']] = array(
            'label' => $action['category_name'],
            'url' => 'javascript:;',
        );

        foreach ($category as $value) {
            $items[$value['category_id']] = array(
                'label' => $value['category_name'], //<i class="icon-chevron-right"></i>
                'url' => array(Yii::app()->createUrl($value['category_url'])),
                'active' => $this->parshRequest($value['category_url']),
            );
        }
        $this->render('navigation', array(
            'items' => $items,
            'htmlOptions' => $this->htmlOptions,
        ));
    }

    protected function parshRequest($url) {
        $path = explode('/', $url);
        if (count($path) <= 2 && $path[0] == $this->controller) {
            return true;
        } else {
            $cid = Yii::app()->request->getParam('cid');

            if (isset($cid) && strpos($url, 'cid/' . $cid)) {
                return true;
            }
        }
    }

}

?>
