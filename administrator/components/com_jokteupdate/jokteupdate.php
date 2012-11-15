<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	com_joomlaupdate
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		2.5.4
 */

defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_jokteupdate')) {
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

$controller	= JControllerLegacy::getInstance('Jokteupdate');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();
