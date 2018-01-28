<?php

	 get_header(); 

	 $cover_img = get_field('cover_img');
	 $shortcode_form = get_field('shortcode_form');
?>
	<div class="cover-img" style="background-image:url(<?php echo $cover_img['url']; ?>); ?>">
		<div class="vertical-align-center">
			<h1 class="white"><?php //the_title(); ?></h1>
		</div>
	</div>
	<div class="breadcrumb">
		<div class="container"><?php the_breadcrumb(); ?> </div>
	</div>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		
		<div class="container-narrow">
			<?php the_content(); ?>
			
		</div>

		<?php if( have_rows('cenovnik') ): ?>
		<div id="wrapper-yellow-samsung">
			<div class="container-narrow">
				<div class="row clear">
					<div class="col12 txt-center">
						<img src="<?php echo get_template_directory_uri(); ?>/img/broken-mob.png" >
						<h2>Cena zamene ekrana za Samsung uređaje</h2>
						<p>Popunite polja ispod i saznajte cenu zamene ekrana.</p>
					</div>

				<div class="col6">
					<h6>Model*</h6>
					<div class="wrap-select">
					<select name="cenovnik-model" id="model" class="select-cenovnici">
						<option value="" selected disabled="true" class="option-one" hidden>Izaberite vaš telefon</option>
						
						<?php while( have_rows('cenovnik') ): the_row(); 

							// vars
							$model = get_sub_field('model');
							$oznaka = get_sub_field('oznaka');
							$cena_displeja = get_sub_field('cena_displeja');


							?>

						<option value="<?php echo $model; ?>"><?php echo $model; ?>  </option> 

						<?php endwhile; ?>
					</select>
					</div>
				</div>

				<div class="col6">
				   <h6>Boja*</h6>
					 <div class="wrap-select">
					 <select name="cenovnik-boja" id="oznaka" class="select-cenovnici">
					 	<option value="" selected disabled="true" class="option-one" hidden>Izaberite boju</option>

						<?php while( have_rows('cenovnik') ): the_row(); 

							// vars
							$model = get_sub_field('model');
							$oznaka = get_sub_field('oznaka');
							$cena_displeja = get_sub_field('cena_displeja');


							?>

						<option value="<?php echo $model; ?>" class="<?php echo $model; ?>"> <?php echo $oznaka; ?></option> 

						<?php endwhile; ?>

					</select> 
					</div>
				</div>

				<div class="col12">
					 <ul id="prikazicenu">

						<?php while( have_rows('cenovnik') ): the_row(); 

							// vars
							$model = get_sub_field('model');
							$oznaka = get_sub_field('oznaka');
							$cena_displeja = get_sub_field('cena_displeja');


							?>

						<li value="<?php echo $model; ?>">
						 <b class="match"><?php echo $model. " " .$oznaka; ?></b> 
						 <p class="service-price-label">Cena popravke iznosi</p>
						 <span class="display-price"><?php echo $cena_displeja; ?> <b class="rsd">rsd</b></span>  
						  </li> 

						<?php endwhile; ?>
					</ul>  

					<p class="selected-value"></p> 
					<p class="selected-value-oznaka"></p> 
					<p class="match-value">radi</p>
					<h4 class="txt-center info-out">Ovaj artikal nije pronađen!</h4>

					<button type="submit"  class="btn uppercase" id="find-price">Saznaj cenu zamene ekrana</button>
				</div>
			  </div>
			</div>
				
		</div>
		<?php endif; ?>

		<div class="container-narrow">
			<?php if(!empty($shortcode_form)):  ?>
				<h2>Saznajte cenu popravke</h2>
				<p>Popunite polja ispod i saznajte cenu popravke za vaš uređaj.</p>

			
			<div class="manufacturer-query-service">
				<?php echo do_shortcode($shortcode_form); ?>	
			</div>
			<?php endif;  ?>

			<?php if( have_rows('youtube_slider') ): ?>
			<h2 class="txt-center">Čuvaj se mačke u džaku</h2>
			<div class="youtube-slider-wrap">	
				<div class="youtube-slider">

					<?php while( have_rows('youtube_slider') ): the_row(); 
					// vars
					$slika_artikla = get_sub_field('slika_artikla');
					$youtube_slide = get_sub_field('youtube_slide');
					?>
					<div class="yt-slide-item">
						<?php echo $youtube_slide; ?>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
			<?php endif;  ?>
		</div>

		<?php get_template_part('templates/our-services'); ?>

	<?php endwhile; ?>	

	<?php endif;  ?>	


<?php get_footer(); ?>