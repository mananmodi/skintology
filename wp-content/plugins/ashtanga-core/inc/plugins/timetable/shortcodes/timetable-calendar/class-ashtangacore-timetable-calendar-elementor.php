<?php

class AshtangaCore_Timetable_Calendar_Elementor extends AshtangaCore_Elementor_Widget_Base {


	public function __construct( array $data = array(), $args = null ) {
		$this->set_shortcode_slug( 'ashtanga_core_timetable_calendar' );

		parent::__construct( $data, $args );
	}
}

if ( qode_framework_is_installed( 'timetable' ) ) {
	ashtanga_core_register_new_elementor_widget( new AshtangaCore_Timetable_Calendar_Elementor() );
}
