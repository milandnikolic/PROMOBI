<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="img-wrap">
			<!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) :  ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(array(800,800), array( 'class' => 'img-fit' )); ?>
				</a>
			<?php endif; ?>
			<!-- /post thumbnail -->
		</div>


		<!-- post title -->
		<h1 class="blog-post-title">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h1>
		<!-- /post title -->

		<div class="post-details">
			<img src="<?php echo get_template_directory_uri(); ?>/img/icon-date.svg" /><span class="date"> <?php the_time('d.m.Y'); ?></span>
			<img src="<?php echo get_template_directory_uri(); ?>/img/icon-author.svg" /><span class="author"><?php the_author_posts_link(); ?></span>

			<?php if ( has_category()) :  ?>
			<img src="<?php echo get_template_directory_uri(); ?>/img/icon-category.svg" /><?php the_category(', ');  ?>		
			<?php endif; ?>	

			<?php if ( has_tag()) :  ?>
			<img src="<?php echo get_template_directory_uri(); ?>/img/icon-tag.svg" /><?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>');  ?>		
			<?php endif; ?>	
		</div>

	

		<div class="excerpt-wrap"><?php html5wp_excerpt('html5wp_index');  ?></div>

		
	</article>
	<!-- /article -->

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
