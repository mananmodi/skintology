<?php

if ( ! function_exists( 'ashtanga_get_blog_holder_classes' ) ) {
	/**
	 * Function that return classes for the main blog holder
	 *
	 * @return string
	 */
	function ashtanga_get_blog_holder_classes() {
		$classes = array();

		if ( is_single() ) {
			$classes[] = 'qodef--single';
		} else {
			$classes[] = 'qodef--list';
		}

		return implode( ' ', apply_filters( 'ashtanga_filter_blog_holder_classes', $classes ) );
	}
}

if ( ! function_exists( 'ashtanga_get_blog_list_excerpt_length' ) ) {
	/**
	 * Function that return number of characters for excerpt on blog list page
	 *
	 * @return int
	 */
	function ashtanga_get_blog_list_excerpt_length() {
		$length = apply_filters( 'ashtanga_filter_post_excerpt_length', 180 );

		return intval( $length );
	}
}

if ( ! function_exists( 'ashtanga_post_has_read_more' ) ) {
	/**
	 * Function that checks if current post has read more tag set
	 *
	 * @return int position of read more tag text. It will return false if read more tag isn't set
	 */
	function ashtanga_post_has_read_more() {
		global $post;

		return ! empty( $post ) ? strpos( $post->post_content, '<!--more-->' ) : false;
	}
}

if ( ! function_exists( 'ashtanga_post_has_media' ) ) {
	/**
	 * Function that gets post media params
	 *
	 * @return boolean
	 */
	function ashtanga_post_has_media() {

		switch ( get_post_format() ) {
			case 'gallery':
				$gallery_meta = get_post_meta( get_the_ID(), 'qodef_post_format_gallery_images', true );
				return ! empty( $gallery_meta ) || has_post_thumbnail();
				break;
			case 'video':
				$video_meta = get_post_meta( get_the_ID(), 'qodef_post_format_video_url', true );
				return ! empty( $video_meta ) || has_post_thumbnail();
				break;
			default:
				return has_post_thumbnail();
				break;
		}
	}
}
