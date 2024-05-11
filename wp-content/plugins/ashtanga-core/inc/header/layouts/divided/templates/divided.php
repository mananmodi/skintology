<div class="qodef-divided-header-left-wrapper">
	<?php
	// Include divided left navigation
	ashtanga_core_template_part( 'header/layouts/divided', 'templates/parts/left-navigation' );

	// Include widget area two
	ashtanga_core_get_header_widget_area( 'two' );
	?>
</div>
<?php
// Include logo
ashtanga_core_get_header_logo_image();
?>
<div class="qodef-divided-header-right-wrapper">
	<?php
	// Include divided right navigation
	ashtanga_core_template_part( 'header/layouts/divided', 'templates/parts/right-navigation' );

	// Include widget area one
	ashtanga_core_get_header_widget_area();
	?>
</div>
