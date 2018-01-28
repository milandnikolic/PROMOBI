<?php

	 get_header(); 

	 $authors_include = get_field('authors_include');
?>

<main role="main">
	<!-- section -->
	<section>
	<div class="breadcrumb">
		<div class="container"><?php the_breadcrumb(); ?> </div>
	</div>		
	<div class="container">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
			<div class="row clear"><!-- article -->
				<div class="col8">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<!-- post title -->
					
							<h1 class="single-post-title">
								<?php the_title(); ?>
							</h1>
							<div class="post-details">
								<img src="<?php echo get_template_directory_uri(); ?>/img/icon-date.svg" /><span class="date"> <?php the_time('d.m.Y'); ?></span>

								<?php if( $authors_include ): ?>
								<img src="<?php echo get_template_directory_uri(); ?>/img/icon-author.svg" /><span class="author"><?php the_author_posts_link(); ?></span>
								<?php endif; ?>	
								<?php if ( has_category()) :  ?>
								<img src="<?php echo get_template_directory_uri(); ?>/img/icon-category.svg" /><?php the_category(', ');  ?>		
								<?php endif; ?>	

								<?php if ( has_tag()) :  ?>
								<img src="<?php echo get_template_directory_uri(); ?>/img/icon-tag.svg" /><?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>');  ?>		
								<?php endif; ?>	
							</div>
						<!-- post thumbnail -->
						<?php if ( has_post_thumbnail()) : ?>
							<div class="single-post-img-wrap">
								<?php the_post_thumbnail('full', array( 'class' => 'img-fit' ));  ?>
							</div>
						<?php endif; ?>
						<!-- /post thumbnail -->
										
						<div class="content-wrapper">
							<?php the_content();  ?>

							<?php get_template_part('templates/template-socials-share'); ?>


							<?php if( $authors_include ): ?>
								<?php get_template_part('templates/template-author'); ?>
		  					<?php endif; ?>
						</div>


					

		
					</article>
					<!-- /article -->


 
				</div><!-- /col8 -->
				
				<div class="col4">
					<?php get_sidebar(); ?>
				</div>
			</div><!-- /row -->
	</div><!-- /container -->

	<?php get_template_part('templates/our-services'); ?>

	<div class="container">
		<div class="row">
			<?php get_template_part('templates/upit-banner'); ?>		
		</div>
	</div>
	
	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>



<?php get_footer(); ?>
