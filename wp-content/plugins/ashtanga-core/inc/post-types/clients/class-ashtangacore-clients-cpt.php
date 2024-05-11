<?php

if ( ! function_exists( 'ashtanga_core_register_clients_for_meta_options' ) ) {
	/**
	 * Function that add custom post type into global meta box allowed items array for saving meta box options
	 *
	 * @param array $post_types
	 *
	 * @return array
	 */
	function ashtanga_core_register_clients_for_meta_options( $post_types ) {
		$post_types[] = 'clients';

		return $post_types;
	}

	add_filter( 'qode_framework_filter_meta_box_save', 'ashtanga_core_register_clients_for_meta_options' );
	add_filter( 'qode_framework_filter_meta_box_remove', 'ashtanga_core_register_clients_for_meta_options' );
}

if ( ! function_exists( 'ashtanga_core_add_clients_custom_post_type' ) ) {
	/**
	 * Function that adds clients custom post type
	 *
	 * @param array $cpts
	 *
	 * @return array
	 */
	function ashtanga_core_add_clients_custom_post_type( $cpts ) {
		$cpts[] = 'AshtangaCore_Clients_CPT';

		return $cpts;
	}

	add_filter( 'ashtanga_core_filter_register_custom_post_types', 'ashtanga_core_add_clients_custom_post_type' );
}

if ( class_exists( 'QodeFrameworkCustomPostType' ) ) {
	class AshtangaCore_Clients_CPT extends QodeFrameworkCustomPostType {

		public function map_post_type() {
			$name = esc_html__( 'Clients', 'ashtanga-core' );
			$this->set_base( 'clients' );
			$this->set_menu_position( 10 );
			$this->set_menu_icon( 'dashicons-groups' );
			$this->set_slug( 'clients' );
			$this->set_name( $name );
			$this->set_path( ASHTANGA_CORE_CPT_PATH . '/clients' );
			$this->set_labels(
				array(
					'name'          => esc_html__( 'Ashtanga Clients', 'ashtanga-core' ),
					'singular_name' => esc_html__( 'Client', 'ashtanga-core' ),
					'add_item'      => esc_html__( 'New Client', 'ashtanga-core' ),
					'add_new_item'  => esc_html__( 'Add New Client', 'ashtanga-core' ),
					'edit_item'     => esc_html__( 'Edit Client', 'ashtanga-core' ),
				)
			);
			$this->set_public( false );
			$this->set_archive( false );
			$this->set_supports(
				array(
					'title',
					'thumbnail',
				)
			);
			$this->add_post_taxonomy(
				array(
					'base'          => 'clients-category',
					'slug'          => 'clients-category',
					'singular_name' => esc_html__( 'Category', 'ashtanga-core' ),
					'plural_name'   => esc_html__( 'Categories', 'ashtanga-core' ),
				)
			);
		}
	}
}
