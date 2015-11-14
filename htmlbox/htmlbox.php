<?php

/**
 * HTMLBox widget for Limny
 * @author Hamid Samak <hamid@limny.org>
 * @copyright GNU/GPL
 * @version 1.0
 */

$widget->options = [
	'widget_title' => ['label' => 'Title', 'type' => 'text'],
	'widget_content' => ['label' => 'Content', 'type' => 'textarea'],
];

if (isset($widget_item['options']) && empty($widget_item['options']) === false)
	$options_array = unserialize($widget_item['options']);
else
	$options_array = ['widget_title' => '<span style="color:#777">Not set</span>', 'widget_content' => '<span style="color:#777">Not set</span>'];

$widget->title = $options_array['widget_title'];
$widget->content = $options_array['widget_content'];

?>