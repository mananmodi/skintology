<?php

$author_description = get_the_author_meta( 'description', $author_params['ID'] );
?>
<div itemprop="description" class="qodef-e-description">
	<?php echo esc_html( $author_description ); ?>
</div>
