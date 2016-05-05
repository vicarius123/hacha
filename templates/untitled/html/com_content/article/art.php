<?php
	/**
		* @package     Joomla.Site
		* @subpackage  com_content
		*
		* @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
		* @license     GNU General Public License version 2 or later; see LICENSE.txt
	*/
	
	defined('_JEXEC') or die;
	
	JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
	
	// Create shortcuts to some parameters.
	$params  = $this->item->params;
	$images  = json_decode($this->item->images);
	$urls    = json_decode($this->item->urls);
	$canEdit = $params->get('access-edit');
	$user    = JFactory::getUser();
	$info    = $params->get('info_block_position', 0);
	JHtml::_('behavior.caption');
	
	$item = $this->item;
	
	$model = $this->getModel();
	
	$slider_a = $model->getSlider($item->slider);
	
	$slider = json_decode($slider_a[0]->data);
	$slider_pics = $slider->items;
	$lang = JFactory::getLanguage()->getTag(); 

	if ($item->slider != 0):

	?>
<script>
	
	jQuery(document).ready(function ($) {
		
		var _SlideshowTransitions = [
		{ $Duration: 1200, $Opacity: 2 }
		];
		
		var options = {
			$AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
			$AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
			$AutoPlayInterval: <?=$slider->_widget->data->interval;?>,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
			$PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1
			
			$ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
			$SlideDuration: <?=$slider->_widget->data->duration;?>,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
			$MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
			//$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
			//$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
			$SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
			$DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
			$ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
			$UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
			$PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
			$DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
			
			$SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
				$Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
				$Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
				$TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
				$ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
			},
			
			$BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
				$Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
				$ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
				$AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
				$Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
				$Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
				$SpacingX: 10,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
				$SpacingY: 10,                                   //[Optional] Vertical space between each item in pixel, default value is 0
				$Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
			},
			
			$ArrowNavigatorOptions: {
				$Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
				$ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
				$Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
			}
		};
		var jssor_slider1 = new $JssorSlider$("slider1_container", options);
		//responsive code begin
		//you can remove responsive code if you don't want the slider scales while window resizes
		function ScaleSlider() {
			var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
			if (parentWidth)
			jssor_slider1.$ScaleWidth(Math.min(parentWidth, 970));
			else
			window.setTimeout(ScaleSlider, 30);
		}
		ScaleSlider();
		
		$(window).bind("load", ScaleSlider);
		$(window).bind("resize", ScaleSlider);
		$(window).bind("orientationchange", ScaleSlider);
		//responsive code end
	});
</script>
<? endif;?>
<div class="item-page <?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Article">
	<meta itemprop="inLanguage" content="<?php echo ($this->item->language === '*') ? JFactory::getConfig()->get('language') : $this->item->language; ?>" />
	
	
	
	
	<div class="b-textBlock">
		<? if(!empty($item->introtext)):?>
		<div class="<?=($this->pageclass_sfx !=' address')?'top':'';?>">
			<?=($lang == 'ru-RU')?$item->introtext:$item->introtext_en;?>
		</div>
		
		<br clear="all"/>
		<? endif;?>
		
		<? if ($item->slider != 0):?>
		<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 970px; height: 495px; overflow: hidden; ">
			<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 970px; height: 495px; overflow: hidden;">
				<?foreach($slider_pics as $key=>$pic):?>
				<div>
					<img src="<?=$pic->media;?>" height="100%" class="slide_pic"/>
				</div>
				<?endforeach;?>			
			</div>
			
			<span u="arrowleft" class="jssora12l"></span>
			<!-- Arrow Right -->
			<span u="arrowright" class="jssora12r"></span>
			<div class="galler_shadow_l"></div>
			<div class="galler_shadow_r"></div>
		</div>
		<? endif;?>
		
		<? if(!empty($item->fulltext)):?>
		<div class="bottom">
			<div class="left">
				<p><?=($lang == 'ru-RU')?$item->fulltext:$item->fulltext_en;?></p>
			</div>
			
			<? if($item->right_ru):?>
			
			<div class="right">
				<?=($lang == 'ru-RU')?$item->right_ru:$item->right_en;?>
				<br clear="all"/>
			</div>
			<? endif;?>
			<br clear="all"/>
		</div>
		<? endif;?>
	</div>
	
	
	
	
</div>