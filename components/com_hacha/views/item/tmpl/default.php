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

$item = $this->item;

$lang = JFactory::getLanguage()->getTag(); 
?>
<?php if ($item) : ?>

	<div class="pop_up_menu">
		<div class="closeIcon"></div>
		<div class="row">
		
			<div class="col-sm-6 rounded">
				<img alt="" style="max-height:307px;border-radius: 18px;max-width: 100%;" src="http://hacha.ru/media/<?=$item->image;?>">
			</div>
			
			<div class="col-sm-6">
				<div class="title"><?=($lang == 'ru-RU')?$item->title_ru:$item->title_en;?></div>
				<div class="topLine">
					<div class="price">
						<span class="digit"><?=number_format($item->price);?></span> <?=($lang == 'ru-RU')? 'руб.':'rub.'?>
						</div>
				</div>
				<span class="quanBlock">
					<span class="item plus"></span>
				</span>
				<br clear="all">
				<? if($item->text_ru):?>
				<div class="ingridients" style="display: block;">
					<strong><?=($lang == 'ru-RU')? 'Состав':'Composition'?></strong>
					<div class="text">
						<p><?=($lang == 'ru-RU')?$item->text_ru:$item->text_en;?></p>
					</div>
				</div>
				<? endif;?>
				<? if($item->weight):?>
				<div class="weight" style="display: block;">
					<strong><?=($lang == 'ru-RU')? 'Выход в граммах':'Yield in grams'?></strong><br>
					<span class="digit"><?=$item->weight;?></span>
				</div>
				<? endif;?>
			</div>
		</div>
	</div>

<?php
else:
	echo JText::_('COM_HACHA_ITEM_NOT_LOADED');
endif;
?>
