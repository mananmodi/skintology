<?php

class AshtangaCore_Divided_Header extends AshtangaCore_Header {
	private static $instance;

	public function __construct() {
		$this->set_layout( 'divided' );
		$this->set_search_layout( 'covers-header' );
		$this->default_header_height = 110;

		parent::__construct();
	}

	/**
	 * @return AshtangaCore_Divided_Header
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}
