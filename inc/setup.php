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
