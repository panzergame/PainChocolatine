<?php

function getUrl($url, $args)
{
	$url_final = $url . "?";

	$sep = "";
	foreach ($args as $key => $value) {
		$url_final .= $sep . $key . "=" . $value;
		$sep = "&";
	}

	return $url_final;
}

?>
