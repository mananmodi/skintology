<?php
// Include logo
ashtanga_core_get_header_logo_image();
?>
<div class="qodef-centered-header-wrapper">
	<?php
	// Include widget area two
	ashtanga_core_get_header_widget_area( 'two' );

	// Include main navigation
	ashtanga_core_template_part( 'header', 'templates/parts/navigation' );

	// Include widget area one
	ashtanga_core_get_header_widget_area();
	?>
</div>
