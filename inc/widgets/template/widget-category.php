<?php
/**
 * Widgets Categories
 */

$categories = get_terms(
	array(
		'taxonomy'   => 'hotel-categories',
		'hide_empty' => false,
	)
);

?>