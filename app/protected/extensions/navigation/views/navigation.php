<?php

$this->widget('zii.widgets.CMenu', array(
    'id' => isset($htmlOptions['id'])? $htmlOptions['id'] : '',
    'htmlOptions' => array('class' => $htmlOptions['class']),
    'activeCssClass' => 'active',
    'items' => $items,
));
?>