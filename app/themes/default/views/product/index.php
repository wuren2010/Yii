<?php foreach ($list as $item): ?>
    <div class="col-xs-6 col-md-4">
        <a class="thumbnail" href="<?php echo Yii::app()->createUrl('product/view', array('cid' => $item['category_id'], 'id' => $item['product_id'])); ?>">
            <img style="height:150px;" alt="" src="<?php echo Yii::app()->baseUrl . '/' . $item['product_picture']; ?>">
        </a>
        <h5><a href="<?php echo Yii::app()->createUrl('product/view', array('cid' => $item['category_id'], 'id' => $item['product_id'])); ?>"><?php echo $item['product_name']; ?></a></h5>
        <p><?php echo $item['product_create_time']; ?></p>
    </div>
<?php endforeach; ?>