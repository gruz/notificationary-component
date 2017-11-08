<?php
/**
 * @version    CVS: 1.0.1
 * @package    Com_Notificationary
 * @author     Gruz <arygroup@gmail.com>
 * @copyright  2017 Gruz
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Rule controller class.
 *
 * @since  1.6
 */
class NotificationaryControllerRule extends JControllerForm
{
	/**
	 * Constructor
	 *
	 * @throws Exception
	 */
	public function __construct()
	{
		$this->view_list = 'rules';
		parent::__construct();
	}
}
