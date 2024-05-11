<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?>>
	<div class="qodef-m-inner">
		<div class="qodef-m-main">
			<?php ashtanga_core_template_part( 'shortcodes/pricing-table', 'templates/parts/title', '', $params ); ?>
			<?php ashtanga_core_template_part( 'shortcodes/pricing-table', 'templates/parts/subtitle', '', $params ); ?>
			<?php ashtanga_core_template_part( 'shortcodes/pricing-table', 'templates/parts/price', '', $params ); ?>
			<?php ashtanga_core_template_part( 'shortcodes/pricing-table', 'templates/parts/content', '', $params ); ?>
		</div>
		<div class="qodef-m-action" <?php qode_framework_inline_style( $action_holder_styles ); ?>>
			<?php ashtanga_core_template_part( 'shortcodes/pricing-table', 'templates/parts/button', '', $params ); ?>
		</div>
	</div>
</div>
