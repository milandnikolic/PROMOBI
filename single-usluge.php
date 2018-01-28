<?php

	 get_header(); 

	 $cover_img = get_field('cover_img');
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
		
		<div class="container-narrow"><?php the_content(); ?></div>

	<?php endwhile; ?>	

	<?php endif;  ?>	


<?php get_footer(); ?>