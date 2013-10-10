<?php

class CategoryListWidget extends CWidget {

    const SELECT_STYLE = 'select';

    public $selected;

    public function init() {
        
    }

    public function run() {
        $criteria = new CDbCriteria();
        $criteria->select = "*,category_path||'-'||category_id AS path";
        $criteria->order = "path ASC";
        $criteria->addCondition("category_name <> '首页'");
        $list = Category::model()->findAll($criteria);

        $data = array();
        foreach ($list as $val) {
            $mak = count(explode('-', $val['category_path'])) - 1;
            $data[$val['category_id']] = str_repeat('&nbsp;&nbsp;&nbsp;', $mak) . $val['category_name'];
        }
        echo CHtml::dropDownList('category_id', $this->selected, $data, array(
            'encode'  => false,
            'options' => array(
                '1' => array('disabled' => true),
            )
        ));
    }

}

?>
