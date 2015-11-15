<?php

/**
 * Digital clock widget for Limny
 * @author Hamid Samak <hamid@limny.org>
 * @copyright GNU/GPL
 * @version 1.0
 */

$widget->title = 'Clock';

$widget->content = '<p id="limny-digitalclock-widget" style="text-align:center;font-size:20pt">' . date('H:i:s') . '</p>';

$widget->content .= '<script type="text/javascript">
setInterval(function() {
	var date = new Date().toString().split(" ");
	document.getElementById("limny-digitalclock-widget").innerHTML = date[4];
}, 500);
</script>';

?>