<?php

class AshtangaCore_Google_Map_Shortcode_Elementor extends AshtangaCore_Elementor_Widget_Base {

	public function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'ashtanga_core_google_map' );

		parent::__construct( $data, $args );
	}
}

ashtanga_core_register_new_elementor_widget( new AshtangaCore_Google_Map_Shortcode_Elementor() );
