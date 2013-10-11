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
            <?php echo $this->renderPartial('/layouts/header'); ?>
        </div>

        <!-- Content -->
        <div class="wrap">
            <div class="row">
                <div class="col-md-3">
                    <?php echo $this->renderPartial('/layouts/_sidebar'); ?>
                    
                </div>
                <div class="col-md-9"><?php echo $content; ?></div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <?php //echo $this->renderPartial('/layouts/footer'); ?>
        </div>
        <script>
            (function(e){e.scrollUp=function(t){var n={scrollName:"scrollUp",topDistance:300,topSpeed:300,animation:"fade",animationInSpeed:200,animationOutSpeed:200,scrollText:"Scroll to top",scrollImg:false,activeOverlay:false};var r=e.extend({},n,t),i="#"+r.scrollName;e("<a/>",{id:r.scrollName,href:"#top",title:r.scrollText}).appendTo("body>.wrap");if(!r.scrollImg){e(i).text(r.scrollText)}e(i).css({display:"none",position:"fixed","z-index":"2147483647"});if(r.activeOverlay){e("body").append("<div id='"+r.scrollName+"-active'></div>");e(i+"-active").css({position:"absolute",top:r.topDistance+"px",width:"100%","border-top":"1px dotted "+r.activeOverlay,"z-index":"2147483647"})}e(window).scroll(function(){switch(r.animation){case"fade":e(e(window).scrollTop()>r.topDistance?e(i).fadeIn(r.animationInSpeed):e(i).fadeOut(r.animationOutSpeed));break;case"slide":e(e(window).scrollTop()>r.topDistance?e(i).slideDown(r.animationInSpeed):e(i).slideUp(r.animationOutSpeed));break;default:e(e(window).scrollTop()>r.topDistance?e(i).show(0):e(i).hide(0))}});e(i).click(function(t){e("html, body").animate({scrollTop:0},r.topSpeed);t.preventDefault()})}})(jQuery);
                        $.scrollUp({
                            scrollName: 'scrollUp', // Element ID
                            topDistance: '300', // Distance from top before showing element (px)
                            topSpeed: 300, // Speed back to top (ms)
                            animation: 'fade', // Fade, slide, none
                            animationInSpeed: 200, // Animation in speed (ms)
                            animationOutSpeed: 200, // Animation out speed (ms)
                            scrollText: '', // Text for element
                            activeOverlay: false  // Set CSS color to display scrollUp active point, e.g '#00FFFF'
                        });
        </script>
    </body>
</html>