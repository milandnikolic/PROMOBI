<?php

	 get_header(); 


	 //vars
	 $query_banner = get_field('query_banner');
	 $our_services_show = get_field('our_services_show');
?>
	<div class="featured-img-cover" >
		<?php the_post_thumbnail('full', array( 'class' => 'img-fit' )); ?>
		<div class="vertical-align-center">
			<h1 class="white"><?php the_title(); ?></h1>
		</div>
	</div>
	<div class="breadcrumb">
		<div class="container"><?php the_breadcrumb(); ?> </div>
	</div>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		
		<div class="container-narrow"><?php the_content(); ?></div>

	<?php endwhile; ?>	

	<?php endif;  ?>	

	<?php if( $our_services_show ): ?>
		<?php get_template_part('templates/our-services'); ?>
	<?php endif;  ?>

	<?php if( $query_banner ): ?>
		<div class="container">
			<?php get_template_part('templates/upit-banner'); ?>
		</div>
	<?php endif;  ?>	

<?php get_footer(); ?>
