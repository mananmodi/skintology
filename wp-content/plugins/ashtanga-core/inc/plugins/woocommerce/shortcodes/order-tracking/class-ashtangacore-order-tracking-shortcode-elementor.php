<?php

class AshtangaCore_Order_Tracking_Shortcode_Elementor extends AshtangaCore_Elementor_Widget_Base {

	public function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'ashtanga_core_order_tracking' );

		parent::__construct( $data, $args );
	}
}

if ( qode_framework_is_installed( 'woocommerce' ) ) {
	ashtanga_core_register_new_elementor_widget( new AshtangaCore_Order_Tracking_Shortcode_Elementor() );
}
