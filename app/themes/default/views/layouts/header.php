<header>
    <div class="container">
        <div class="navbar-header">
            <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/assets/images/logo.gif', Yii::app()->name), Yii::app()->homeUrl); ?>
        </div>
        <div class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <nav>
                <?php
                $this->widget('ext.navigation.NavigationWidget', array(
                    'route' => 'index/index',
                    'htmlOptions' => array('id' => 'nav-cross'),
                ));
                ?>
            </nav>
        </div>
    </div>
</header>

