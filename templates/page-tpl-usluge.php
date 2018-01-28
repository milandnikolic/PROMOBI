<?php /* Template Name: Usluge template strana */ get_header(); ?>
<?php $cover_img = get_field('cover_img'); ?>

	<div class="cover-img" style="background-image:url(<?php echo $cover_img['url']; ?>); ?>">
		<div class="vertical-align-center">
			<h1 class="white"><?php the_title(); ?></h1>
		</div>
	</div>
	<div class="breadcrumb">
		<div class="container"><?php the_breadcrumb(); ?> </div>
	</div>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<div class="container-narrow">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
			
	</div>
	<?php endwhile; ?>	

	<?php endif;  ?>

	<div class="container">
		<?php 
			$args = array(
				'post_type' => 'usluge',
				'showposts' => -1 ,
				'orderby'   => 'post_date',
				'order'   => 'ASC',
			);
			$related_items = new WP_Query( $args );

		?>
		<?php	if ($related_items->have_posts()) : ?>

		<div class="row clear" id="usluge">
			<?php while ( $related_items->have_posts() ) : $related_items->the_post(); ?>
			
				<a href="<?php echo get_permalink( $related_item->ID ); ?>">
					<div class="col6">

						<div class="service-item">
							<div class="img-wrap">
								<?php the_post_thumbnail(array( 600, 600), array( 'class' => 'img-fit' ));  ?>
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

		</div>


		<?php endif; ?>
		<?php wp_reset_postdata(); ?>	
	</div>	

<div class="container">
	<?php get_template_part('templates/upit-banner'); ?>
</div>

<?php get_footer(); ?>

