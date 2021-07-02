<?php
/**
 * Single Courses page.
 *
 * @package Minimo
 */
$categories = get_the_terms( get_the_ID(), 'courses_categories' );
get_header();
?>

<section class="single-blog">
	<div class="container">
		<div class="nz-single-category">
			<?php foreach ( $categories as $category ) : ?>
				<?php echo $category->name; ?>
			<?php endforeach; ?>
		</div>
		<h2 class="nz-single-courses-title">
			<?php esc_html( the_title() ); ?>
		</h2>
		<div class="nz-single-courses-img">
			<?php the_post_thumbnail(); ?>
		</div>


		<div class="row row-bottom">
			<div class="col-lg-12">
				<div class="single-page-content">
					<?php esc_html( the_content() ); ?>
				</div>
			</div>
		</div>

	</div>
</section>

<?php get_footer(); ?>
