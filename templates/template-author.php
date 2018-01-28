								<div class="list-item clear">
									
									<div class="col3">
										<div class="img-wrap">
											<a href=" <?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
												<?php 
												$author_id = get_the_author_meta('ID');
												$image = get_field('user_image', 'user_'. $author_id );



												if( !empty($image) ): ?>

													<img src="<?php echo $image['url']; ?>" class="img-circle"  width="150" height="150" />

												<?php endif; ?>
											</a>
										</div>
									</div>
									
									<div class="col9">
										<h4><?php the_author_meta( 'first_name' ); ?> <?php the_author_meta( 'last_name' ); ?></h4>
										<p><?php echo wpautop( get_the_author_meta('description') ); ?></p>
							
									</div>
								</div>