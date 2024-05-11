<?php
if ( 'svg-icon' === $icon_type && ! empty ( $svg_icon ) ) {
	echo qode_framework_wp_kses_html( 'svg custom', $svg_icon );
}


