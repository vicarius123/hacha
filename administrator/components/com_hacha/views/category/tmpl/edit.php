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
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root() . 'media/com_hacha/css/form.css');
?>
<script type="text/javascript">
	js = jQuery.noConflict();
	js(document).ready(function () {
		
	});

	Joomla.submitbutton = function (task) {
		if (task == 'category.cancel') {
			Joomla.submitform(task, document.getElementById('category-form'));
		}
		else {
			
			if (task != 'category.cancel' && document.formvalidator.isValid(document.id('category-form'))) {
				
				Joomla.submitform(task, document.getElementById('category-form'));
			}
			else {
				alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
			}
		}
	}
</script>

<form
	action="<?php echo JRoute::_('index.php?option=com_hacha&layout=edit&id=' . (int) $this->item->id); ?>"
	method="post" enctype="multipart/form-data" name="adminForm" id="category-form" class="form-validate">

	<div class="form-horizontal">

		<div class="row-fluid">
			<div class="span10 form-horizontal">
				<fieldset class="adminform">

				<?php echo JHtml::_('bootstrap.startTabSet', 'myTab_1', array('active' => 'general_ru')); ?>
				<!-- RU -->
				<?php echo JHtml::_('bootstrap.addTab', 'myTab_1', 'general_ru', JText::_('RU', true)); ?>
				<?php echo $this->form->renderField('title'); ?>
				<?php echo JHtml::_('bootstrap.endTab'); ?>
				
				
				<!-- EN -->
				<?php echo JHtml::_('bootstrap.addTab', 'myTab_1', 'general_en', JText::_('EN', true)); ?>
				<?php echo $this->form->renderField('title_en'); ?>
				<?php echo JHtml::_('bootstrap.endTab'); ?>
				
				<?php echo JHtml::_('bootstrap.endTabSet'); ?>
				
				
				<?php echo $this->form->renderField('image'); ?>
				<?php echo $this->form->renderField('delivery'); ?>



					<?php if ($this->state->params->get('save_history', 1)) : ?>
					<div class="control-group">
						<div class="control-label"><?php echo $this->form->getLabel('version_note'); ?></div>
						<div class="controls"><?php echo $this->form->getInput('version_note'); ?></div>
					</div>
					<?php endif; ?>
				</fieldset>
			</div>
		</div>


		<input type="hidden" name="task" value=""/>
		<?php echo JHtml::_('form.token'); ?>

	</div>
</form>
