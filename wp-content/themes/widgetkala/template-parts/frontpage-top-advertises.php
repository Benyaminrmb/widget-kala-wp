<div class="container mx-auto px-4 sm:px-6 lg:px-8">
	<?php if ( have_rows( 'front_page_options', 'options' ) ) {
		the_row();
		$small_image_link = get_sub_field( 'small_image_link' );
		$top_small_image  = get_sub_field( 'top_small_image' );
		$big_image_link   = get_sub_field( 'big_image_link' );
		$top_big_image    = get_sub_field( 'top_big_image' );
		$bottom_images    = [
			'1' => [
				'img'  => get_sub_field( 'bottom_image_1' ),
				'link' => get_sub_field( 'image_1_link_field' )
			],
			'2' => [
				'img'  => get_sub_field( 'bottom_image_2' ),
				'link' => get_sub_field( 'image_2_link_field' )
			],
			'3' => [
				'img'  => get_sub_field( 'bottom_image_3' ),
				'link' => get_sub_field( 'image_3_link_field' )
			],
			'4' => [
				'img'  => get_sub_field( 'bottom_image_4' ),
				'link' => get_sub_field( 'image_4_link_field' )
			],
		]


		?>
		<div class="grid gap-x-7 grid-cols-12 justify-between">
			<div class="col-span-4">
				<div class="w-full flex h-full">
					<?php
					if ( has_sub_field( 'small_image_link' ) ) {
						echo '<a href="' . esc_url( $small_image_link['url'] ) . '" >';
					}
					if ( $top_small_image ) {
						echo wp_get_attachment_image( $top_small_image, 'full', FALSE, [ 'class' => 'w-full h-full border rounded-lg' ] );
					}
					if ( has_sub_field( 'small_image_link' ) ) {
						echo '</a>';
					}
					?>
				</div>
			</div>
			<div class="col-span-8">
				<div class="w-full flex h-full">
					<?php if ( $big_image_link ) {
						echo '<a href="' . $big_image_link['url'] . '" >';
					}
					if ( $top_big_image ) {
						echo wp_get_attachment_image( $top_big_image, 'full', FALSE, [ 'class' => 'w-full h-full border rounded-lg' ] );
					}
					if ( $big_image_link ) {
						echo '</a>';
					}
					?>
				</div>
			</div>
		</div>
		<div class="grid mt-7 gap-x-7 grid-cols-12 justify-between">
			<?php foreach ( $bottom_images as $k => $item ) {
				?>
				<div class="col-span-3">
					<div class="w-full flex h-full">
						<?php if ( $item['link'] ) {
							echo '<a href="' . $item['link']['url'] . '" target="' . $item['link']['target'] . '">';
						}
						if ( $item['img'] ) {
							echo wp_get_attachment_image( $item['img'], 'full', FALSE, [ 'class' => 'w-full h-full border rounded-lg' ] );
						}
						if ( $item['link'] ) {
							echo '</a>';
						}
						?>
					</div>
				</div>
			<?php } ?>
		</div>
		<?php
	} ?>
</div>