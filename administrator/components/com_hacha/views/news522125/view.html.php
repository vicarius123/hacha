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

jimport('joomla.application.component.view');

/**
 * View class for a list of Hacha.
 *
 * @since  1.6
 */
class HachaViewNews522125 extends JViewLegacy
{
	protected $items;

	protected $pagination;

	protected $state;

	/**
	 * Display the view
	 *
	 * @param   string  $tpl  Template name
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function display($tpl = null)
	{
		$this->state = $this->get('State');
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors));
		}

		HachaHelpersHacha::addSubmenu('news522125');

		$this->addToolbar();

		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return void
	 *
	 * @since    1.6
	 */
	protected function addToolbar()
	{
		$state = $this->get('State');
		$canDo = HachaHelpersHacha::getActions();

		JToolBarHelper::title(JText::_('COM_HACHA_TITLE_NEWS522125'), 'news522125.png');

		// Check if the form exists before showing the add/edit buttons
		$formPath = JPATH_COMPONENT_ADMINISTRATOR . '/views/new522125';

		if (file_exists($formPath))
		{
			if ($canDo->get('core.create'))
			{
				JToolBarHelper::addNew('new522125.add', 'JTOOLBAR_NEW');
				JToolbarHelper::custom('news522125.duplicate', 'copy.png', 'copy_f2.png', 'JTOOLBAR_DUPLICATE', true);
			}

			if ($canDo->get('core.edit') && isset($this->items[0]))
			{
				JToolBarHelper::editList('new522125.edit', 'JTOOLBAR_EDIT');
			}
		}

		if ($canDo->get('core.edit.state'))
		{
			if (isset($this->items[0]->state))
			{
				JToolBarHelper::divider();
				JToolBarHelper::custom('news522125.publish', 'publish.png', 'publish_f2.png', 'JTOOLBAR_PUBLISH', true);
				JToolBarHelper::custom('news522125.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
			}
			elseif (isset($this->items[0]))
			{
				// If this component does not use state then show a direct delete button as we can not trash
				JToolBarHelper::deleteList('', 'news522125.delete', 'JTOOLBAR_DELETE');
			}

			if (isset($this->items[0]->state))
			{
				JToolBarHelper::divider();
				JToolBarHelper::archiveList('news522125.archive', 'JTOOLBAR_ARCHIVE');
			}

			if (isset($this->items[0]->checked_out))
			{
				JToolBarHelper::custom('news522125.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
			}
		}

		// Show trash and delete for components that uses the state field
		if (isset($this->items[0]->state))
		{
			if ($state->get('filter.state') == -2 && $canDo->get('core.delete'))
			{
				JToolBarHelper::deleteList('', 'news522125.delete', 'JTOOLBAR_EMPTY_TRASH');
				JToolBarHelper::divider();
			}
			elseif ($canDo->get('core.edit.state'))
			{
				JToolBarHelper::trash('news522125.trash', 'JTOOLBAR_TRASH');
				JToolBarHelper::divider();
			}
		}

		if ($canDo->get('core.admin'))
		{
			JToolBarHelper::preferences('com_hacha');
		}

		// Set sidebar action - New in 3.0
		JHtmlSidebar::setAction('index.php?option=com_hacha&view=news522125');

		$this->extra_sidebar = '';
		JHtmlSidebar::addFilter(

			JText::_('JOPTION_SELECT_PUBLISHED'),

			'filter_published',

			JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), "value", "text", $this->state->get('filter.state'), true)

		);
	}

	/**
	 * Method to order fields 
	 *
	 * @return void 
	 */
	protected function getSortFields()
	{
		return array(
			'a.`id`' => JText::_('JGRID_HEADING_ID'),
			'a.`title`' => JText::_('COM_HACHA_NEWS522125_TITLE'),
			'a.`preamble`' => JText::_('COM_HACHA_NEWS522125_PREAMBLE'),
			'a.`text`' => JText::_('COM_HACHA_NEWS522125_TEXT'),
			'a.`date`' => JText::_('COM_HACHA_NEWS522125_DATE'),
			'a.`image`' => JText::_('COM_HACHA_NEWS522125_IMAGE'),
			'a.`created_at`' => JText::_('COM_HACHA_NEWS522125_CREATED_AT'),
			'a.`title_ru`' => JText::_('COM_HACHA_NEWS522125_TITLE_RU'),
			'a.`title_en`' => JText::_('COM_HACHA_NEWS522125_TITLE_EN'),
			'a.`preamble_ru`' => JText::_('COM_HACHA_NEWS522125_PREAMBLE_RU'),
			'a.`preamble_en`' => JText::_('COM_HACHA_NEWS522125_PREAMBLE_EN'),
			'a.`text_ru`' => JText::_('COM_HACHA_NEWS522125_TEXT_RU'),
			'a.`text_en`' => JText::_('COM_HACHA_NEWS522125_TEXT_EN'),
			'a.`ordering`' => JText::_('JGRID_HEADING_ORDERING'),
			'a.`state`' => JText::_('JSTATUS'),
			'a.`created_by`' => JText::_('COM_HACHA_NEWS522125_CREATED_BY'),
		);
	}
}
