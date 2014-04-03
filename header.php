<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _tk
 */


$args = array(
	'sort_order' => 'ASC',
	'sort_column' => 'menu_order', //post_title
	'hierarchical' => 1,
	'exclude' => '',
	'child_of' => 0,
	'parent' => -1,
	'exclude_tree' => '',
	'number' => '',
	'offset' => 0,
	'post_type' => 'page',
	'post_status' => 'publish'
	);
$pages = get_pages($args);

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
		<div class="logo">
		<!--
					<object data="<?php echo get_bloginfo('template_url') ?>/includes/resources/images/logo.svg" type="image/svg+xml">
 	<img src="<?php echo get_bloginfo('template_url') ?>/includes/resources/images/logo.png"/>
 	</object>
 	-->
 	<img src="<?php echo get_bloginfo('template_url') ?>/includes/resources/images/logo.png"/>
</div>
					
				


		<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
		<a type="button" id="menu-button">
		
		</a>		


		<nav id="main-menu" class="site-navigation">	


			<ul>
<li class="page_item depth-0">
<a href="#">Home</a>
</li>
				<?php
				foreach ($pages as $page_data) {
					$content = apply_filters('the_content', $page_data->post_content);
					$title = $page_data->post_title;
					$slug = $page_data->post_name;

					$subNav = $page_data->post_parent != 0;
					$depth = count($page_data->ancestors);
					?>
					<li class="page_item depth-<?php echo $depth; ?>">
						<a href="#<?php echo $slug?>"><?php echo $title?></a>
					</li>
					<?php 
				} 
				?>
			</ul>

		</nav><!-- .site-navigation -->
	</header><!-- #masthead -->

