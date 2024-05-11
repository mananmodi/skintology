<?php

include_once ASHTANGA_CORE_CPT_PATH . '/testimonials/shortcodes/testimonials-list/class-ashtangacore-testimonials-list-shortcode.php';

foreach ( glob( ASHTANGA_CORE_CPT_PATH . '/testimonials/shortcodes/testimonials-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
