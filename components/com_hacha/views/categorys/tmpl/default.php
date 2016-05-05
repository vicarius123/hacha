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
$items = $this->items;
$nn = 0;

$lang = JFactory::getLanguage()->getTag(); 
?>


	<? foreach($items as $key=>$item):?>
	
	<? if ($nn % 4 == 0):?>
	<div class="row">
	<? endif;?>
		<div class="col-sm-3 col-md-3 item" onclick="location.href='<?=JRoute::_('index.php?option=com_hacha&view=items&cat_id='.$item->id);?>'">
			<div class="img">
				<img src="http://hacha.ru/media/<?=$item->image;?>" height="220px"/>
			</div>
			<div class="title"><?=($lang == 'ru-RU')?$item->title:$item->title_en;?></div>
		</div>
	<? $nn++; ?>
	
	<? if ($nn % 4 == 0):?>
		</div>
		<br clear="all"/>
	<? endif;?>
	
	<? endforeach;?>


