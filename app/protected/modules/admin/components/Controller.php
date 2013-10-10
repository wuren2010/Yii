<?php

//控制器基类
class Controller extends CController {

    public $layout = 'layout';
    public $menu = array();
    public $sidebar = array();
    public $breadcrumbs = array();

    public function init() {
        parent::init();
    }

}

?>
