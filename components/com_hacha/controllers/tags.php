<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Hacha
 * @author     Cristopher Chong <cris_chong2@hotmail.com>
 * @copyright  2016 nOne.ru
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * Tags list controller class.
 *
 * @since  1.6
 */
class HachaControllerTags extends HachaController
{
	/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional
	 * @param   array   $config  Configuration array for model. Optional
	 *
	 * @return object	The model
	 *
	 * @since	1.6
	 */
	public function &getModel($name = 'Tags', $prefix = 'HachaModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));

		return $model;
	}
}
