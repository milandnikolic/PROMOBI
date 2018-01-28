<?php /* Template Name: Kontakt template strana */ get_header(); ?>
<?php	 //vars
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

	<div class="container">
		<div class="row clear">
			<div class="col8">
				<div class="container700">
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			
						<?php the_content(); ?>

					<?php endwhile; ?>	

				<?php endif;  ?>

				<?php	echo do_shortcode( '[contact-form-7 id="223" title="Kontakt forma"]' ); ?>
				</div>
			</div>
			<div class="col4">
				<?php if( have_rows('locations' , 'option') ): ?>
				<div class="lokacije contact-loc">
					<h6 class="uppercase side-contact-title">servisni centri</h6>
					<div class="row clear side-lokacija">
					<?php while( have_rows('locations' , 'option') ): the_row(); 

					// vars
					$location_station = get_sub_field('location_station' , 'option');
					$location_address = get_sub_field('location_address' , 'option');
					$location_phone = get_sub_field('location_phone' , 'option');
					$working_time = get_sub_field('working_time' , 'option');
					$weekend_working_time = get_sub_field('weekend_working_time' , 'option');
					$location_email = get_sub_field('location_email' , 'option');
					$iframe_map = get_sub_field('iframe_map' , 'option');


					//trim strings
					$str = $location_phone;
					$str = preg_replace('/\D/', '', $str);
					
					?>						
						<div class="col12 ">
							<h5><?php echo $iframe_map; ?></h5>
							<h6>ProMobi servisni centar Beograd</h6>
							<table>
								<tr>
									<td>Adresa:</td>
									<td><b><?php echo $location_address; ?></b></td>
								</tr>
								<tr>
									<td>Telefon:</td>
									<td><b class="blue"><a class="phone-banner" href="tel:<?php echo $str; ?>"><?php echo $location_phone; ?></a></b></td>
								</tr>
								<tr>
									<td>Radno vreme:</td>
									<td><b><?php echo $working_time; ?></b></td>
								</tr>
								<tr>
									<td></td>
									<td><b><?php echo $weekend_working_time; ?></b></td>
								</tr>
								<tr>
									<td>Email:</td>
									<td><b><a href="email:<?php echo $location_email; ?>" class="email-link"></a><?php echo $location_email; ?></b></td>
								</tr>												
							</table>
							<div class="separator-contact"></div>
						</div>

						<?php endwhile; ?>		
										
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>



	<?php if( $our_services_show ): ?>
		<?php get_template_part('templates/our-services'); ?>
	<?php endif;  ?>

	<?php if( $query_banner ): ?>
		<div class="container">
			<?php get_template_part('templates/upit-banner'); ?>
		</div>
	<?php endif;  ?>
<?php get_footer(); ?>