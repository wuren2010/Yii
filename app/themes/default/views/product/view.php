<div class="product">
    <div class="row-fluid">
        <div class="span3">
            <?php if (empty($data['picture'])): ?>
                <?php echo CHtml::image(Yii::app()->theme->baseUrl . '/Public/Images/no-pic-product.gif'); ?>
            <?php else: ?>
                <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/' . $data['picture'][0]['pic_path'], $data['picture'][0]['pic_alt']), 'javascript:;', array('class' => 'thumbnail', 'title' => $data['picture'][0]['pic_alt'])); ?>
                <div class="pagination"> 
                    <ul>
                        <?php foreach ($data['picture'] as $item): ?>
                            <li><?php echo CHtml::image(Yii::app()->baseUrl . '/' . $item['pic_path'], $item['pic_alt'], array('width' => '60', 'height' => '60')); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <div class="span9">
            <h5><?php echo $data['product_name']; ?></h5>
            <p><?php echo $data['product_introduce']; ?></p>
            <p><?php echo $data['product_create_time']; ?></p>
        </div>
    </div>
    <?php echo $data['product_content']; ?>
</div>
