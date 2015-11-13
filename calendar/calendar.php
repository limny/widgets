<?php

/**
 * Calendar widget for Limny
 * @author Hamid Samak <hamid@limny.org>
 * @copyright GNU/GPL
 * @version 1.0
 */

$widget->title = 'Calendar';

$widget->content = '<p>' . date('F Y') . '</p>';
$widget->content .= '<table style="width:100%"><thead><tr>';

foreach (['M', 'T', 'W', 'T', 'F', 'S', 'S'] as $week_day)
	$widget->content .= '<td>' . $week_day . '</td>';

$widget->content .= '</tr></thead><tbody>';

$counter = 0;

$day_of_week = date('N', strtotime(date('Y-m-01')));

foreach (range(1, 31) as $key => $day) {
	if ($counter % 7 < 1)
		$widget->content .= '<tr>';

	if ($key < 1 && $day_of_week > 1) {
		$counter = $day_of_week - 1;
		$widget->content .= str_repeat('<td>&nbsp;</td>', $counter);
	}

	if ($day == date('j'))
		$day = '<strong>' . $day . '</strong>';

	$widget->content .= '<td>' . $day . '</td>';

	if ($counter + 1 % 7 < 1)
		$widget->content .= '</tr>';

	$counter += 1;
}

$widget->content .= '</tbody></table>';

$widget->lifetime = 60;

?>