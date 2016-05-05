<?php

/**
 * @version    CVS: 1.0.0
 * @package    Com_Hacha
 * @author     Cristopher Chong <cris_chong2@hotmail.com>
 * @copyright  2016 nOne.ru
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

/**
 * Class HachaFrontendHelper
 *
 * @since  1.6
 */
class HachaHelpersHacha
{
	/**
	* Get category name using category ID
	* @param integer $category_id Category ID
	* @return mixed category name if the category was found, null otherwise
	*/
	public static function getCategoryNameByCategoryId($category_id) {
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query
			->select('title')
			->from('#__categories')
			->where('id = ' . intval($category_id));

		$db->setQuery($query);
		return $db->loadResult();
	}
	/**
	 * Get an instance of the named model
	 *
	 * @param   string  $name  Model name
	 *
	 * @return null|object
	 */
	public static function getModel($name)
	{
		$model = null;

		// If the file exists, let's
		if (file_exists(JPATH_SITE . '/components/com_hacha/models/' . strtolower($name) . '.php'))
		{
			require_once JPATH_SITE . '/components/com_hacha/models/' . strtolower($name) . '.php';
			$model = JModelLegacy::getInstance($name, 'HachaModel');
		}

		return $model;
	}
}
