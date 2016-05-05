<?php
	/**
		* @package     Joomla.Site
		* @subpackage  com_content
		*
		* @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
		* @license     GNU General Public License version 2 or later; see LICENSE.txt
	*/
	
	defined('_JEXEC') or die;
	
	JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
	
	// Create some shortcuts.
	$params    = &$this->item->params;
	$n         = count($this->items);
	$listOrder = $this->escape($this->state->get('list.ordering'));
	$listDirn  = $this->escape($this->state->get('list.direction'));
	
	// Check for at least one editable article
	$isEditable = false;
	
	if (!empty($this->items))
	{
		foreach ($this->items as $article)
		{
			if ($article->params->get('access-edit'))
			{
				$isEditable = true;
				break;
			}
		}
	}
	$monthes = array(
		1 => 'Января', 2 => 'Февраля', 3 => 'Марта', 4 => 'Апреля',
		5 => 'Мая', 6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
		9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
	);
	
?>

