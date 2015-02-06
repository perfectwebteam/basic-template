<?php
// Template by Perfect Web Team // www.perfectwebteam.nl //
defined('_JEXEC') or die;

// Connect with Joomla
$app 			= JFactory::getApplication();
$doc 			= JFactory::getDocument();

// Get variables
$option   	 	= $app->input->getCmd('option', '');
$view     		= $app->input->getCmd('view', '');
$layout   		= $app->input->getCmd('layout', '');
$task     		= $app->input->getCmd('task', '');
$itemid   		= $app->input->getCmd('Itemid', '');
$id				= $app->input->getCmd('id', '');
$sitename 		= $app->getCfg('sitename');
$menu 			= $app->getMenu();
$menu_active 	= $menu->getActive();
$frontpage 		= ($menu_active == $menu->getDefault() ? true : false);

// Browser info
jimport('joomla.environment.browser');
$browser 		= JBrowser::getInstance();
$browserType 	= $browser->getBrowser();
$browserVersion = $browser->getMajor();

// Call JavaScript to be able to unset it :-S
JHtml::_('behavior.framework');
JHtml::_('bootstrap.framework');
JHtml::_('jquery.framework');
JHtml::_('bootstrap.tooltip');

// Unset unwanted JavaScript
unset($this->_scripts[$this->baseurl .'/media/system/js/mootools-core.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/mootools-more.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/caption.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/core.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/jquery.min.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/jquery-noconflict.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/jquery-migrate.min.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/bootstrap.min.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/tabs-state.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/validate.js']);
unset($this->_scripts[$this->baseurl .'/media/com_finder/js/autocompleter.js']);

if (isset($this->_script['text/javascript']))
{
	$this->_script['text/javascript'] = preg_replace('%jQuery\(window\)\.on\(\'load\'\,\s*function\(\)\s*\{\s*new\s*JCaption\(\'img.caption\'\);\s*}\s*\);\s*%', '', $this->_script['text/javascript']);

	$this->_script['text/javascript'] = preg_replace("%\s*jQuery\(document\)\.ready\(function\(\)\{\s*jQuery\('\.hasTooltip'\)\.tooltip\(\{\"html\":\s*true,\"container\":\s*\"body\"\}\);\s*\}\);\s*%", '', $this->_script['text/javascript']);

	// Unset completly if empty
	if (empty($this->_script['text/javascript']))
	{
		unset($this->_script['text/javascript']);
	}
}

// Unset unwanted CSS
$unset_css = array('com_rsform','com_finder');

foreach($this->_styleSheets as $name=>$style)
{
	foreach($unset_css as $css)
	{
		if (strpos($name,$css) !== false)
		{
			unset($this->_styleSheets[$name]);
		}
	}
}

// Add Javascripts
$doc->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', 'text/javascript', true);
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/site.min.js', 'text/javascript', true);

// Add Stylesheets
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');

// Set MetaData
$doc->setMetaData('viewport', 'width=device-width, initial-scale=1.0' );
$doc->setMetaData('content-type', 'text/html', true );
$doc->setGenerator($sitename);
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<jdoc:include type="head" /></head>

	<body>
		<jdoc:include type="modules" name="breadcrumbs" />
		<jdoc:include type="modules" name="search" />
		<jdoc:include type="message" />
		<jdoc:include type="component" />
		<jdoc:include type="modules" name="debug" />
	</body>
</html>