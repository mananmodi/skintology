<?php

class AshtangaCore_Centered_Header extends AshtangaCore_Header {
	private static $instance;

	public function __construct() {
		$this->set_layout( 'centered' );
		$this->set_layout_slug( 'centered' );
		$this->set_search_layout( 'covers-header' );
		$this->default_header_height = 200;

		parent::__construct();
	}

	/**
	 * @return AshtangaCore_Centered_Header
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}
