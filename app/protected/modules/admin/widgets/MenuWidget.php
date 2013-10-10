<?php

class MenuWidget extends CWidget {

    const MEUN_TYPE_TOP = 'top';
    const MEUN_TYPE_SIDE = 'side';

    public $style;

    public function init() {
        if (!isset($this->style)) {
            $this->style = self::MEUN_TYPE_TOP;
        }
    }

    public function run() {
        $controller = Yii::app()->controller->id;
        $action = Yii::app()->controller->action->id;
        $list = $this->menuConfig();
        $items = array();
        foreach ($list as $key => $value) {
            $list[$key]['active'] = ($controller === $key);
            if ($this->style === self::MEUN_TYPE_TOP) {
                unset($list[$key]['items']);
                $items = $list;
            } else if ($this->style === self::MEUN_TYPE_SIDE) {
                $items = $list[$controller]['items'];
                foreach ($items as $k => $val) {
                    $items[$k]['active'] = ($action === $val['url'][0]);
                }
            }
        }
        return $this->widget('zii.widgets.CMenu', array(
                    'items'          => $items,
                    'encodeLabel'    => false,
                    'itemCssClass'   => 'list-group-item',
                    'activeCssClass' => 'active',
                    'htmlOptions'    => array('class' => 'list-group docs-item-' . $this->style),
                ));
    }

    public function menuConfig() {
        return array(
            'setting' => array(
                'label' => '<span class="glyphicon glyphicon-cog"></span> 系统设置',
                'url'   => array('setting/'),
                'items' => array(
                    array('label' => '系统信息', 'url'   => array('index')),
                    array('label' => '基本设置', 'url'   => array('system')),
                )
            ),
            'category' => array(
                'label' => '<span class="glyphicon glyphicon-th-list"></span> 栏目配置',
                'url'   => array('category/'),
                'items' => array(
                    array('label' => '栏目列表', 'url'   => array('index')),
                    array('label' => '字段配置', 'url'   => array('system')),
                    array('label' => '大师的撒大大的', 'url'   => array('other')),
                )
            ),
            'contents' => array(
                'label' => '<span class="glyphicon glyphicon-th-list"></span> 内容管理',
                'url'   => array('contents/'),
                'items' => array(
                    array('label' => '简介管理', 'url'   => array('index')),
                    array('label' => '文章管理', 'url'   => array('system')),
                    array('label' => '产品管理', 'url'   => array('other')),
                    array('label' => '下载管理', 'url'   => array('other')),
                    array('label' => '图片管理', 'url'   => array('other')),
                    array('label' => '招聘管理', 'url'   => array('other')),
                    array('label' => '留言管理', 'url'   => array('other')),
                )
            ),
        );
    }

}

?>
