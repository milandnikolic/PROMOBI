<div id="upit" class="flex btn">
	<div class="flex-item">
		<h1 class="white">Zanima vas cena popravke?</h1>	
		<p class="white">Pošaljite nam upit sa informacijama o kvaru i dobićete odgovor u najkraćem roku.</p>	
	</div>

	<div class="flex-item">
		<?php $page = get_page_by_title("Saznajte cenu popravke");?>
		<a href="<?php echo get_permalink( $page->ID ); ?>" class="btn bg-yellow uppercase"><?php _e('Pošalji upit', 'html5blank'); ?></a>		
	</div>

</div>
