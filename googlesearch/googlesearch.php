<?php

/**
 * Google Search widget for Limny
 * @author Hamid Samak <hamid@limny.org>
 * @copyright GNU/GPL
 * @version 1.0
 */

$widget->options = [
	'title' => ['label' => 'Title', 'type' => 'text']
];

if (isset($widget_item['options']) && empty($widget_item['options']) === false)
	$options_array = unserialize($widget_item['options']);
else
	$options_array = ['title' => 'Search'];

$widget->title = $options_array['title'];
$widget->content = '<input id="search" type="text" value="" placeholder="Search&hellip;"> <input type="button" value="Go" onclick="location.href = (\'http://www.google.com/search?q={QUERY}%20site:' . $_SERVER['HTTP_HOST'] . '\').replace(\'{QUERY}\', search.value);">';

?>