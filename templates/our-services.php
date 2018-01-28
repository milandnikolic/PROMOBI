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
		<h1 class="txt-center uppercase">naše usluge</h1>
		<div class="row clear">
			<?php while ( $related_items->have_posts() ) : $related_items->the_post(); ?>
			
				<a href="<?php echo get_permalink( $related_item->ID ); ?>">
					<div class="col4">
						<div class="service-item">
							<div class="img-wrap">
								<?php the_post_thumbnail(array( 400, 400), array( 'class' => 'img-fit' ));  ?>
							</div>  
							<div class="service-title-wrap">
								<h4 class="vertical-align-center">
									<?php the_title(); ?>
								</h4>							
							</div>

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