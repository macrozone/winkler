<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _tk
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>
	
	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="row">
				<div class="site-header-inner col-sm-12">
					
					<?php $header_image = get_header_image();
					if ( ! empty( $header_image ) ) { ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
					</a>
					<?php } // end if ( ! empty( $header_image ) ) ?>


					<div class="site-branding">
						<img src="<?php echo get_bloginfo('template_url') ?>/includes/resources/images/logo.png"/>
					</div>


					



				</div>
			</div>
			
		</div><!-- .container -->
	</header><!-- #masthead -->

