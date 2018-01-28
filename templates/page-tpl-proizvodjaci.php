<?php /* Template Name: Proizvodjaci template strana */ get_header(); ?>
<?php 
	//vars
	$cover_img = get_field('cover_img'); 
	$color_img_hover = get_field('color_img_hover'); 
?>

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
				'post_type' => 'proizvodjaci',
				'showposts' => 12 ,
				'orderby'   => 'post_date',
				'order'   => 'ASC',
			);
			$related_items = new WP_Query( $args );

		?>
		<?php	if ($related_items->have_posts()) : ?>

		<div class="row clear">
			<?php while ( $related_items->have_posts() ) : $related_items->the_post(); ?>
			
				<a href="<?php echo get_permalink( $related_item->ID ); ?>">
					<div class="col4">
						<div class="img-wrap logos-img">
							<?php the_post_thumbnail(array( 400, 400), array( 'class' => 'img-fit' ));  ?>
							<img src="<?php the_field('color_img_hover'); ?>" class="hover-color img-fit" />
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

