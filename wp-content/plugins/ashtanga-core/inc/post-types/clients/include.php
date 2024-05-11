<?php

include_once ASHTANGA_CORE_CPT_PATH . '/clients/helper.php';

foreach ( glob( ASHTANGA_CORE_CPT_PATH . '/clients/dashboard/meta-box/*.php' ) as $module ) {
	include_once $module;
}
