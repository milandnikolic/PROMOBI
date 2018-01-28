<?php get_header(); /* Template Name: Novosti archive */ ?>

	<main role="main">
		
		<div class="breadcrumb">
			<div class="container"><?php the_breadcrumb(); ?> </div>
		</div>

		<div class="container">
			<div class="row clear">
				<div class="col12">
					<h1 class="uppercase first-post-title"><?php _e( 'Novosti', 'html5blank' ); ?></h1>					
				</div>
				<div class="col8">
					<div class="row clear">
						<?php 
							$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
							$args = array(
								'post_type' => 'novosti',
								'showposts' => -1 ,
								'orderby'   => 'post_date',
								'order'   => 'DESC',
								'paged' => $paged,
							);
							$related_items = new WP_Query( $args );

						?>
						<?php	if ($related_items->have_posts()) : ?>
							<?php while ( $related_items->have_posts() ) : $related_items->the_post(); ?>
								<div class="col6">
											<div class="img-wrap">
										<!-- post thumbnail -->
										<?php if ( has_post_thumbnail()) :  ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<?php the_post_thumbnail(array(800,800), array( 'class' => 'img-fit' )); ?>
											</a>
										<?php endif; ?>
										<!-- /post thumbnail -->
									</div>




									<div class="post-details">
										<img src="<?php echo get_template_directory_uri(); ?>/img/icon-date.svg" /><span class="date"> <?php the_time('d.m.Y'); ?></span>
								

										<?php if ( has_category()) :  ?>
										<img src="<?php echo get_template_directory_uri(); ?>/img/icon-category.svg" /><?php the_category(', ');  ?>		
										<?php endif; ?>	

										<?php if ( has_tag()) :  ?>
										<img src="<?php echo get_template_directory_uri(); ?>/img/icon-tag.svg" /><?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>');  ?>		
										<?php endif; ?>	
									</div>

									<!-- post title -->
									<h2 class="blog-post-title">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
									</h2>
									<!-- /post title -->
								

									<div class="excerpt-wrap"><?php html5wp_excerpt('html5wp_index');  ?></div>					
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
						<?php wp_reset_postdata(); ?>
					</div>


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
