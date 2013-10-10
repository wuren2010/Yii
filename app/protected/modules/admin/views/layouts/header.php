<nav role="navigation" class="navbar navbar-fixed-top">
    <div class="navbar-header">
        <a class="navbar-brand" href="./">Bootstrap</a>
    </div>
    <div class="navbar-collapse collapse">
        <?php $this->widget('admin.widgets.MenuWidget', array('style' => 'top')); ?>
        <div class="pull-right">
            <div class="dropdown">
                <?php echo CHtml::link('<span class="glyphicon glyphicon-user"></span> ' . Yii::app()->user->name . '<span class="caret"></span>', '#', array('class'       => 'dropdown-toggle', 'data-toggle' => 'dropdown')); ?>
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'items' => array(
                        array(
                            'label'       => '<span class="glyphicon glyphicon-home"></span> 前台首页',
                            'url'         => Yii::app()->homeUrl,
                            'linkOptions' => array('target' => '_blank'),
                        ),
                        array(
                            'label'       => '',
                            'itemOptions' => array('class' => 'divider'),
                        ),
                        array(
                            'label' => '<span class="glyphicon glyphicon-log-out"></span> 退出',
                            'url'   => array('site/logout'),
                        ),
                    ),
                    'encodeLabel' => false,
                    'htmlOptions' => array('class' => 'dropdown-menu'),
                ));
                ?>
            </div>
        </div>
    </div>
</nav>