<?php

namespace EHD_Themes;

use WP_Customize_Color_Control;
use WP_Customize_Image_Control;
use WP_Customize_Manager;

/**
 * Customizer Class
 *
 * @author eHD
 */

\defined( 'ABSPATH' ) || die;

final class Customizer {
	public function __construct() {

		// Theme Customizer settings and controls.
		add_action( 'customize_register', [ &$this, 'customize_register' ], 30 );
	}

	/** ---------------------------------------- */

	/**
	 * @param WP_Customize_Manager $wp_customize
	 *
	 * @return void
	 */
	private function _logo_and_title( WP_Customize_Manager $wp_customize ): void {

		// Logo mobile
		$wp_customize->add_setting(
			'alt_logo',
			[
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_image',
			]
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'alt_logo',
				[
					'label'    => __( 'Alternative Logo', EHD_PLUGIN_TEXT_DOMAIN ),
					'section'  => 'title_tagline',
					'settings' => 'alt_logo',
					'priority' => 8,
				]
			)
		);

		// Add control
		$wp_customize->add_setting(
			'logo_title_setting',
			[
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			]
		);
		$wp_customize->add_control(
			'logo_title_control',
			[
				'label'    => __( 'The title of logo', EHD_PLUGIN_TEXT_DOMAIN ),
				'section'  => 'title_tagline',
				'settings' => 'logo_title_setting',
				'type'     => 'text',
				'priority' => 9,
			]
		);
	}

	/** ---------------------------------------- */

	/**
	 * Register customizer options.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function customize_register( WP_Customize_Manager $wp_customize ): void {
		self::_logo_and_title( $wp_customize );

		// -------------------------------------------------------------

		// Create custom panels
		$wp_customize->add_panel(
			'addon_menu_panel',
			[
				'priority'       => 140,
				'theme_supports' => '',
				'title'          => __( 'MNMN', EHD_PLUGIN_TEXT_DOMAIN ),
				'description'    => __( 'Controls the add-on menu', EHD_PLUGIN_TEXT_DOMAIN ),
			]
		);

		// -------------------------------------------------------------
		// Login page
		// -------------------------------------------------------------

		$wp_customize->add_section(
			'login_page_section',
			[
				'title'    => __( 'Login page', EHD_PLUGIN_TEXT_DOMAIN ),
				'panel'    => 'addon_menu_panel',
				'priority' => 999,
			]
		);

		$wp_customize->add_setting(
			'login_page_bgcolor_setting',
			[
				'sanitize_callback' => 'sanitize_hex_color',
				'capability'        => 'edit_theme_options',
			]
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize,
				'login_page_bgcolor_control',
				[
					'label'    => __( 'Background color', EHD_PLUGIN_TEXT_DOMAIN ),
					'section'  => 'login_page_section',
					'settings' => 'login_page_bgcolor_setting',
					'priority' => 8,
				]
			)
		);

		$wp_customize->add_setting(
			'login_page_bgimage_setting',
			[
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_image',
			]
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'login_page_bgimage_control',
				[
					'label'    => __( 'Background image', EHD_PLUGIN_TEXT_DOMAIN ),
					'section'  => 'login_page_section',
					'settings' => 'login_page_bgimage_setting',
					'priority' => 9,
				]
			)
		);

		$wp_customize->add_setting(
			'login_page_logo_setting',
			[
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_image',
			]
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'login_page_logo_control',
				[
					'label'    => __( 'Logo', EHD_PLUGIN_TEXT_DOMAIN ),
					'section'  => 'login_page_section',
					'settings' => 'login_page_logo_setting',
					'priority' => 10,
				]
			)
		);

		$wp_customize->add_setting(
			'login_page_headertext_setting',
			[
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			]
		);
		$wp_customize->add_control(
			'login_page_headertext_control',
			[
				'label'       => __( 'Header text', EHD_PLUGIN_TEXT_DOMAIN ),
				'section'     => 'login_page_section',
				'settings'    => 'login_page_headertext_setting',
				'type'        => 'text',
				'priority'    => 11,
				'description' => __( 'Changing the alt text', EHD_PLUGIN_TEXT_DOMAIN ),
			]
		);

		$wp_customize->add_setting(
			'login_page_headerurl_setting',
			[
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			]
		);
		$wp_customize->add_control(
			'login_page_headerurl_control',
			[
				'label'       => __( 'Header url', EHD_PLUGIN_TEXT_DOMAIN ),
				'section'     => 'login_page_section',
				'settings'    => 'login_page_headerurl_setting',
				'type'        => 'url',
				'priority'    => 12,
				'description' => __( 'Changing the logo link', EHD_PLUGIN_TEXT_DOMAIN ),
			]
		);

		// -------------------------------------------------------------
		// offCanvas Menu
		// -------------------------------------------------------------

//		$wp_customize->add_section(
//			'offcanvas_menu_section',
//			[
//				'title'    => __( 'offCanvas', EHD_PLUGIN_TEXT_DOMAIN ),
//				'panel'    => 'addon_menu_panel',
//				'priority' => 1000,
//			]
//		);
//
//		// Add offcanvas control
//		$wp_customize->add_setting(
//			'offcanvas_menu_setting',
//			[
//				'default'           => 'default',
//				'sanitize_callback' => 'sanitize_text_field',
//				'capability'        => 'edit_theme_options',
//			]
//		);
//		$wp_customize->add_control(
//			'offcanvas_menu_control',
//			[
//				'label'    => __( 'offCanvas position', EHD_PLUGIN_TEXT_DOMAIN ),
//				'type'     => 'radio',
//				'section'  => 'offcanvas_menu_section',
//				'settings' => 'offcanvas_menu_setting',
//				'choices'  => [
//					'left'    => __( 'Left', EHD_PLUGIN_TEXT_DOMAIN ),
//					'right'   => __( 'Right', EHD_PLUGIN_TEXT_DOMAIN ),
//					'top'     => __( 'Top', EHD_PLUGIN_TEXT_DOMAIN ),
//					'bottom'  => __( 'Bottom', EHD_PLUGIN_TEXT_DOMAIN ),
//					'default' => __( 'Default (Right)', EHD_PLUGIN_TEXT_DOMAIN ),
//				],
//			]
//		);

		// -------------------------------------------------------------
		// Breadcrumbs
		// -------------------------------------------------------------

		$wp_customize->add_section(
			'breadcrumb_section',
			[
				'title'    => __( 'Breadcrumbs', EHD_PLUGIN_TEXT_DOMAIN ),
				'panel'    => 'addon_menu_panel',
				'priority' => 1007,
			]
		);

		// Add control
		$wp_customize->add_setting(
			'breadcrumb_bg_setting',
			[
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_image',
			]
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'breadcrumb_bg_control',
				[
					'label'    => __( 'Breadcrumb background', EHD_PLUGIN_TEXT_DOMAIN ),
					'section'  => 'breadcrumb_section',
					'settings' => 'breadcrumb_bg_setting',
					'priority' => 9,
				]
			)
		);

		// -------------------------------------------------------------
		// Header
		// -------------------------------------------------------------

		// Create footer section
		$wp_customize->add_section(
			'header_section',
			[
				'title'    => __( 'Header', EHD_PLUGIN_TEXT_DOMAIN ),
				'panel'    => 'addon_menu_panel',
				'priority' => 1008,
			]
		);

		// Add control
		$wp_customize->add_setting(
			'header_bgcolor_setting',
			[
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			]
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize,
				'header_bgcolor_control',
				[
					'label'    => __( 'Header background color', EHD_PLUGIN_TEXT_DOMAIN ),
					'section'  => 'header_section',
					'settings' => 'header_bgcolor_setting',
					'priority' => 9,
				]
			)
		);

		// Add control
		$wp_customize->add_setting(
			'header_bg_setting',
			[
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_image',
			]
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'header_bg_control',
				[
					'label'    => __( 'Header background', EHD_PLUGIN_TEXT_DOMAIN ),
					'section'  => 'header_section',
					'settings' => 'header_bg_setting',
				]
			)
		);

		// Add control
//		$wp_customize->add_setting(
//			'top_header_setting',
//			[
//				'capability'        => 'edit_theme_options',
//				'sanitize_callback' => 'sanitize_text_field'
//			]
//		);
//		$wp_customize->add_control(
//			'top_header_control',
//			[
//				'label'       => __( 'Top-Header columns', EHD_PLUGIN_TEXT_DOMAIN ),
//				'section'     => 'header_section',
//				'settings'    => 'top_header_setting',
//				'type'        => 'number',
//				'description' => __( 'Top Header columns number', EHD_PLUGIN_TEXT_DOMAIN ),
//			]
//		);

		// add control
//		$wp_customize->add_setting(
//			'top_header_container_setting',
//			[
//				'default'           => false,
//				'capability'        => 'edit_theme_options',
//				'sanitize_callback' => 'sanitize_checkbox',
//			]
//		);
//		$wp_customize->add_control(
//			'top_header_container_control',
//			[
//				'type'     => 'checkbox',
//				'settings' => 'top_header_container_setting',
//				'section'  => 'header_section',
//				'label'    => __( 'Top Header Container', EHD_PLUGIN_TEXT_DOMAIN ),
//			]
//		);

		// Add control
		$wp_customize->add_setting(
			'header_setting',
			[
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			]
		);
		$wp_customize->add_control(
			'header_control',
			[
				'label'       => __( 'Header columns', EHD_PLUGIN_TEXT_DOMAIN ),
				'section'     => 'header_section',
				'settings'    => 'header_setting',
				'type'        => 'number',
				'description' => __( 'Header columns number', EHD_PLUGIN_TEXT_DOMAIN ),
			]
		);

		// add control
//		$wp_customize->add_setting(
//			'header_container_setting',
//			[
//				'default'           => false,
//				'capability'        => 'edit_theme_options',
//				'sanitize_callback' => 'sanitize_checkbox',
//			]
//		);
//		$wp_customize->add_control(
//			'header_container_control',
//			[
//				'type'     => 'checkbox',
//				'settings' => 'header_container_setting',
//				'section'  => 'header_section',
//				'label'    => __( 'Header Container', EHD_PLUGIN_TEXT_DOMAIN ),
//			]
//		);

		// Add control
//		$wp_customize->add_setting(
//			'bottom_header_setting',
//			[
//				'capability'        => 'edit_theme_options',
//				'sanitize_callback' => 'sanitize_text_field'
//			]
//		);
//		$wp_customize->add_control(
//			'bottom_header_control',
//			[
//				'label'       => __( 'Bottom Header columns', EHD_PLUGIN_TEXT_DOMAIN ),
//				'section'     => 'header_section',
//				'settings'    => 'bottom_header_setting',
//				'type'        => 'number',
//				'description' => __( 'Bottom Header columns number', EHD_PLUGIN_TEXT_DOMAIN ),
//			]
//		);

		// add control
//		$wp_customize->add_setting(
//			'bottom_header_container_setting',
//			[
//				'default'           => false,
//				'capability'        => 'edit_theme_options',
//				'sanitize_callback' => 'sanitize_checkbox',
//			]
//		);
//		$wp_customize->add_control(
//			'bottom_header_container_control',
//			[
//				'type'     => 'checkbox',
//				'settings' => 'bottom_header_container_setting',
//				'section'  => 'header_section',
//				'label'    => __( 'Bottom Header Container', EHD_PLUGIN_TEXT_DOMAIN ),
//			]
//		);

		// -------------------------------------------------------------
		// Footer
		// -------------------------------------------------------------

		// Create footer section
		$wp_customize->add_section(
			'footer_section',
			[
				'title'    => __( 'Footer', EHD_PLUGIN_TEXT_DOMAIN ),
				'panel'    => 'addon_menu_panel',
				'priority' => 1008,
			]
		);

		// Add control
		$wp_customize->add_setting(
			'footer_bgcolor_setting',
			[
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			]
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize,
				'footer_bgcolor_control',
				[
					'label'    => __( 'Footer background color', EHD_PLUGIN_TEXT_DOMAIN ),
					'section'  => 'footer_section',
					'settings' => 'footer_bgcolor_setting',
					'priority' => 9,
				]
			)
		);

		// Add control Footer background
		$wp_customize->add_setting(
			'footer_bg_setting',
			[
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_image',
			]
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'footer_bg_control',
				[
					'label'    => __( 'Footer background', EHD_PLUGIN_TEXT_DOMAIN ),
					'section'  => 'footer_section',
					'settings' => 'footer_bg_setting',
				]
			)
		);

		// Add control
		$wp_customize->add_setting(
			'footer_row_setting',
			[
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			]
		);
		$wp_customize->add_control(
			'footer_row_control',
			[
				'label'       => __( 'Footer rows', EHD_PLUGIN_TEXT_DOMAIN ),
				'section'     => 'footer_section',
				'settings'    => 'footer_row_setting',
				'type'        => 'number',
				'description' => __( 'Footer rows number', EHD_PLUGIN_TEXT_DOMAIN ),
			]
		);

		// Add control
		$wp_customize->add_setting(
			'footer_col_setting',
			[
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			]
		);
		$wp_customize->add_control(
			'footer_col_control',
			[
				'label'       => __( 'Footer columns', EHD_PLUGIN_TEXT_DOMAIN ),
				'section'     => 'footer_section',
				'settings'    => 'footer_col_setting',
				'type'        => 'number',
				'description' => __( 'Footer columns number', EHD_PLUGIN_TEXT_DOMAIN ),
			]
		);

		// add control
//		$wp_customize->add_setting(
//			'footer_container_setting',
//			[
//				'default'           => false,
//				'capability'        => 'edit_theme_options',
//				'sanitize_callback' => 'sanitize_checkbox',
//			]
//		);
//		$wp_customize->add_control(
//			'footer_container_control',
//			[
//				'type'     => 'checkbox',
//				'settings' => 'footer_container_setting',
//				'section'  => 'footer_section',
//				'label'    => __( 'Footer Container', EHD_PLUGIN_TEXT_DOMAIN ),
//			]
//		);

		// -------------------------------------------------------------
		// Others
		// -------------------------------------------------------------

		$wp_customize->add_section(
			'other_section',
			[
				'title'    => __( 'Other', EHD_PLUGIN_TEXT_DOMAIN ),
				'panel'    => 'addon_menu_panel',
				'priority' => 1011,
			]
		);

		// Meta theme-color
		$wp_customize->add_setting(
			'theme_color_setting',
			[
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color',
			]
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize,
				'theme_color_control',
				[
					'label'    => __( 'Theme Color', EHD_PLUGIN_TEXT_DOMAIN ),
					'section'  => 'other_section',
					'settings' => 'theme_color_setting',
				]
			)
		);

		// Hide menu
		$wp_customize->add_setting(
			'remove_menu_setting',
			[
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_textarea_field',
			]
		);
		$wp_customize->add_control(
			'remove_menu_control',
			[
				'type'        => 'textarea',
				'section'     => 'other_section',
				'settings'    => 'remove_menu_setting',
				'label'       => __( 'Remove Menu', EHD_PLUGIN_TEXT_DOMAIN ),
				'description' => __( 'The menu list will be hidden', EHD_PLUGIN_TEXT_DOMAIN ),
			]
		);
	}
}
