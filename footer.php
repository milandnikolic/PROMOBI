			<!-- footer -->
			<footer class="footer" role="contentinfo">
			
				<div class="footer-top">
					<div class="container">
						<div class="row clear">
							<div class="col4">
								<img src="<?php echo get_template_directory_uri(); ?>/img/logo-footer.svg" alt="Logo" class="logo-img">
								<div class="footer-desc">
									<p class="white">Dijagnostika, servisiranje i popravka telekomunikacionih uređaja i opreme, pre - konfiguracija i promene softvera kao i programska podrška mobilnih telefona.</p>
									<p class="white">ProMobi servisni centar, pored postojećeg sertifikata ISO 9001:2008, uspešno prošao eksternu proveru i serfikaciju svog Sistema za upravljanje bezbednošću informacija (ISMS) prema standardu ISO 27001:2013.</p>									
								</div>

							</div>
							<div class="col4"><?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?></div>
							<div class="col4">
								<p class="white call-centar">
									CALL CENTAR
								</p>
								<a href="tel:0113555047" class="yellow">011-3555-047</a>
								<p class="white working-time">svaki dan: 09:00 - 18:00</p>
								<div class="f-socials">
									<?php
										$facebook_link = get_field('facebook_link', 'option');
										$twitter_link = get_field('twitter_link', 'option');
										$instagram_link = get_field('instagram_link', 'option');
										$youtube_link = get_field('youtube_link', 'option');
									?>
									<?php if(!empty($facebook_link)):  ?>
									<a href="<?php echo $facebook_link; ?>" target="_blank" class="white">
										<img src="<?php echo get_template_directory_uri(); ?>/img/facebook-footer.svg" alt="Facebook" >
									</a>
									<?php endif;  ?>	

									<?php if(!empty($twitter_link)):  ?>
									<a href="<?php echo $twitter_link; ?>" target="_blank" class="white">
										<img src="<?php echo get_template_directory_uri(); ?>/img/twitter-footer.svg" alt="Twitter" >
									</a>
									<?php endif;  ?>	

									<?php if(!empty($instagram_link)):  ?>
									<a href="<?php echo $instagram_link; ?>" target="_blank" class="white">
										<img src="<?php echo get_template_directory_uri(); ?>/img/instagram-footer.svg" alt="Instagram" >
									</a>
									<?php endif;  ?>	

									<?php if(!empty($youtube_link)):  ?>
									<a href="<?php echo $youtube_link; ?>" target="_blank" class="white">
										<img src="<?php echo get_template_directory_uri(); ?>/img/youtube-footer.svg" alt="Youtube" >
									</a>
									<?php endif;  ?>	
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-bottom">
					<div class="container">											
						<!-- copyright -->
						<p class="copyright white txt-center">
							&copy; <?php echo date('Y'); ?> ProMobi. <?php _e('Sva prava zadržana.', 'html5blank'); ?>					
						</p>
						<!-- /copyright -->
					</div>					
				</div>


			</footer>
			<!-- /footer -->
			<a href="javascript:" id="return-to-top"><i class="fa fa-arrow-up" aria-hidden="true"></i></a><!-- back to top -->
		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>


	</body>
</html>
