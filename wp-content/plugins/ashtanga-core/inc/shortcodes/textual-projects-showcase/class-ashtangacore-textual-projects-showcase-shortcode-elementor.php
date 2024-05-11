<?php

class AshtangaCore_Textual_Projects_Showcase_Shortcode_Elementor extends AshtangaCore_Elementor_Widget_Base {

	public function __construct( array $data = array(), $args = null ) {
		$this->set_shortcode_slug( 'ashtanga_core_textual_projects_showcase' );

		parent::__construct( $data, $args );
	}
}

ashtanga_core_register_new_elementor_widget( new AshtangaCore_Textual_Projects_Showcase_Shortcode_Elementor() );
