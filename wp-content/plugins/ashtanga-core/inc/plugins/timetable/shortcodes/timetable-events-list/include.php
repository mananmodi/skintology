<?php

include_once ASHTANGA_CORE_PLUGINS_PATH . '/timetable/shortcodes/timetable-events-list/class-ashtangacore-timetable-events-list.php';

foreach ( glob( ASHTANGA_CORE_PLUGINS_PATH . '/timetable/shortcodes/timetable-events-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}