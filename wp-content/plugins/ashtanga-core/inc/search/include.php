<?php

include_once ASHTANGA_CORE_INC_PATH . '/search/class-ashtangacore-search.php';
include_once ASHTANGA_CORE_INC_PATH . '/search/helper.php';
include_once ASHTANGA_CORE_INC_PATH . '/search/dashboard/admin/search-options.php';

foreach ( glob( ASHTANGA_CORE_INC_PATH . '/search/layouts/*/include.php' ) as $layout ) {
	include_once $layout;
}
