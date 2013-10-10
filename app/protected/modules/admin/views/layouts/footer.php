<footer>
    <div class="link">
        <div class="container">
            <?php echo CHtml::link('Honoer.com', 'http://www.honoer.com', array('title' => 'Honoer.com')); ?>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <?php echo Yii::app()->params['copyright']; ?>
            Yii <?php echo Yii::getVersion(); ?>
        </div>
    </div>
</footer>