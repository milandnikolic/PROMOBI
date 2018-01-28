<!-- sidebar -->
<aside class="sidebar" role="complementary">

<?php 
	$args = array(
		'post_type' => 'usluge',
		'showposts' => 3 ,
		'orderby'   => 'rand',
		//'order'   => 'DESC',
	);
	$related_items = new WP_Query( $args );

?>
<?php	if ($related_items->have_posts()) : ?>
<div id="usluge" class="usluge-wrapper">
	<div class="container">
		<p class="uppercase sidebar-title">naše usluge</p>
		<div class="row clear">
			<?php while ( $related_items->have_posts() ) : $related_items->the_post(); ?>
			
				<a href="<?php echo get_permalink( $related_item->ID ); ?>">
					<div class="col12">
						<div class="img-wrap">
							<?php the_post_thumbnail(array( 400, 400), array( 'class' => 'img-fit' ));  ?>
						</div>  
						<div class="service-title-wrap">
							<h4 class="vertical-align-center">
								<?php the_title(); ?>
							</h4>							
						</div>

					</div>
				</a>

			<?php endwhile; ?>

			<div class="col12 txt-center">
				<?php $page = get_page_by_title("Usluge");?>
				<a href="<?php echo get_permalink( $page->ID ); ?>" class="btn bg-blue white uppercase"><?php _e('pogledaj sve usluge', 'html5blank'); ?></a>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php 
	$args = array(
		'post_type' => 'post',
		'showposts' => 3 ,
		'orderby'   => 'post_date',
		'order'   => 'DESC',
	);
	$related_items = new WP_Query( $args );

?>
<?php	if ($related_items->have_posts()) : ?>
<div  class="novosti-wrapper">
	<div class="container">
		<p class="uppercase sidebar-title">najnovije iz magazina</p>
		<div class="row clear">
			<?php while ( $related_items->have_posts() ) : $related_items->the_post(); ?>
			
				<a href="<?php echo get_permalink( $related_item->ID ); ?>">
					<div class="col12">
						<div class="img-wrap">
							<?php the_post_thumbnail(array( 400, 400), array( 'class' => 'img-fit' ));  ?>
						</div>  
						<div class="service-title-wrap">
							<span class="date"> <?php the_time('d.m.Y'); ?></span>
							<h6>
								<?php the_title(); ?>
							</h6>							
						</div>

					</div>
				</a>

			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>


<?php 
	$args = array(
		'post_type' => 'novosti',
		'showposts' => 3 ,
		'orderby'   => 'post_date',
		'order'   => 'DESC',
	);
	$related_items = new WP_Query( $args );

?>
<?php	if ($related_items->have_posts()) : ?>
<div  class="novosti-wrapper">
	<div class="container">
		<p class="uppercase sidebar-title">najnovije vesti</p>
		<div class="row clear">
			<?php while ( $related_items->have_posts() ) : $related_items->the_post(); ?>
			
				<a href="<?php echo get_permalink( $related_item->ID ); ?>">
					<div class="col12">
						<div class="img-wrap">
							<?php //the_post_thumbnail(array( 400, 400), array( 'class' => 'img-fit' ));  ?>
						</div>  
						<div class="service-title-wrap">
							<span class="date"> <?php the_time('d.m.Y'); ?></span>
							<h6>
								<?php the_title(); ?>
							</h6>							
						</div>

					</div>
				</a>

			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
	</div>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
	</div>

</aside>
<!-- /sidebar -->
