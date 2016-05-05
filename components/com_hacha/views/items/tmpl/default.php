<?php
	/**
		* @version    CVS: 1.0.0
		* @package    Com_Hacha
		* @author     Cristopher Chong <cris_chong2@hotmail.com>
		* @copyright  2016 nOne.ru
		* @license    GNU General Public License version 2 or later; see LICENSE.txt
	*/
	// No direct access
	defined('_JEXEC') or die;
	
	JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
	JHtml::_('bootstrap.tooltip');
	JHtml::_('behavior.multiselect');
	JHtml::_('formbehavior.chosen', 'select');
	
	$user       = JFactory::getUser();
	$userId     = $user->get('id');
	$listOrder  = $this->state->get('list.ordering');
	$listDirn   = $this->state->get('list.direction');
	$canCreate  = $user->authorise('core.create', 'com_hacha');
	$canEdit    = $user->authorise('core.edit', 'com_hacha');
	$canCheckin = $user->authorise('core.manage', 'com_hacha');
	$canChange  = $user->authorise('core.edit.state', 'com_hacha');
	$canDelete  = $user->authorise('core.delete', 'com_hacha');
	
	$jinput = JFactory::getApplication()->input;
	$Itemid = $jinput->get('id',0);
	
	$items = $this->items;
	
	
	$lang = JFactory::getLanguage()->getTag(); 
	
	$model = $this->getModel();
	
	$cats = $model->getCats();
	
	$cat_title = $model->getCatTitle($Itemid);
?>
<div class="cats_menu row">
	<?
		$n = 0;
		$max = count($cats)/4;
		$max = ceil($max);
		foreach($cats as $key=>$cat):
		
		$title = ($lang == 'ru-RU')? $cat->title : $cat->title_en;
	if($n % $max == 0):?>
	
	<div class="col-sm-3 col-xs-6">
		
		<? endif;?>
		
		
		<div class="">
			
			<div onclick="location.href='<?=JRoute::_('index.php?option=com_hacha&view=items&cat_id='.$cat->id);?>'">
				<a href="<?=JRoute::_('index.php?option=com_hacha&view=items&cat_id='.$cat->id);?>">
					<?=($Itemid == $cat->id)? '<b>'.$title.'</b>' : $title;?>
				</a>
			</div>
		</div>
		<?
			$n++;
		if($n % $max == 0):?>
		
	</div>
	
	<?
		endif;
		endforeach;
	?>
</div>

<div class="mainTitleCat"><?=($lang == 'ru-RU')?$cat_title[0]->title:$cat_title[0]->title_en;?></div>

<div>

<? $nn = 0; foreach($items as $key=>$item):?>
	<? if ($nn % 4 == 0):?>
	<div class="row">
	<? endif;?>
	
	<div class="col-sm-3 item item_inn" data-item_id="<?=$item->id;?>">
		
		<div class="img">
			<img src="http://hacha.ru/media/<?=$item->image;?>" height="220px"/>
		</div>
		<div class="title"><?=($lang == 'ru-RU')?$item->title:$item->title_en;?></div>
		<span class="price"><?=number_format($item->price);?> <?= ($lang == 'ru-RU')? 'руб.' : 'rub.'?></span>
		<span class="quanBlock" style="position: absolute; right: 15px; bottom: 5px;"><span class="item plus to_tomato" data-dish-external-id="382"></span></span>
	</div>	
	
	<? $nn++; ?>
	
	<? if ($nn % 4 == 0):?>
	
	</div>
	<br clear="all"/>
	<? endif;?>
<? endforeach;?>

</div>
<br clear="all"/><br clear="all"/>
<div class="popup_wrap">
	<div class="pop_in">
		
	</div>
</div>

<script>
	jQuery(document).click(function(e){
		var tgt = e.target;
		
		if(jQuery(tgt).is('.pop_in')){
			jQuery('.popup_wrap').fadeOut('500');
		}
	});
	jQuery(document).ready(function(){
		
		jQuery('.item_inn').click(function(e){
			
			var item_id = jQuery(this).data('item_id');
			var url = '/index.php?option=com_hacha&view=item&id='+item_id;
			jQuery.ajax({
				url: url,
				success: function(data){
					jQuery('.popup_wrap').css('display','table').hide().fadeIn('500');
					var popup = jQuery(data).find('.pop_up_menu');
					
					jQuery('.popup_wrap div').hide().empty().append(popup).fadeIn('500');
					
					jQuery('.closeIcon').click(function(){
						jQuery('.popup_wrap').fadeOut('500');
					});
					
					
					
					
				}
			});
			
			e.preventDefault();
		});
		
		
	});
	
	jQuery('.item_inn .title').matchHeight({byRow: true, property: 'height'});
	
	jQuery(document).on('keyup',function(evt) {
		if (evt.keyCode == 27) {
			jQuery('.popup_wrap').fadeOut('500');
		}
		evt.preventDefault();
	});
</script>



