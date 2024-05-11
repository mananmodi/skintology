<?php

if ( ! function_exists( 'ashtanga_core_add_author_info_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function ashtanga_core_add_author_info_widget( $widgets ) {
		$widgets[] = 'AshtangaCore_Author_Info_Widget';

		return $widgets;
	}

	add_filter( 'ashtanga_core_filter_register_widgets', 'ashtanga_core_add_author_info_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class AshtangaCore_Author_Info_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$this->set_base( 'ashtanga_core_author_info' );
			$this->set_name( esc_html__( 'Ashtanga Author Info', 'ashtanga-core' ) );
			$this->set_description( esc_html__( 'Add author info element into widget areas', 'ashtanga-core' ) );
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'author_username',
					'title'      => esc_html__( 'Author Username', 'ashtanga-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'color',
					'name'       => 'author_color',
					'title'      => esc_html__( 'Author Color', 'ashtanga-core' ),
				)
			);
		}

		public function render( $atts ) {
			$author_id = 1;
			if ( ! empty( $atts['author_username'] ) ) {
				$author = get_user_by( 'login', $atts['author_username'] );

				if ( ! empty( $author ) ) {
					$author_id = $author->ID;
				}
			}

			$author_link = get_author_posts_url( $author_id );
			$author_position = get_the_author_meta( 'position', $author_id );
			$author_bio  = get_the_author_meta( 'description', $author_id );
			?>
			<div class="widget qodef-author-info">
				<a itemprop="url" class="qodef-author-info-image" href="<?php echo esc_url( $author_link ); ?>">
					<?php echo get_avatar( $author_id, 350 ); ?>
				</a>
				<?php if ( ! empty( $author_bio ) ) { ?>
					<h4 class="qodef-author-info-name vcard author">
						<a itemprop="url" href="<?php echo esc_url( $author_link ); ?>">
							<span class="fn"><?php echo esc_html( get_the_author_meta( 'display_name', $author_id ) ); ?></span>
						</a>
					</h4>
					<?php if ( ! empty( $author_position ) ) { ?>
						<div class="qodef-author-info-position"><?php echo esc_html( $author_position ); ?></div>
					<?php } ?>
				<?php } ?>
			</div>
			<?php
		}
	}
}
