<?php
defined('_JEXEC') or die;

/**
 * Template for Joomla! CMS, created with Artisteer.
 * See readme.txt for more details on how to use the template.
 */

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions.php';

// Create alias for $this object reference:
$document = $this;

// Shortcut for template base url:
$templateUrl = $document->baseurl . '/templates/' . $document->template;

Artx::load("Artx_Page");

// Initialize $view:
$view = $this->artx = new ArtxPage($this);

// Decorate component with Artisteer style:
$view->componentWrapper();

JHtml::_('behavior.framework', true);

?>
<!DOCTYPE html>
<html dir="ltr" lang="<?php echo $document->language; ?>">
<head>
    <jdoc:include type="head" />
    <link rel="stylesheet" href="<?php echo $document->baseurl; ?>/templates/system/css/system.css" />
    <link rel="stylesheet" href="<?php echo $document->baseurl; ?>/templates/system/css/general.css" />
	<link href="http://hacha.ru/static/favicon.ico" rel="shortcut icon" type="image/x-icon" />

    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width" />

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/template.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/custom.css" media="screen" type="text/css" />
    <!--[if lte IE 7]><link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/template.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/template.responsive.css" media="all" type="text/css" />


    <script>if ('undefined' != typeof jQuery) document._artxJQueryBackup = jQuery;</script>
    <script src="<?php echo $templateUrl; ?>/jquery.js"></script>
    <script>jQuery.noConflict();</script>

    <script src="<?php echo $templateUrl; ?>/script.js"></script>
    <script src="<?php echo $templateUrl; ?>/script.responsive.js"></script>
	
	<script src="//cdn.rawgit.com/vicarius123/none/hacha/jssor.slider.min.js"></script>
	<script src="//cdn.rawgit.com/vicarius123/none/hacha/jssor.js"></script>
	
    
    <?php $view->includeInlineScripts() ?>
    <script>if (document._artxJQueryBackup) jQuery = document._artxJQueryBackup;</script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	
	<script src="<?php echo $templateUrl; ?>/jquery.matchHeight.js"></script>
	
	<script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU"></script>
</head>
<body>

<div id="main">
    <div class="sheet clearfix">
<header class="header"><?php echo $view->position('header', 'nostyle'); ?>

<?php if ($view->containsModules('user3', 'extra1', 'extra2')) : ?>

    
<?php if ($view->containsModules('extra1')) : ?>
<div class="hmenu-extra1"><?php echo $view->position('extra1'); ?></div>
<?php endif; ?>
<?php if ($view->containsModules('extra2')) : ?>
<div class="hmenu-extra2"><?php echo $view->position('extra2'); ?></div>
<?php endif; ?>
<?php echo $view->position('user3'); ?>

<?php endif; ?>

                    
</header>
<?php echo $view->position('banner1', 'nostyle'); ?>
<?php echo $view->positions(array('top1' => 33, 'top2' => 33, 'top3' => 34), 'block'); ?>
<div class="layout-wrapper">
                <div class="content-layout">
                    <div class="content-layout-row">
                        <?php if ($view->containsModules('left')) : ?>
<div class="layout-cell sidebar1">
<?php echo $view->position('left', 'block'); ?>




                        </div>
<?php endif; ?>
                        <div class="layout-cell content">
<?php
  echo $view->position('banner2', 'nostyle');
  if ($view->containsModules('breadcrumb'))
    echo artxPost($view->position('breadcrumb'));
  echo $view->positions(array('user1' => 50, 'user2' => 50), 'article');
  echo $view->position('banner3', 'nostyle');
  echo artxPost(array('content' => '<jdoc:include type="message" />', 'classes' => ' messages'));
  echo '<jdoc:include type="component" />';
  echo $view->position('banner4', 'nostyle');
  echo $view->positions(array('user4' => 50, 'user5' => 50), 'article');
  echo $view->position('banner5', 'nostyle');
?>



                        </div>
                    </div>
                </div>
            </div>
<?php echo $view->positions(array('bottom1' => 33, 'bottom2' => 33, 'bottom3' => 34), 'block'); ?>
<?php echo $view->position('banner6', 'nostyle'); ?>


    </div>
	<footer class="footer">
  <div class="footer-inner">
<?php if ($view->containsModules('copyright')) : ?>
    <?php echo $view->position('copyright', 'nostyle'); ?>

<? endif;?>
</div>
</footer>

</div>


<?php echo $view->position('debug'); ?>
</body>
<script src="//cdn.rawgit.com/vicarius123/none/hacha/modules.js"></script>
</html>