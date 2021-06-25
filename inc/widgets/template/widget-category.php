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

<ul>
	<?php foreach ( $categories as $category ) : ?>
		<li class="custom-category-link">
			<a href="<?php echo esc_url( site_url() . '/taxonomy/' . $category->slug ); ?>">
				<?php echo esc_html( $category->name ); ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>
