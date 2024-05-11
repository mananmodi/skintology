<?php

include_once ASHTANGA_CORE_INC_PATH . '/header/top-area/class-ashtangacore-top-area.php';
include_once ASHTANGA_CORE_INC_PATH . '/header/top-area/helper.php';

foreach ( glob( ASHTANGA_CORE_INC_PATH . '/header/top-area/dashboard/*/*.php' ) as $dashboard ) {
	include_once $dashboard;
}
