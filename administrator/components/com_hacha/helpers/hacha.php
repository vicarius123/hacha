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

/**
 * Hacha helper.
 *
 * @since  1.6
 */
class HachaHelpersHacha
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param   string  $vName  string
	 *
	 * @return void
	 */
	public static function addSubmenu($vName = '')
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_HACHA_TITLE_CATEGORYS'),
			'index.php?option=com_hacha&view=categorys',
			$vName == 'categorys'
		);

JHtmlSidebar::addEntry(
			JText::_('COM_HACHA_TITLE_ITEMS'),
			'index.php?option=com_hacha&view=items',
			$vName == 'items'
		);

		JHtmlSidebar::addEntry(
			JText::_('JCATEGORIES') . ' (' . JText::_('COM_HACHA_TITLE_ITEMS') . ')',
			"index.php?option=com_categories&extension=com_hacha",
			$vName == 'categories'
		);
		if ($vName=='categories') {
			JToolBarHelper::title('Hacha: JCATEGORIES (COM_HACHA_TITLE_ITEMS)');
		}

JHtmlSidebar::addEntry(
			JText::_('COM_HACHA_TITLE_NEWSGALERYS'),
			'index.php?option=com_hacha&view=newsgalerys',
			$vName == 'newsgalerys'
		);

JHtmlSidebar::addEntry(
			JText::_('COM_HACHA_TITLE_NEWS522125'),
			'index.php?option=com_hacha&view=news522125',
			$vName == 'news522125'
		);

JHtmlSidebar::addEntry(
			JText::_('COM_HACHA_TITLE_TAGS'),
			'index.php?option=com_hacha&view=tags',
			$vName == 'tags'
		);

JHtmlSidebar::addEntry(
			JText::_('COM_HACHA_TITLE_NEWSTAGS'),
			'index.php?option=com_hacha&view=newstags',
			$vName == 'newstags'
		);

	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @return    JObject
	 *
	 * @since    1.6
	 */
	public static function getActions()
	{
		$user   = JFactory::getUser();
		$result = new JObject;

		$assetName = 'com_hacha';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action)
		{
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}
}


class HachaHelper extends HachaHelpersHacha
{

}
