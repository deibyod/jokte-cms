<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.6
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
//load user_profile plugin language
$lang = JFactory::getLanguage();
$lang->load( 'plg_user_profile', JPATH_ADMINISTRATOR );
?>
<div class="profile-edit<?php echo $this->pageclass_sfx?>">
<?php if ($this->params->get('show_page_heading')) : ?>
	<h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
<?php endif; ?>

<form id="member-profile" action="<?php echo JRoute::_('index.php?option=com_users&task=profile.save'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
<?php foreach ($this->form->getFieldsets() as $group => $fieldset):// Iterate through the form fieldsets and display each one.?>
	<?php $fields = $this->form->getFieldset($group);?>
	<?php if (count($fields)):?>
	<fieldset>
		<?php if (isset($fieldset->label)):// If the fieldset has a label set, display it as the legend.?>
		<legend><?php echo JText::_($fieldset->label); ?></legend>
		<?php endif;?>
            <?php foreach ($fields as $field):// Iterate through the fields in the set and display them.?>
                <div class="form-fields">
                <?php if (!$field->required && $field->type!='Spacer' && $field->name!='jform[username]'): ?>
                    <div class="optional-field">
                        <span style="display:inline"><?php echo JText::_('COM_USERS_OPTIONAL'); ?></span>
                    </div>
                <?php endif; ?>
                <?php if ($field->hidden):// If the field is hidden, just display the input.?>
                    <?php echo $field->input;?>
                <?php else:?>
                    <?php echo $field->label; ?>
                    <?php echo $field->input; ?>
                    <div id="cls"></div>
                <?php endif;?>
                </div>
            <?php endforeach;?>
	</fieldset>
	<?php endif;?>
<?php endforeach;?>

		<div class="form-controls">
			<button type="submit" class="button validate"><span><?php echo JText::_('JSUBMIT'); ?></span></button>
			<?php echo JText::_('COM_USERS_OR'); ?>
			<a href="<?php echo JRoute::_(''); ?>" title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a>

			<input type="hidden" name="option" value="com_users" />
			<input type="hidden" name="task" value="profile.save" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
	</form>
</div>
