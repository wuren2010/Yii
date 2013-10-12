<nav>
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div class="collapse navbar-collapse">
                <?php $this->widget('admin.widgets.MenuWidget', array('options' => array('style' => 'top', 'class' => 'nav navbar-nav'))); ?>
                <ul class="nav navbar-nav docs-item-top navbar-right">
                    <li class="dropdown">
                        <?php echo CHtml::link('<span class="glyphicon glyphicon-user"></span> ' . Yii::app()->user->name . '<span class="caret"></span>', '#', array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown')); ?>
                        <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items' => array(
                                array(
                                    'label' => '<span class="glyphicon glyphicon-home"></span> 前台首页',
                                    'url' => Yii::app()->homeUrl,
                                    'linkOptions' => array('target' => '_blank'),
                                ),
                                array(
                                    'label' => '',
                                    'itemOptions' => array('class' => 'divider'),
                                ),
                                array(
                                    'label' => '<span class="glyphicon glyphicon-log-out"></span> 退出',
                                    'url' => array('site/logout'),
                                ),
                            ),
                            'encodeLabel' => false,
                            'htmlOptions' => array('class' => 'dropdown-menu'),
                        ));
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div><!-- /.navbar -->
</nav>