<div class="alert alert-info">
    当前页面：文件上传<?php echo Yii::app()->controller->id; ?>/<?php echo Yii::app()->controller->getAction()->id; ?>
</div>

<?php
$form = $this->beginWidget('CActiveForm', array('id' => 'form',
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
        'class' => 'form-horizontal'
    ),
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'focus' => array($model, 'pic_alt'),
        ));
?>
<?php echo $form->hiddenField($model, 'pic_relation', array('value' => '1')); ?>
<filedset>
    <legend>图片上传</legend>  

    <div class="alert alert-error">
        <?php echo $form->errorSummary($model); ?>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'pic_alt', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'pic_alt'); ?>
        </div>
    </div>

    <?php if (CCaptcha::checkRequirements()): ?>
        <div class="control-group">
            <?php echo $form->labelEx($model, 'verifyCode', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php
                $this->Widget('CCaptcha', array('id' => 'verify',
                    'showRefreshButton' => false,
                    'clickableImage' => true,
                    'imageOptions' => array('alt' => '看不清换一个', 'title' => '看不清换一个', 'style' => 'cursor:pointer')
                ));
                ?>
                <?php echo $form->textField($model, 'verifyCode', array('class' => 'span1')); ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'pic_path', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->fileField($model, 'pic_path'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <?php echo CHtml::submitButton('提交', array('name' => 'submit', 'class' => 'btn btn-primary')); ?>
        </div>
    </div>
</filedset>   
<?php $this->endWidget(); ?>
