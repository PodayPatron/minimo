<?php
/**
 * Single template.
 *
 * @package Minimo
 */
$the_post_id = get_the_ID();
$hide_title  = get_post_meta( $the_post_id, '_hide_page_title', true );

get_header();
?>

<section class="single-blog">
	<div class="container">
		<h2 class="">
			<?php ( $hide_title !== 'no' ) ? the_title() : ''; ?>
		</h2>
		<?php 
		the_content();
		?>
	</div>
</section>