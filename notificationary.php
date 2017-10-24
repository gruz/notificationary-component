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

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_notificationary'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Notificationary', JPATH_COMPONENT_ADMINISTRATOR);
JLoader::register('NotificationaryHelper', JPATH_COMPONENT_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'notificationary.php');

$controller = JControllerLegacy::getInstance('Notificationary');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
