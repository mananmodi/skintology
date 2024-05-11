<?php

class AshtangaCore_Fullscreen_Search extends AshtangaCore_Search {
	private static $instance;

	public function __construct() {
		parent::__construct();
		add_action( 'ashtanga_action_page_footer_template', array( $this, 'load_template' ), 11 ); //after footer
	}

	/**
	 * @return AshtangaCore_Fullscreen_Search
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function load_template() {
		if ( is_active_widget( false, false, 'ashtanga_core_search_opener' ) ) {
			ashtanga_core_template_part( 'search/layouts/' . $this->get_search_layout(), 'templates/' . $this->get_search_layout() );
		}
	}
}
