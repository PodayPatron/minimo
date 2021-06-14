<?php
/**
 * Header file.
 *
 * @package Minimo
 */

use MINIMO_THEME\Inc\MINIMO_THEME;

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
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$logo           = wp_get_attachment_image_src( $custom_logo_id );
					}
					?>
					<a href="#">
						<img src="<?php echo $logo[0]; ?>">
					</a>
				</div>
				<?php
				wp_nav_menu(
					array(
						'container'  => false,
						'menu'       => 'Header Menu',
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
