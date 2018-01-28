<?php if( have_rows('locations' , 'option') ): ?>
<div class="lokacije">

	<div class="row clear">
		<?php while( have_rows('locations' , 'option') ): the_row(); 

		// vars
		$location_station = get_sub_field('location_station' , 'option');
		$location_address = get_sub_field('location_address' , 'option');
		$location_phone = get_sub_field('location_phone' , 'option');
		$working_time = get_sub_field('working_time' , 'option');
		$weekend_working_time = get_sub_field('weekend_working_time' , 'option');
		$location_email = get_sub_field('location_email' , 'option');
		$iframe_map = get_sub_field('iframe_map' , 'option');


		//trim strings
		$str = $location_phone;
		$str = preg_replace('/\D/', '', $str);
		
		?>
		<div class="col6">
			<div class="locations-item">
				
				<h5><?php echo $iframe_map; ?></h5>
				<h5><?php echo $location_station; ?></h5>
				<table>
					<tr>
						<td>Adresa:</td>
						<td><b><?php echo $location_address; ?></b></td>
					</tr>
					<tr>
						<td>Telefon:</td>
						<td><b class="blue"><a class="phone-banner" href="tel:<?php echo $str; ?>"><?php echo $location_phone; ?></a></b></td>
					</tr>
					<tr>
						<td>Radno vreme:</td>
						<td><b><?php echo $working_time; ?></b></td>
					</tr>
					<tr>
						<td></td>
						<td><b><?php echo $weekend_working_time; ?></b></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><b><a href="email:<?php echo $location_email; ?>" class="email-link"></a><?php echo $location_email; ?></b></td>
					</tr>												
				</table>
			</div>
		</div>
		

		<?php endwhile; ?>						
	</div>
</div>
<?php endif; ?>