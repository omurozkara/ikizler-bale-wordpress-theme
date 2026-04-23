<?php
/**
 * Theme setup helpers.
 *
 * @package IkizlerBale
 */

if ( ! function_exists( 'ikizler_bale_setup' ) ) {
	/**
	 * Register theme supports and editor styles.
	 */
	function ikizler_bale_setup() {
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/css/editor.css' );
		add_post_type_support( 'page', 'excerpt' );
	}
}
add_action( 'after_setup_theme', 'ikizler_bale_setup' );

if ( ! function_exists( 'ikizler_bale_enqueue_assets' ) ) {
	/**
	 * Enqueue theme stylesheet.
	 */
	function ikizler_bale_enqueue_assets() {
		$theme = wp_get_theme();

		wp_enqueue_style(
			'ikizler-bale-style',
			get_stylesheet_uri(),
			array(),
			$theme->get( 'Version' )
		);
	}
}
add_action( 'wp_enqueue_scripts', 'ikizler_bale_enqueue_assets' );

if ( ! function_exists( 'ikizler_bale_register_dynamic_blocks' ) ) {
	/**
	 * Register simple server-rendered blocks for site settings output.
	 */
	function ikizler_bale_register_dynamic_blocks() {
		register_block_type(
			'ikizler-bale/contact-info',
			array(
				'render_callback' => 'ikizler_bale_render_contact_info_block',
			)
		);

		register_block_type(
			'ikizler-bale/footer-meta',
			array(
				'render_callback' => 'ikizler_bale_render_footer_meta_block',
			)
		);

		register_block_type(
			'ikizler-bale/footer-text',
			array(
				'render_callback' => 'ikizler_bale_render_footer_text_block',
			)
		);
	}
}
add_action( 'init', 'ikizler_bale_register_dynamic_blocks' );
