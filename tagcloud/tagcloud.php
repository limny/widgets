<?php

/**
 * Tag cloud widget for Limny
 * @author Hamid Samak <hamid@limny.org>
 * @copyright GNU/GPL
 * @version 1.0
 */

$widget->title = 'Tag cloud';
$widget->content = '';

$result = $registry->db->query('SELECT tags FROM ' . DB_PRFX . 'posts WHERE tags IS NOT NULL ORDER BY RAND()');

$tags = [];
$total = 0;

while ($post = $result->fetch(PDO::FETCH_ASSOC))
	if (empty($post['tags']) === false) {
		$post_tags = explode(',', $post['tags']);
		$post_tags = array_map('trim', $post_tags);
		$post_tags = array_map('strtolower', $post_tags);

		foreach ($post_tags as $tag) {
			if (isset($tags[$tag]))
				$tags[$tag] += 1;
			else
				$tags[$tag] = 1;

			$total += 1;
		}
	}

if ($total > 0)
	foreach ($tags as $tag => $count) {
		$percent = $count / $total * 1000;

		$widget->content .= '<a href="' . url('post/tag/' . $tag) . '" style="font-size:' . $percent . '%">' . $tag . '</a> ';
	}

?>