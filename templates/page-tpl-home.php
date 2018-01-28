<?php /* Template Name: Home */ get_header(); ?>

<?php
	$slide = get_field('slider');
	$iframe = get_field('youtube');
	$banner_home1 = get_field('banner_home1');
	$banner_home2 = get_field('banner_home2');
	$banner_home3 = get_field('banner_home3');
	$aboutus_txt = get_field('aboutus_txt');
	$autoplay_button = get_field('autoplay_button');
	$turn_sound_on = get_field('turn_sound_on');
?>
	<div class="slider-container">
	<?php if( have_rows('slider') /*&& !$iframe*/ ): ?>

	
	<div class="slider">

	<?php while( have_rows('slider') ): the_row(); 

		// vars
		$image = get_sub_field('slider_img');
		$title = get_sub_field('slider_title');
		$subtitle = get_sub_field('slider_subtitle');
		$slider_btn = get_sub_field('slider_btn');
		$slider_url = get_sub_field('slider_url');

	?>

		<div class="slide-item" style="background:url(<?php echo $image['url']; ?>);">
			
				
						<div class="container">
						
								<div class="vertical-align-center">


									<?php if( $title ): ?>
										<h1 class="white txt-center" data-animation="bounceIn" data-delay="0.23s"><?php echo $title; ?></h1>
									<?php endif; ?>

									<?php if( $subtitle ): ?>
										<h6 class="white txt-center" data-animation="bounceIn" data-delay="0.43s"> <?php echo $subtitle; ?></h6>
									<?php endif; ?>

									<?php if( $slider_btn ): ?>
										<div class="txt-center"  data-animation="bounceInUp" data-delay="0.83s">
											<a href="<?php echo $slider_url; ?>" class="btn bg-white" >
												<?php echo $slider_btn; ?>
													
											</a>
										</div>
									<?php endif; ?>

									
								
								</div>

						</div>
			
		</div>


	<?php endwhile; ?>



<?php endif; ?>
	</div>

<?php if( !wp_is_mobile() ): ?>

<?php if( $iframe ): ?>
<div id="video-wrapper">
<?php 	
if($autoplay_button){
	$one = 1;
}else {
	$one = 0;
}
if($turn_sound_on){
	$sound_value = 0;
}else {
	$sound_value = 1;
}
// use preg_match to find iframe src
preg_match('/src="(.+?)"/', $iframe, $matches);
$src = $matches[1];


// add extra params to iframe src
$params = array(
    'controls'    => 0,
    'hd'        => 1,
    'autohide'    => 1,
    'showinfo' => 0,
    'modestbranding' => 1,
    'cc_load_policy' => 0,
    'rel' => 0,
    'loop' => 1,
    'autoplay' => $one,
    'mute' => $sound_value,
  
	
);

$new_src = add_query_arg($params, $src);

$iframe = str_replace($src, $new_src, $iframe);


// add extra attributes to iframe html
$attributes = 'frameborder="0"';

$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


// echo $iframe
echo $iframe; ?>
	<?php // echo $youtube; ?>
</div>
<!-- <div id="fake-div"></div> -->
<?php endif; ?>

<?php else: ?>
<img src="<?php echo get_template_directory_uri(); ?>/img/tw_5402.jpg"  class="bg-mob" >
<?php endif; ?>
</div> <!--end of slider container-->



<div id="about-us">
	<div class="container">
		<div class="row clear">
			<div class="col6">
				<h1>Mi smo <b class="blue">PROMOBI</b></h1>
				<p><?php echo $aboutus_txt; ?> </p>
				<?php $page = get_page_by_title("Nas tim");?>
				<a href="<?php echo get_permalink( $page->ID ); ?>" class="btn white bg-blue">Saznaj više o nama</a>
			</div>
			<div class="col6">
				<div class="img-wrapper">
					
						<img src="<?php echo get_template_directory_uri(); ?>/img/promobi.svg" alt="Promobi" class="vertical-align-center" >
								
				</div>
			</div>
		</div>
	</div>
</div>

