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


// currently not used
function showHome()
{
	$page = get_page_by_path("home");
	$slug = $page->post_name;
	$content = apply_filters('the_content', $page->post_content);
	?>
	<section id="page_<?php echo $slug ?>" class='page <?php echo "$slug" ?> depth-0'>

		<div class="content">
			<?php echo "$content" ?>
		</div>
		<div class="clear"></div>
		<?php

		if($page->ID >0)
			showPagesWithParent($page->ID);
		?>

	</section>
	<?php
}

function showOnePage($page, $index)
{
	$content = apply_filters('the_content', $page->post_content);
	$title = $page->post_title;
	$slug = $page->post_name;
	$depth = count($page->ancestors);
	$evenOdd = $index %2 == 0 ? "even": "odd";
	?>
	
		<section id="page_<?php echo $slug ?>" class='page <?php echo "$slug" ?> depth-<?php echo $depth;?> <?php echo $evenOdd ?>'>
	
			<h2 class="pageTitle"><?php echo "$title" ?></h2>
			<div class="content <?php echo ($depth >=2?  "col-sm-10" : "")?>">
				<?php echo "$content" ?>
			</div>
			<div class="clear"></div>
			<?php

			if($page->ID >0)
				showPagesWithParent($page->ID);
			?>

		</section>
	
	<?php
}

function showPagesWithParent($parentID, $excludeSlugs = array())
{
	$args = array(
		'sort_order' => 'ASC',
	'sort_column' => 'menu_order', //post_title
	'hierarchical' => 1,
	'exclude' => '',
	'child_of' => 0,
	'parent' => $parentID,
	'exclude_tree' => '',
	'number' => '',
	'offset' => 0,
	'post_type' => 'page',
	'post_status' => 'publish'
	);
	$counter = 0;
	$pages = get_pages($args);
	foreach ($pages as $page) 
	{
		if(!in_array($page->post_name, $excludeSlugs))
		{
			showOnePage($page, $counter);
			$counter++;
		}
	}
}

?>


<!--
<div class="fadeGradient">
</div>

-->



<div class="main-content">

	



	<main id="main" class="site-main" role="main">

	<section class="page home depth-0">

	</section>
<div class="container">
<div class="col-sm-12 col-md-12">
		<?php
		//showHome();
		//showPagesWithParent(0, array("home"));
		showPagesWithParent(0);
		?>
		</div>
		</div>
	</main>

	

</div><!-- close .main-content -->
<?php
//get_footer();
wp_footer(); 
?>
