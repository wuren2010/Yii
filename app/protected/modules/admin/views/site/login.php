<div class="login-form">
    <filedset>  
        <legend>用户登录</legend>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'form',
            'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form'),
                ));
        ?>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'username', array('class' => 'col-md-4 control-label')); ?>
            <div class="col-md-4">
                <?php echo $form->textField($model, 'username', array('class' => 'form-control')); ?>
            </div>
            <div class="col-md-4">
                <?php echo $form->error($model, 'username', array('class' => 'text-danger')); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->label($model, 'password', array('class' => 'col-md-4 control-label')); ?>
            <div class="col-md-4">
                <?php echo $form->textField($model, 'password', array('class' => 'form-control')); ?>
            </div>
            <div class="col-md-4">
                <?php echo $form->error($model, 'password', array('class' => 'text-danger')); ?>
            </div>
        </div>
        <?php if (CCaptcha::checkRequirements()): ?>
            <div class="form-group">
                <?php echo $form->label($model, 'verifyCode', array('class' => 'col-md-4 control-label')); ?>
                <div class="col-md-4">
                    <?php echo $form->textField($model, 'verifyCode', array('class' => 'form-control', 'style' => 'width:80px;float:left;')); ?>
                    <?php
                    $this->widget('CCaptcha', array(
                        'id' => 'verify',
                        'showRefreshButton' => false,
                        'clickableImage' => true,
                        'imageOptions' => array(
                            'alt' => '看不清换一个',
                            'title' => '看不清换一个',
                            'style' => 'cursor:pointer;',
                        ),
                    ));
                    ?>
                </div>
                <div class="col-md-4">
                    <?php echo $form->error($model, 'verifyCode', array('class' => 'text-danger')); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <span class="col-md-4">&nbsp;</span>
            <div class="col-md-8">
                <?php echo CHtml::submitButton('登录', array('name' => 'submit', 'class' => 'btn btn-primary')); ?>
            </div>
        </div>
        <?php $this->endWidget($form); ?>
    </filedset>   
</div>