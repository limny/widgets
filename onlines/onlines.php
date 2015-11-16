<?php

/**
 * Online users widget for Limny
 * @author Hamid Samak <hamid@limny.org>
 * @copyright GNU/GPL
 * @version 1.0
 */

$widget->options = [
	'mode' => [
		'label' => 'Mode',
		'type' => 'radio',
		'items' => [1 => 'Only number of users', 2 => 'Show usernames', 3 => 'both']
	]
];

$result = $registry->db->query('SELECT username FROM ' . DB_PRFX . 'users WHERE UNIX_TIMESTAMP() - last_activity < 60');
$result->execute();

while ($user = $result->fetch(PDO::FETCH_ASSOC))
	$users[] = $user['username'];

if (isset($widget_item['options']) && empty($widget_item['options']) === false)
	$options_array = unserialize($widget_item['options']);
else
	$options_array = ['mode' => '1'];

$widget->title = 'Onlines';
$widget->content = '';

if ($options_array['mode'] == '1' || $options_array['mode'] == '3')
	$widget->content .= '<p>' . (isset($users) ? 'There is <strong>' . count($users) . '</strong> online user(s)' : 'There is no online here.') . '</p>';

if ($options_array['mode'] == '2' || $options_array['mode'] == '3' && isset($users)) {
	$widget->content .= '<ol>';

	foreach ($users as $username)
		$widget->content .= '<li>' . $username . '</li>';

	$widget->content .= '</ol>';
}

?>