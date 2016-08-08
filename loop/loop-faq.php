<?php /* Loop Name: Faq */ ?>
<?php
	// WPML filter
	$suppress_filters = get_option('suppress_filters');
	if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
			<?php the_content(); ?>
			<div class="clear"></div>
		</div><!--post-->
	<?php endwhile;
	//query
	$args = array(
		'post_type'        => 'faq',
		'showposts'        => -1,
		'suppress_filters' => $suppress_filters,
		);
	$faq_query = new WP_Query( $args );

	if ( $faq_query->have_posts() ) : ?>
	<div id="<?php echo rand(111111111,999999999);?>" class="accordion">
    <?php while ( $faq_query->have_posts() ) : $faq_query->the_post();
	 	$title =  get_the_title();
		$content = get_the_content();
			echo do_shortcode('[accordion title=" '.$title.' "] ' .$content. '[/accordion]'); ?>
	<?php endwhile; ?>
	
	</div>

<?php else: ?>

<div class="no-results">
	<?php echo '<p><strong>' . theme_locals("there_has") . '</strong></p>'; ?>
	<p><?php echo theme_locals("we_apologize"); ?> <a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>"><?php echo theme_locals("return_to"); ?></a> <?php echo theme_locals("search_form"); ?></p>
	<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
</div><!--.no-results-->

<?php endif;
	wp_reset_postdata();
?>