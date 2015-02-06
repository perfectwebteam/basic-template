<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_finder
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>

<form id="searchform" action="<?php echo JRoute::_($route); ?>" method="get" role="search" class="navbar-form navbar-right">
	<div class="form-group">
		<input type="text" name="q" id="search" class="auto_submit form-control input-sm" size="25" value="<?php echo(htmlspecialchars(JFactory::getApplication()->input->get('q', '', 'string')));?>">
		<div class="search-suggestions"></div>
	</div>
	<input type="submit" value="<?php echo $params->get('alt_label', JText::_('JSEARCH_FILTER_SUBMIT'));?>" class="btn btn-sm btn-default finder">
</form>
