<?php
$post_id       = get_the_ID();
$is_enabled    = ashtanga_core_get_post_value_through_levels( 'qodef_blog_single_enable_related_posts' );
$related_posts = ashtanga_core_get_custom_post_type_related_posts( $post_id, ashtanga_core_get_blog_single_post_taxonomies( $post_id ) );

if ( 'yes' === $is_enabled && ! empty( $related_posts ) && class_exists( 'AshtangaCore_Blog_List_Shortcode' ) ) { ?>
	<div id="qodef-related-posts">
		<h2 class="qodef-m-title-related-posts"><?php echo esc_html__('Related Posts', 'ashtanga-core')?></h2>
		<?php
		$params = apply_filters(
			'ashtanga_core_filter_blog_single_related_posts_params',
			array(
				'custom_class'      => 'qodef--no-bottom-space',
				'layout'            => 'standard',
				'images_proportion' => 'landscape',
				'columns'           => '3',
				'posts_per_page'    => 3,
				'additional_params' => 'tax',
				'post_ids'          => $related_posts['items'],
				'title_tag'         => 'h5',
				'excerpt_length'    => '100',
			)
		);

		echo AshtangaCore_Blog_List_Shortcode::call_shortcode( $params );
		?>
	</div>
<?php } ?>
