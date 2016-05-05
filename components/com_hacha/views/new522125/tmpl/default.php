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
			<th><?php echo JText::_('COM_HACHA_FORM_LBL_NEW522125_ID'); ?></th>
			<td><?php echo $this->item->id; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_HACHA_FORM_LBL_NEW522125_TITLE'); ?></th>
			<td><?php echo $this->item->title; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_HACHA_FORM_LBL_NEW522125_PREAMBLE'); ?></th>
			<td><?php echo $this->item->preamble; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_HACHA_FORM_LBL_NEW522125_TEXT'); ?></th>
			<td><?php echo $this->item->text; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_HACHA_FORM_LBL_NEW522125_DATE'); ?></th>
			<td><?php echo $this->item->date; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_HACHA_FORM_LBL_NEW522125_IMAGE'); ?></th>
			<td><?php echo $this->item->image; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_HACHA_FORM_LBL_NEW522125_CREATED_AT'); ?></th>
			<td><?php echo $this->item->created_at; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_HACHA_FORM_LBL_NEW522125_TITLE_RU'); ?></th>
			<td><?php echo $this->item->title_ru; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_HACHA_FORM_LBL_NEW522125_TITLE_EN'); ?></th>
			<td><?php echo $this->item->title_en; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_HACHA_FORM_LBL_NEW522125_PREAMBLE_RU'); ?></th>
			<td><?php echo $this->item->preamble_ru; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_HACHA_FORM_LBL_NEW522125_PREAMBLE_EN'); ?></th>
			<td><?php echo $this->item->preamble_en; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_HACHA_FORM_LBL_NEW522125_TEXT_RU'); ?></th>
			<td><?php echo $this->item->text_ru; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_HACHA_FORM_LBL_NEW522125_TEXT_EN'); ?></th>
			<td><?php echo $this->item->text_en; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_HACHA_FORM_LBL_NEW522125_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_HACHA_FORM_LBL_NEW522125_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
</tr>

		</table>
	</div>
	
	<?php
else:
	echo JText::_('COM_HACHA_ITEM_NOT_LOADED');
endif;
