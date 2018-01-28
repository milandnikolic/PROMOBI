<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="https://fonts.googleapis.com/css?family=Yantramanav:400,900&amp;subset=latin-ext" rel="stylesheet">

        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.png" rel="shortcut icon">
       

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111724005-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-111724005-1');
		</script>
	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">
				<div class="header-top">
					<div class="container">
						<div class="flex">
													
							<div class="socials flex-item">
								<?php
									$facebook_link = get_field('facebook_link', 'option');
									$twitter_link = get_field('twitter_link', 'option');
									$instagram_link = get_field('instagram_link', 'option');
									$youtube_link = get_field('youtube_link', 'option');
								?>

								<?php if(!empty($facebook_link)):  ?>
								<a href="<?php echo $facebook_link; ?>" target="_blank" class="white">
									<img src="<?php echo get_template_directory_uri(); ?>/img/facebook-header.svg" alt="Facebook" class="icon-hover-off">
									<img src="<?php echo get_template_directory_uri(); ?>/img/facebook-header-hover.svg" alt="Facebook" class="icon-hover">
								</a>
								<?php endif;  ?>	

								<?php if(!empty($twitter_link)):  ?>
								<a href="<?php echo $twitter_link; ?>" target="_blank" class="white">
									<img src="<?php echo get_template_directory_uri(); ?>/img/twitter-header.svg" alt="Twitter" class="icon-hover-off" >
									<img src="<?php echo get_template_directory_uri(); ?>/img/twitter-header-hover.svg" alt="Twitter" class="icon-hover" >
								</a>
								<?php endif;  ?>	

								<?php if(!empty($instagram_link)):  ?>
								<a href="<?php echo $instagram_link; ?>" target="_blank" class="white">
									<img src="<?php echo get_template_directory_uri(); ?>/img/instagram-header.svg" alt="Instagram" class="icon-hover-off" >
									<img src="<?php echo get_template_directory_uri(); ?>/img/instagram-header-hover.svg" alt="Instagram" class="icon-hover" >
								</a>
								<?php endif;  ?>	

								<?php if(!empty($youtube_link)):  ?>
								<a href="<?php echo $youtube_link; ?>" target="_blank" class="white">
									<img src="<?php echo get_template_directory_uri(); ?>/img/youtube-header.svg" alt="Youtube" class="icon-hover-off" >
									<img src="<?php echo get_template_directory_uri(); ?>/img/youtube-header-hover.svg" alt="Youtube" class="icon-hover" >
								</a>
								<?php endif;  ?>	
							</div>

							<div class="h-phones flex-item">
								<span><img src="<?php echo get_template_directory_uri(); ?>/img/phone-header.svg" > Call centar:</span>
								<a href="tel:0113555047" class="header-phone white">
									011-3555-047
								</a>
								<span>| 09:00 - 18:00</span>
							</div>

							<div class="h-btns flex-item">
								<?php
									$nalozi_link = get_field('nalozi_link', 'option');
									$link_za_prijavu = get_field('link_za_prijavu', 'option');
								?>	
								<?php if(!empty($nalozi_link)):  ?>							
								<a href="<?php echo $nalozi_link; ?>" class="btn "><img src="<?php echo get_template_directory_uri(); ?>/img/nalozi.svg" > </a>
								<?php endif;  ?>
								<?php if(!empty($link_za_prijavu)):  ?>
								<a href="<?php echo $link_za_prijavu; ?>" class="btn"><img src="<?php echo get_template_directory_uri(); ?>/img/prijava.svg" > </a>
								<?php endif;  ?>
							</div>

						</div>	
					</div>
				</div>
					<div class="container">
						<div class="clear">
							<!-- logo -->
							<div class="logo">
								<a href="<?php echo home_url(); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/img/logo-header.svg" alt="Logo" class="logo-img">
								</a>
							</div>
							<!-- /logo -->
						
						
							<!-- nav -->
							<nav class="nav" role="navigation">
								<?php html5blank_nav(); ?>
							</nav>
							<!-- /nav -->

							<div id="header-search">
								<div class="inside-content txt-center vertical-align-center">
								<!-- search -->
								<form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
									<input class="search-input" type="search" name="s" placeholder="<?php _e( 'Ukucaj pojam za pretragu...', 'html5blank' ); ?>">
									<label for="search-input"><?php _e( 'Pritisni Enter/Return da započneš pretragu', 'html5blank' ); ?></label>
									<button class="search-submit" type="submit" role="button"><?php _e( 'Pritisni Enter/Return da započneš pretragu', 'html5blank' ); ?></button>
								</form>
								<!-- /search -->
								
								</div>
								<i class="fa fa-times" aria-hidden="true"></i>
							</div>
						</div>						
					</div>

					<i class="fa fa-bars" aria-hidden="true"></i>
			</header>
			<!-- /header -->
