<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <!-- blueprint CSS framework -->
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->module->assetsUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="<?php echo $this->module->assetsUrl; ?>/bootstrap-3.0.0/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->module->assetsUrl; ?>/css/style.css" />
        <script type="text/javascript" src="<?php echo $this->module->assetsUrl; ?>/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->module->assetsUrl; ?>/js/common.js"></script>
        <script type="text/javascript" src="<?php echo $this->module->assetsUrl; ?>/bootstrap-3.0.0/js/bootstrap.min.js"></script>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <!-- Header -->
        <div class="header">
            <?php //echo $this->renderPartial('/layouts/header'); ?>
        </div>

        <!-- Content -->
        <div class="wrap">
            <div class="container"><?php echo $content; ?></div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <?php //echo $this->renderPartial('/layouts/footer'); ?>
        </div>
    </body>
</html>