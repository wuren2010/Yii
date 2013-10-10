<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <!-- blueprint CSS framework -->
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/Public/Css/ie.css" media="screen, projection" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/Public/bootstrap-3.0.0/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/Public/bootstrap-3.0.0/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/Public/Css/style.css" />
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/Public/Js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/Public/Js/common.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/Public/bootstrap-3.0.0/js/bootstrap.min.js"></script>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h1 style="font-size: 38.5px;">
                    <?php echo $error['code']; ?>
                </h1>
            </div>
            <div class="alert alert-danger">
                <?php echo $error['message'] ?><span>Line:<?php echo $error['line'] ?></span>
            </div>
        </div>
    </body>
</html>