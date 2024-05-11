<?php
/*
Template Name: Timetable Event
*/
get_header();

// Include event content template
if ( ashtanga_is_installed( 'core' ) ) {
	ashtanga_core_template_part( 'plugins/timetable', 'templates/content' );
}

get_footer();
