<?php

add_shortcode('pokemon', function () {
	$api_url = 'https://pokeapi.co/api/v2/pokemon/';
	$response = wp_remote_get($api_url);
	$body = wp_remote_retrieve_body($response);
	$json = json_decode($body);
	$items = $json->results;

	echo '<ul>';
	foreach ($items as $item) {
		echo '<li><a href="' . $item->url . '">' . $item->name . '</a></li>';
	}
	
	echo '</ul>';
});
