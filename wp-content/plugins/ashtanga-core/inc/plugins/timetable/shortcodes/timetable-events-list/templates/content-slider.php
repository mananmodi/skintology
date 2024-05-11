<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_attr( $slider_attr, 'data-options' ); ?>>
	<div class="swiper-wrapper">
		<?php
		// Include items
		ashtanga_core_template_part( 'plugins/timetable/shortcodes/timetable-events-list', 'templates/loop', '', $params );
		?>
	</div>

	<?php if ( 'no' !== $slider_pagination ) { ?>
		<div class="swiper-pagination"></div>
	<?php } ?>
</div>
<?php if ( 'no' !== $slider_navigation ) { ?>
	<div class="swiper-button-next qodef-timetable-event-list-swiper-nav swiper-button-outside swiper-button-next-<?php echo esc_attr( $unique ); ?>"></div>
	<div class="swiper-button-prev qodef-timetable-event-list-swiper-nav swiper-button-outside swiper-button-prev-<?php echo esc_attr( $unique ); ?>"></div>
<?php } ?>
