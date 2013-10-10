<?php $this->widget('admin.widgets.CategoryListWidget', array('selected' => '')); ?>
<?php //.     ?>
<form class="form-inline" role="form">
    <table class="table table-hover">
        <?php foreach ($list as $val): ?>
            <tr>
                <td><?php echo $val->category_id; ?></td>
                <td>
                    <?php echo str_repeat('|---', count(explode('-', $val->category_path)) - 1); ?>
                    <div class="form-group"><?php echo CHtml::textField('category_name', $val->category_name, array('class' => 'form-control')) ?></div>
                </td>
                <td>
                    <?php echo CHtml::link('<span class="glyphicon glyphicon-edit"></span> 编辑', $this->createUrl('edit', array('category_id' => $val->category_id)), array('title' => '编辑')); ?> |
                    <?php echo CHtml::link('<span class="glyphicon glyphicon-trash"></span> 删除', $this->createUrl('delete', array('category_id' => $val->category_id)), array('title' => '删除')); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</form>