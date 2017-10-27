<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Notificationary
 * @author     gruz <arygroup@gmail.com>
 * @copyright  2017 gruz
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
$document->addStyleSheet(JUri::root() . 'media/com_notificationary/css/form.css');
?>
<script type="text/javascript">
	js = jQuery.noConflict();
	js(document).ready(function () {

	});

	Joomla.submitbutton = function (task) {
		if (task == 'rule.cancel') {
			Joomla.submitform(task, document.getElementById('rule-form'));
		}
		else {

			if (task != 'rule.cancel' && document.formvalidator.isValid(document.id('rule-form'))) {

				Joomla.submitform(task, document.getElementById('rule-form'));
			}
			else {
				alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
			}
		}
	}
</script>

<form
	action="<?php echo JRoute::_('index.php?option=com_notificationary&layout=edit&id=' . (int) $this->item->id); ?>"
	method="post" enctype="multipart/form-data" name="adminForm" id="rule-form" class="form-validate">


<?php
/*
foreach ($this->form->getFieldset('gruz') as $k => $v)
{
dump($v,$v->id);
	echo $v->renderField();
}
*/
?>
	<div class="form-horizontal">
		<?php echo $this->form->renderField('@version'); ?>

		<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>

		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_NOTIFICATIONARY_TITLE_RULE', true)); ?>
		<div class="row-fluid">
			<div class="span10 form-horizontal">
				<fieldset class="adminform">

				<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
				<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />
				<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />
				<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />
				<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />

					<?php foreach ($this->form->getGroup('main') as $field) : ?>
						<?php echo $field->renderField(); ?>
					<?php endforeach; ?>

				<?php /*
				<?php echo $this->form->renderField('created_by'); ?>
				<?php echo $this->form->renderField('modified_by'); ?>
				<?php echo $this->form->renderField('title'); ?>
				<?php echo $this->form->renderField('notifyon'); ?>
				<?php echo $this->form->renderField('test'); ?>
				<?php echo $this->form->renderField('subform'); ?>
				<?php echo $this->form->renderField('toggle'); ?>
				<?php echo $this->form->renderField('test2'); ?>
				*/?>




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

		<?php foreach (['where', 'whom', 'nswitch', 'message', 'author_modifier'] as $group_name) : ?>
				<?php echo JHtml::_('bootstrap.addTab', 'myTab', $group_name, JText::_('NOTIFICATIONARY_' . strtoupper($group_name)), true); ?>
						<?php foreach ($this->form->getFieldset($group_name) as $field) : ?>
							<?php
							$options = [];
							if ($field->getAttribute('type') == 'subform')
							{
								$options = [
									'class' => $field->getAttribute('class')
								];
							}
							echo $field->renderField($options);
							?>
						<?php endforeach; ?>
				<?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php endforeach; ?>


		<?php echo JHtml::_('bootstrap.endTabSet'); ?>

		<input type="hidden" name="task" value=""/>
		<?php echo JHtml::_('form.token'); ?>

	</div>
</form>
