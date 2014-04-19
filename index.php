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
 * @package winkler
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

function showOnePage($page, $index, $numberOfPages)
{
	$content = apply_filters('the_content', $page->post_content);
	
	$customTitle = get_post_meta($page->ID, 'title', true);
	if($customTitle == "false" || $customTitle == "hide")
	{
		$titleTag = "";
	}
	else
	{
		
		if(empty($customTitle))
			$title = $page->post_title;
		else
			$title = $customTitle;
		$titleTag = "<h2 class='pageTitle'>$title</h2>";
	}


	$slug = $page->post_name;
	$depth = count($page->ancestors);
	$evenOdd = $index %2 == 0 ? "even": "odd";
	$first = $index == 0 ? "first": "";
	$last = $index == $numberOfPages-1 ? "last": "";

	$classes = "page $slug depth-$depth $evenOdd $first $last";
	?>
	
		<section id="page_<?php echo $slug ?>" class='<?php echo $classes; ?>'>
		<?php echo "$titleTag" ?>
			
			<div class="container content">
			<div class="wrapper col-xs-12 col-sm-10">
				<?php echo "$content" ?>
			
			</div>
			</div>
			
			<?php

			if($page->ID >0)
				showPagesWithParent($page->ID);
			?>

			<div class="separator"></div>

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
	$showOnePage = count($pages);
	foreach ($pages as $page) 
	{
		if(!in_array($page->post_name, $excludeSlugs))
		{
			showOnePage($page, $counter, $showOnePage);
			$counter++;
		}
	}
}

?>




<div class="main-content">

	



	<main id="main" class="site-main" role="main">

	

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
