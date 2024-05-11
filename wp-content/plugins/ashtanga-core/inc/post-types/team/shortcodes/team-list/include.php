<?php

include_once ASHTANGA_CORE_CPT_PATH . '/team/shortcodes/team-list/class-ashtangacore-team-list-shortcode.php';

foreach ( glob( ASHTANGA_CORE_CPT_PATH . '/team/shortcodes/team-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
