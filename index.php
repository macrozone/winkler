<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _tk
 */


get_header();
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



?>


<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
		<button type="button" id="menu-button">
				<img src="<?php echo get_bloginfo('template_url') ?>/includes/resources/images/menu.png"/>
		</button>		

<div class="fadeGradient">
</div>

<nav id="main-menu" class="site-navigation">	

	
<ul >

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

<div class="main-content">	
	<div class="container">
		<div class="row">
			<div id="content" class="main-content-inner col-sm-12 col-md-12">


				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<?php
						foreach ($pages as $page_data) {
							$content = apply_filters('the_content', $page_data->post_content);
							$title = $page_data->post_title;
							$slug = $page_data->post_name;
							$depth = count($page_data->ancestors);
							?>
							<section class='page <?php echo "$slug" ?> depth-<?php echo $depth;?>'><a name='<?php echo "$slug" ?>'></a>
								<h2 class="pageTitle"><?php echo "$title" ?></h2>
								<div class="content">
								<?php echo "$content" ?>
								</div>
								<div class="clear"></div>
							</section>

							<?php
						}
						?>
					</main>
				</div>
				<?php
//get_footer();
				wp_footer(); 
				?>
