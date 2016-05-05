<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Hacha
 * @author     Cristopher Chong <cris_chong2@hotmail.com>
 * @copyright  2016 nOne.ru
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Hacha', JPATH_COMPONENT);
JLoader::register('HachaController', JPATH_COMPONENT . '/controller.php');


// Execute the task.
$controller = JControllerLegacy::getInstance('Hacha');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
