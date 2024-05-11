<?php if ( isset( $query_result ) && intval( $max_num_pages ) > 1 ) { ?>
	<div class="qodef-m-pagination qodef--standard">
		<div class="qodef-m-pagination-inner">
			<nav class="qodef-m-pagination-items">
				<div class="qodef-m-pagination-item qodef--prev">
					<a href="#" data-paged="1">
						<?php echo ashtanga_core_get_svg_icon( 'pagination-arrow-left' ); ?>
					</a>
				</div>
				<?php
				for ( $i = 1; $i <= intval( $max_num_pages ); $i ++ ) {
					$classes     = 1 === $i ? 'qodef--active' : '';
					$formatted_i = sprintf( '%d', $i );
					?>
					<div class="qodef-m-pagination-item qodef--number qodef--number-<?php echo esc_attr( $i ); ?> <?php echo esc_attr( $classes ); ?>">
						<a href="#" data-paged="<?php echo esc_attr( $i ); ?>"><?php echo esc_html( $formatted_i ); ?></a>
					</div>
				<?php } ?>
				<div class="qodef-m-pagination-item qodef--next">
					<a href="#" data-paged="2">
						<?php echo ashtanga_core_get_svg_icon( 'pagination-arrow-right' ); ?>
					</a>
				</div>
			</nav>
		</div>
	</div>
<?php } ?>

