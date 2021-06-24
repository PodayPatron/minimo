<?php
/**
 * Header file.
 *
 * @package Minimo
 */
?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body>
	<?php wp_body_open(); ?>
	<header class="nz-main-header">
		<div class="container">
			<div class="nz-main-menu">
				<div class="nz-logo">
					<?php
					if ( function_exists( 'the_custom_logo' ) ) {
						echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ) );
					}
					?>
				</div>
				<?php
				wp_nav_menu(
					array(
						'container'  => false,
						'menu'       => esc_html__( 'Header Menu' ),
						'menu_class' => 'nz-main-nav',
					)
				);
				?>
				<div class="burger-menu">
					<i class="fal fa-bars"></i>
				</div>
			</div>
		</div>
	</header>
</body>
</html>
