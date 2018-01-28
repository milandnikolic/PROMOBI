			<?php get_header(); ?>

	<main role="main">
		
		<div class="breadcrumb">
			<div class="container"><?php the_breadcrumb(); ?> </div>
		</div>

		<div class="container">
			<div class="row clear">
				<div class="col12">
					<h1 class="uppercase first-post-title"><?php _e( 'Kategorija: ', 'html5blank' ); single_cat_title(); ?></h1>				
				</div>
				<div class="col8">

					<?php get_template_part('loop'); ?>

					<?php get_template_part('pagination'); ?>					
				</div>

				<div class="col4">
					<?php get_sidebar(); ?>
				</div>

			</div> <!-- /row -->
		</div> <!-- /container -->



			<?php get_template_part('templates/our-services'); ?>



			<div class="container">
				<?php get_template_part('templates/upit-banner'); ?>
			</div>

	</main>



<?php get_footer(); ?>

