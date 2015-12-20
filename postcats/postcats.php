<?php

/**
 * Post Categories widget for Limny
 * @author Hamid Samak <hamid@limny.org>
 * @copyright GNU/GPL
 * @version 1.0
 */

$widget->title = 'Categories';
$widget->content = '';

$result = $registry->db->query('SELECT id, name, (SELECT COUNT(id) FROM ' . DB_PRFX . 'posts WHERE FIND_IN_SET(' . DB_PRFX . 'posts_cats.id, ' . DB_PRFX . 'posts.category) > 0) AS `num_posts` FROM ' . DB_PRFX . 'posts_cats');

if ($result->rowCount() > 0)
	while ($cat = $result->fetch(PDO::FETCH_ASSOC))
		if ($cat['num_posts'] > 0)
			$widget->content .= '<a href="' . url('post/cat/' . $cat['id']) . '">' . $cat['name'] . ' (' . $cat['num_posts'] . ')</a><br>';

?>