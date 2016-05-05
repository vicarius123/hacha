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


?>
<?php if ($this->item) : ?>

	<div class="item_fields">
		<table class="table">
			<tr>
			<th><?php echo JText::_('COM_HACHA_FORM_LBL_TAG_ID'); ?></th>
			<td><?php echo $this->item->id; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_HACHA_FORM_LBL_TAG_NEWS_ID'); ?></th>
			<td><?php echo $this->item->news_id; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_HACHA_FORM_LBL_TAG_NEWSTAG_ID'); ?></th>
			<td><?php echo $this->item->newstag_id; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_HACHA_FORM_LBL_TAG_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_HACHA_FORM_LBL_TAG_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
</tr>

		</table>
	</div>
	
	<?php
else:
	echo JText::_('COM_HACHA_ITEM_NOT_LOADED');
endif;
