

<?php if( have_rows('featured_offers', 'option') ): ?>
<div class="row clear">

		<?php while( have_rows('featured_offers', 'option') ): the_row(); 
			// vars
			$slika_artikla = get_sub_field('slika_artikla', 'option');
			$naziv_usluge = get_sub_field('naziv_usluge', 'option');
			$naziv_artikla = get_sub_field('naziv_artikla', 'option');
			$cena_artikla = get_sub_field('cena_artikla', 'option');


		?>
		<div class="col4">
			
			<div class="item-featured txt-center">
				<div class="img-wrap">
					<img src="<?php echo $slika_artikla['url']; ?>" class="img-fit" />
				</div>
				<p><?php echo $naziv_usluge; ?></p>
				<h5><?php echo $naziv_artikla; ?></h5>
				<h3><?php echo $cena_artikla; ?> rsd</h3>
			</div>
		</div>


<?php endwhile; ?>
</div>
<?php endif;  ?>