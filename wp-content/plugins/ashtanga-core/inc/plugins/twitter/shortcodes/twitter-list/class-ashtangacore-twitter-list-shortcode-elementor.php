<?php

class AshtangaCore_Twitter_List_Shortcode_Elementor extends AshtangaCore_Elementor_Widget_Base {

	public function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'ashtanga_core_twitter_list' );

		parent::__construct( $data, $args );
	}
}

if ( qode_framework_is_installed( 'twitter' ) ) {
	ashtanga_core_register_new_elementor_widget( new AshtangaCore_Twitter_List_Shortcode_Elementor() );
}
