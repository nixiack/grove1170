<?php
/*
 * Template name: Page With Right Sidebar
 *
 * @package Grove
 * @since Grove 1.0
 */
 

add_filter('body_class','my_class_names');
function my_class_names($classes) {
	// add 'class-name' to the $classes array
	$classes[] = 'right-sidebar';
	// return the $classes array
	return $classes;
}

get_header(); ?>

<?php	$banner = get_post_meta($post->ID, '_grove_banner_size', true);
//$sidebar = get_post_meta($post->ID, '_grove_hide_sidebar', true);

if (has_post_thumbnail()) {
			$attr = array(
			'alt'	=> trim(strip_tags( get_the_title() )),
			'title'	=> trim(strip_tags( get_the_title() )),
		);

if ($banner!='hide') { if ($banner=='large' OR $sidebar=='hide') { the_post_thumbnail('full', $attr); } else {$image = get_the_post_thumbnail($post->ID, '1170', $attr);} } } ?>

		<div id="primary" class="content-area ">
			<div id="content" class="site-content " role="main">

				<?php do_action( 'grove_before_page_content' ); ?>

				<?php echo $image; ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

				<?php do_action( 'grove_after_page_content' ); ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->


<?php //if ($sidebar!='hide') { get_sidebar(); }?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>