<?php

//控制器基类
class Controller extends CController {

    public $layout = '//layouts/layout';
    public $menu = array();
    public $breadcrumbs = array();

    public function init() {
       
        parent::init();
    }

}

?>
