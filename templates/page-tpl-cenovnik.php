<?php /* Template Name: Cenovnik template strana */ get_header(); ?>

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
	<div class="container-narrow">
		
		<?php the_content(); ?>
			
	</div>
	<?php endwhile; ?>	

	<?php endif;  ?>



	<div class="container-narrow">
	<?php if( have_rows('service_price') ): ?>
		<table class="price-list-table">
			<tr class="tbl-heading">
				<th>Usluga</th>
				<th>Cena</th>
			</tr>		
		<?php while( have_rows('service_price') ): the_row(); 
			// vars
			$tbl_service_name = get_sub_field('tbl_service_name');
			$tbl_price = get_sub_field('tbl_price');

		?>


			<tr class="tbl-row">
				<td><?php echo $tbl_service_name; ?> </td>
				<td><?php echo $tbl_price; ?> rsd</td>
			</tr>
	

		<?php endwhile; ?>	
	  </table>
	<?php endif;  ?>


	<?php get_template_part('templates/istaknute-ponude'); ?>	
	</div>



	<?php get_template_part('templates/our-services'); ?>

	<div class="container">
		<?php get_template_part('templates/upit-banner'); ?>
	</div>

<?php get_footer(); ?>