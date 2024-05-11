<div class="qodef-reviews-list-info qodef-reviews-per-mark">
	<?php foreach ( $post_ratings as $rating ) { ?>
		<?php
		$average_rating     = ashtanga_core_post_average_rating( $rating );
		$rating_count       = $rating['count'];
		$rating_count_label = 1 === $rating_count ? esc_html__( 'Rating', 'ashtanga-core' ) : esc_html__( 'Ratings', 'ashtanga-core' );
		$rating_marks       = $rating['marks'];
		?>
		<div class="qodef-reviews-number-holder">
			<div class="qodef-reviews-number-wrapper">
				<span class="qodef-reviews-number"><?php echo esc_html( $average_rating ); ?></span>
				<span class="qodef-stars-wrapper">
							<span class="qodef-stars">
								<?php for ( $i = 1; $i <= $average_rating; $i ++ ) {
									echo ashtanga_core_get_svg_icon( 'star' );
								} ?>
							</span>
							<span class="qodef-reviews-count">
								<?php echo esc_html__( 'Rated', 'ashtanga-core' ) . ' ' . $average_rating . ' ' . esc_html__( 'out of', 'ashtanga-core' ) . ' ' . $rating_count . ' ' . $rating_count_label; ?>
							</span>
						</span>
			</div>
			<div class="qodef-rating-percentage-wrapper">
				<?php
				foreach ( $rating_marks as $item => $value ) {
					$percentage = 0 == $rating_count ? 0 : round( ( $value / $rating_count ) * 100 );
					echo do_shortcode( '[ashtanga_core_progress_bar layout="line" number="' . esc_attr( $percentage ) . '" title="' . esc_attr( $item ) . esc_attr__( ' stars', 'ashtanga-core' ) . '"]' );
				}
				?>
			</div>
		</div>
	<?php } ?>
</div>