<?php if( have_rows('home_blue_section') ): ?>
<div id="home-section-bg">
	<div class="container">
		<h1 class="white uppercase txt-center">Zašto promobi</h1>

		<div class="row clear">
		<?php while( have_rows('home_blue_section') ): the_row(); 

		// vars
		$home_title_blue_section = get_sub_field('home_title_blue_section');
		$home_blue_section_text = get_sub_field('home_blue_section_text');
		$home_blue_section_icon = get_sub_field('home_blue_section_icon');

		?>			
			<div class="col6">
				<div class="clear row">
					<div class="col3">
					<!-- 	<img src="<?php //echo get_template_directory_uri(); ?>/img/expert.svg"  class="img-icon" > -->
						<img src="<?php echo $home_blue_section_icon['url']; ?>" class="img-icon" />
					</div>
					<div class="col9">
						<h6 class="white uppercase"><?php echo $home_title_blue_section; ?></h6>
						<p class="white"><?php echo $home_blue_section_text; ?></p>
					</div>
				</div>
			</div>
			
			<?php endwhile; ?>
		</div>

	</div>
</div>
<?php endif; ?>

<div id="home-banner1" class="home-middle-banner" style="background:url(<?php echo $banner_home1['url']; ?>);">
	<div class="container">
		<div class="vertical-align-center">
			<?php 

			$currentTime = time();

			$startTime = strtotime("2017/12/19");

			$diff = $currentTime - $startTime;

			$diffNum = floor($diff/(60*60));
			$counter_number = 584046 + $diffNum*14;
			?>
			<h2 class="white txt-center uppercase">Do sada smo servisirali</h2>
			<h1 class="white txt-center"><b class="numberStat" data-count="<?php echo $counter_number; ?>"><?php echo $counter_number; ?></b> telefona</h1>
		</div>
	</div>
</div>



<?php 
	$args = array(
		'post_type' => 'usluge',
		'showposts' => 9 ,
		'orderby'   => 'post_date',
		'order'   => 'DESC',
	);
	$related_items = new WP_Query( $args );

?>
<?php	if ($related_items->have_posts()) : ?>
<div id="usluge">
	<div class="container">
		<h1 class="txt-center uppercase">usluge</h1>
		<div class="row clear">
			<?php while ( $related_items->have_posts() ) : $related_items->the_post(); ?>
			
				<a href="<?php echo get_permalink( $related_item->ID ); ?>">
					<div class="col4">
						<div class="service-item">
							<div class="img-wrap">
								<?php the_post_thumbnail(array( 400, 400), array( 'class' => 'img-fit' ));  ?>
							</div>  
							<div class="service-title-wrap">
								<h4 class="vertical-align-center">
									<?php the_title(); ?>
								</h4>							
							</div>
						</div>
					</div>
				</a>

			<?php endwhile; ?>

			<div class="col12 txt-center">
				<?php $page = get_page_by_title("Usluge");?>
				<a href="<?php echo get_permalink( $page->ID ); ?>" class="btn bg-blue white uppercase"><?php _e('ostale usluge', 'html5blank'); ?></a>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>


<div id="home-banner2" >
	<img src="<?php echo $banner_home2['url']; ?>" class="img-icon" />
</div>

<div id="servisni-centri">
	<div class="container">
		<h1 class="uppercase txt-center">servisni centri</h1>
		<?php get_template_part('templates/lokacije'); ?>
	</div>
</div>

<div id="home-banner3">
	<img src="<?php echo $banner_home3['url']; ?>" class="img-icon" />
</div>


<?php 
	$args = array(
		'post_type' => 'proizvodjaci',
		'showposts' => 12 ,
		'orderby'   => 'post_date',
		'order'   => 'ASC',
	);
	$related_items = new WP_Query( $args );

?>
<?php	if ($related_items->have_posts()) : ?>
<div id="manufacturers">
	<div class="container">
		<h1 class="txt-center uppercase">proizvođači</h1>
		<div class="row clear">
			<?php while ( $related_items->have_posts() ) : $related_items->the_post(); ?>
			
				<a href="<?php echo get_permalink( $related_item->ID ); ?>">
					<div class="col3">
						<div class="img-wrap logos-img2">
							<?php the_post_thumbnail(array( 300, 300), array( 'class' => 'vertical-align-center' ));  ?>
							<img src="<?php the_field('color_img_hover'); ?>" class="hover-color img-fit" />
						</div>  
					</div>
				</a>

			<?php endwhile; ?>

		</div>
	</div>	
</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<div class="container">
	<div class="row">
		<?php get_template_part('templates/upit-banner'); ?>		
	</div>
</div>


<?php get_footer(); ?>