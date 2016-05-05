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
		if (task == 'new522125.cancel') {
			Joomla.submitform(task, document.getElementById('new522125-form'));
		}
		else {
			
			if (task != 'new522125.cancel' && document.formvalidator.isValid(document.id('new522125-form'))) {
				
				Joomla.submitform(task, document.getElementById('new522125-form'));
			}
			else {
				alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
			}
		}
	}
</script>

<form
	action="<?php echo JRoute::_('index.php?option=com_hacha&layout=edit&id=' . (int) $this->item->id); ?>"
	method="post" enctype="multipart/form-data" name="adminForm" id="new522125-form" class="form-validate">

	<div class="form-horizontal">
		<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>

		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_HACHA_TITLE_NEW522125', true)); ?>
		<div class="row-fluid">
			<div class="span10 form-horizontal">
				<fieldset class="adminform">

									<?php echo $this->form->renderField('id'); ?>
				<?php echo $this->form->renderField('title'); ?>
				<?php echo $this->form->renderField('preamble'); ?>
				<?php echo $this->form->renderField('text'); ?>
				<?php echo $this->form->renderField('date'); ?>
				<?php echo $this->form->renderField('image'); ?>
				<?php echo $this->form->renderField('created_at'); ?>
				<?php echo $this->form->renderField('title_ru'); ?>
				<?php echo $this->form->renderField('title_en'); ?>
				<?php echo $this->form->renderField('preamble_ru'); ?>
				<?php echo $this->form->renderField('preamble_en'); ?>
				<?php echo $this->form->renderField('text_ru'); ?>
				<?php echo $this->form->renderField('text_en'); ?>
				<?php echo $this->form->renderField('state'); ?>
				<?php echo $this->form->renderField('created_by'); ?>


					<?php if ($this->state->params->get('save_history', 1)) : ?>
					<div class="control-group">
						<div class="control-label"><?php echo $this->form->getLabel('version_note'); ?></div>
						<div class="controls"><?php echo $this->form->getInput('version_note'); ?></div>
					</div>
					<?php endif; ?>
				</fieldset>
			</div>
		</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>

		

		<?php echo JHtml::_('bootstrap.endTabSet'); ?>

		<input type="hidden" name="task" value=""/>
		<?php echo JHtml::_('form.token'); ?>

	</div>
</form>
