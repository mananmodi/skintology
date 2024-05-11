<?php

class AshtangaCore_Elementor_Container_Handler {
	private static $instance;
	public $containers = array();

	public function __construct() {
		// container extension
		add_action( 'elementor/element/container/_section_responsive/after_section_end', array(
			$this,
			'render_parallax_options'
		), 10, 2 );
		add_action( 'elementor/element/container/_section_responsive/after_section_end', array(
			$this,
			'render_offset_options'
		), 10, 2 );
		add_action( 'elementor/element/container/_section_responsive/after_section_end', array(
			$this,
			'render_grid_options'
		), 10, 2 );
		add_action( 'elementor/frontend/container/before_render', array( $this, 'container_before_render' ) );

		// common stuff
		add_action( 'elementor/frontend/before_enqueue_styles', array( $this, 'enqueue_styles' ), 9 );
		add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'enqueue_scripts' ), 9 );
	}

	/**
	 * @return AshtangaCore_Elementor_Container_Handler
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	// container extension
	public function render_parallax_options( $container, $args ) {
		$container->start_controls_section(
			'qodef_parallax',
			array(
				'label' => esc_html__( 'Ashtanga Parallax', 'ashtanga-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_ADVANCED,
			)
		);

		$container->add_control(
			'qodef_parallax_type',
			array(
				'label'       => esc_html__( 'Enable Parallax', 'ashtanga-core' ),
				'type'        => \Elementor\Controls_Manager::SELECT,
				'default'     => 'no',
				'options'     => array(
					'no'       => esc_html__( 'No', 'ashtanga-core' ),
					'parallax' => esc_html__( 'Yes', 'ashtanga-core' ),
				),
				'render_type' => 'template',
			)
		);

		$container->add_control(
			'qodef_parallax_image',
			array(
				'label'       => esc_html__( 'Parallax Background Image', 'ashtanga-core' ),
				'type'        => \Elementor\Controls_Manager::MEDIA,
				'condition'   => array(
					'qodef_parallax_type' => 'parallax',
				),
				'render_type' => 'template',
			)
		);

		$container->end_controls_section();
	}

	public function render_offset_options( $container, $args ) {
		$container->start_controls_section(
			'qodef_offset',
			array(
				'label' => esc_html__( 'Ashtanga Offset Image', 'ashtanga-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_ADVANCED,
			)
		);

		$container->add_control(
			'qodef_offset_type',
			array(
				'label'       => esc_html__( 'Enable Offset Image', 'ashtanga-core' ),
				'type'        => \Elementor\Controls_Manager::SELECT,
				'default'     => 'no',
				'options'     => array(
					'no'     => esc_html__( 'No', 'ashtanga-core' ),
					'offset' => esc_html__( 'Yes', 'ashtanga-core' ),
				),
				'render_type' => 'template',
			)
		);

		$container->add_control(
			'qodef_offset_type_disable_from',
			array(
				'label'        => esc_html__( 'Offset Image Disable From', 'ashtanga-core' ),
				'type'         => \Elementor\Controls_Manager::SELECT,
				'default'      => '',
				'options'      => array(
					''     => esc_html__( 'Default', 'masterds-core' ),
					'1440' => esc_html__( 'Screen Size 1440', 'masterds-core' ),
					'1366' => esc_html__( 'Screen Size 1366', 'masterds-core' ),
					'1024' => esc_html__( 'Screen Size 1024', 'masterds-core' ),
					'768'  => esc_html__( 'Screen Size 768', 'masterds-core' ),
					'680'  => esc_html__( 'Screen Size 680', 'masterds-core' ),
				),
				'condition'    => array(
					'qodef_offset_type' => 'offset',
				),
				'prefix_class' => 'qodef-offset-image-disabled--',
			)
		);


		$container->add_control(
			'qodef_offset_image',
			array(
				'label'       => esc_html__( 'Offset Image', 'ashtanga-core' ),
				'type'        => \Elementor\Controls_Manager::MEDIA,
				'condition'   => array(
					'qodef_offset_type' => 'offset',
				),
				'render_type' => 'template',
			)
		);

		$container->add_control(
			'qodef_offset_retina_scaling',
			array(
				'label'       => esc_html__( 'Enable Retina scaling', 'ashtanga-core' ),
				'type'        => \Elementor\Controls_Manager::SELECT,
				'condition'   => array(
					'qodef_offset_type' => 'offset',
				),
				'default'     => 'no',
				'options'     => array(
					'default' => esc_html__( 'Default', 'ashtanga-core' ),
					'no'      => esc_html__( 'No', 'ashtanga-core' ),
					'yes'     => esc_html__( 'Yes', 'ashtanga-core' ),
				),
				'render_type' => 'template',
			)
		);

		$container->add_control(
			'qodef_offset_parallax',
			array(
				'label'       => esc_html__( 'Enable Offset Parallax', 'ashtanga-core' ),
				'type'        => \Elementor\Controls_Manager::SELECT,
				'condition'   => array(
					'qodef_offset_type' => 'offset',
				),
				'default'     => 'no',
				'options'     => array(
					'default' => esc_html__( 'Default', 'ashtanga-core' ),
					'no'      => esc_html__( 'No', 'ashtanga-core' ),
					'yes'     => esc_html__( 'Yes', 'ashtanga-core' ),
				),
				'render_type' => 'template',
			)
		);

		$container->add_control(
			'qodef_offset_vertical_anchor',
			array(
				'label'       => esc_html__( 'Offset Image Vertical Anchor', 'ashtanga-core' ),
				'type'        => \Elementor\Controls_Manager::SELECT,
				'default'     => 'top',
				'options'     => array(
					'top'    => esc_html__( 'Top', 'ashtanga-core' ),
					'bottom' => esc_html__( 'Bottom', 'ashtanga-core' ),
				),
				'condition'   => array(
					'qodef_offset_type' => 'offset',
				),
				'render_type' => 'template',
			)
		);

		$container->add_control(
			'qodef_offset_vertical_position',
			array(
				'label'       => esc_html__( 'Offset Image Vertical Position', 'ashtanga-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => '25%',
				'condition'   => array(
					'qodef_offset_type' => 'offset',
				),
				'render_type' => 'template',
			)
		);

		$container->add_control(
			'qodef_offset_horizontal_anchor',
			array(
				'label'       => esc_html__( 'Offset Image Horizontal Anchor', 'ashtanga-core' ),
				'type'        => \Elementor\Controls_Manager::SELECT,
				'default'     => 'left',
				'options'     => array(
					'left'  => esc_html__( 'Left', 'ashtanga-core' ),
					'right' => esc_html__( 'Right', 'ashtanga-core' ),
				),
				'condition'   => array(
					'qodef_offset_type' => 'offset',
				),
				'render_type' => 'template',
			)
		);

		$container->add_control(
			'qodef_offset_horizontal_position',
			array(
				'label'       => esc_html__( 'Offset Image Horizontal Position', 'ashtanga-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => '25%',
				'condition'   => array(
					'qodef_offset_type' => 'offset',
				),
				'render_type' => 'template',
			)
		);

		$container->add_control(
			'qodef_offset_max_width',
			array(
				'label'       => esc_html__( 'Offset Image Max Width', 'ashtanga-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'condition'   => array(
					'qodef_offset_type' => 'offset',
				),
				'render_type' => 'template',
			)
		);

		$container->end_controls_section();
	}

	public function render_grid_options( $container, $args ) {
		$container->start_controls_section(
			'qodef_grid_row',
			array(
				'label' => esc_html__( 'Ashtanga Grid', 'ashtanga-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_ADVANCED,
			)
		);

		$container->add_control(
			'qodef_enable_grid_row',
			array(
				'label'        => esc_html__( 'Make this row "In Grid"', 'ashtanga-core' ),
				'type'         => \Elementor\Controls_Manager::SELECT,
				'default'      => '',
				'options'      => array(
					''     => esc_html__( 'No', 'ashtanga-core' ),
					'grid' => esc_html__( 'Yes', 'ashtanga-core' ),
				),
				'prefix_class' => 'qodef-elementor-content-',
			)
		);

		$container->add_control(
			'qodef_grid_row_behavior',
			array(
				'label'        => esc_html__( 'Grid Row Behavior', 'ashtanga-core' ),
				'type'         => \Elementor\Controls_Manager::SELECT,
				'default'      => '',
				'options'      => array(
					''      => esc_html__( 'Default', 'ashtanga-core' ),
					'right' => esc_html__( 'Extend Grid Right', 'ashtanga-core' ),
					'left'  => esc_html__( 'Extend Grid Left', 'ashtanga-core' ),
				),
				'condition'    => array(
					'qodef_enable_grid_row' => 'grid',
				),
				'prefix_class' => 'qodef-extended-grid qodef-extended-grid--',
			)
		);

		$container->add_control(
			'qodef_grid_row_behavior_disable_below',
			[
				'label'        => esc_html__( 'Grid Row Behavior Disable Below', 'ashtanga-core' ),
				'type'         => \Elementor\Controls_Manager::SELECT,
				'default'      => '',
				'options'      => [
					''     => esc_html__( 'Default', 'ashtanga-core' ),
					'1440' => esc_html__( 'Screen Size 1440', 'ashtanga-core' ),
					'1366' => esc_html__( 'Screen Size 1366', 'ashtanga-core' ),
					'1024' => esc_html__( 'Screen Size 1024', 'ashtanga-core' ),
					'768'  => esc_html__( 'Screen Size 768', 'ashtanga-core' ),
					'680'  => esc_html__( 'Screen Size 680', 'ashtanga-core' ),
					'480'  => esc_html__( 'Screen Size 480', 'ashtanga-core' ),
				],
				'condition'    => [
					'qodef_enable_grid_row' => 'grid',
				],
				'prefix_class' => 'qodef-extended-grid-disabled--',
			]
		);

		$container->end_controls_section();
	}

	public function container_before_render( $widget ) {
		$data     = $widget->get_data();
		$type     = isset( $data['elType'] ) ? $data['elType'] : 'container';
		$settings = $data['settings'];

		if ( 'container' === $type ) {
			if ( isset( $settings['qodef_parallax_type'] ) && 'parallax' === $settings['qodef_parallax_type'] ) {
				$parallax_type  = $widget->get_settings_for_display( 'qodef_parallax_type' );
				$parallax_image = $widget->get_settings_for_display( 'qodef_parallax_image' );

				if ( ! in_array( $data['id'], $this->containers, true ) ) {
					$this->containers[ $data['id'] ][] = array(
						'parallax_type'  => $parallax_type,
						'parallax_image' => $parallax_image,
					);
				}
			}

			if ( isset( $settings['qodef_offset_type'] ) && 'offset' === $settings['qodef_offset_type'] ) {
				$offset_type                = $widget->get_settings_for_display( 'qodef_offset_type' );
				$offset_image               = $widget->get_settings_for_display( 'qodef_offset_image' );
				$offset_retina              = $widget->get_settings_for_display( 'qodef_offset_retina_scaling' );
				$offset_parallax            = $widget->get_settings_for_display( 'qodef_offset_parallax' );
				$offset_vertical_anchor     = $widget->get_settings_for_display( 'qodef_offset_vertical_anchor' );
				$offset_vertical_position   = $widget->get_settings_for_display( 'qodef_offset_vertical_position' );
				$offset_horizontal_anchor   = $widget->get_settings_for_display( 'qodef_offset_horizontal_anchor' );
				$offset_horizontal_position = $widget->get_settings_for_display( 'qodef_offset_horizontal_position' );
				$offset_max_width           = $widget->get_settings_for_display( 'qodef_offset_max_width' );

				if ( ! in_array( $data['id'], $this->containers, true ) ) {
					$this->containers[ $data['id'] ][] = array(
						'offset_type'                => $offset_type,
						'offset_image'               => $offset_image,
						'offset_retina'              => $offset_retina,
						'offset_parallax'            => $offset_parallax,
						'offset_vertical_anchor'     => $offset_vertical_anchor,
						'offset_vertical_position'   => $offset_vertical_position,
						'offset_horizontal_anchor'   => $offset_horizontal_anchor,
						'offset_horizontal_position' => $offset_horizontal_position,
						'offset_max_width'           => $offset_max_width,
					);
				}
			}
		}
	}

	// common stuff
	public function enqueue_styles() {
		wp_enqueue_style( 'ashtanga-core-elementor', ASHTANGA_CORE_PLUGINS_URL_PATH . '/elementor/assets/css/elementor.min.css' );
	}

	public function enqueue_scripts() {
		wp_enqueue_script( 'ashtanga-core-elementor', ASHTANGA_CORE_PLUGINS_URL_PATH . '/elementor/assets/js/elementor.min.js', array(
			'jquery',
			'elementor-frontend'
		) );

		$elementor_global_vars = array(
			'elementorContainerHandler' => $this->containers,
		);

		wp_localize_script(
			'ashtanga-core-elementor',
			'qodefElementorContainerGlobal',
			array(
				'vars' => $elementor_global_vars,
			)
		);
	}
}

if ( ! function_exists( 'ashtanga_core_init_elementor_container_handler' ) ) {
	/**
	 * Function that initialize main page builder handler
	 */
	function ashtanga_core_init_elementor_container_handler() {
		AshtangaCore_Elementor_Container_Handler::get_instance();
	}

	add_action( 'init', 'ashtanga_core_init_elementor_container_handler', 1 );
}
