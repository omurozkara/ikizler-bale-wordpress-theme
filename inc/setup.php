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
		add_theme_support( 'post-thumbnails' );
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
	 * Register server-rendered blocks for theme-driven UI.
	 */
	function ikizler_bale_register_dynamic_blocks() {
		$blocks = array(
			'ikizler-bale/contact-info'   => 'ikizler_bale_render_contact_info_block',
			'ikizler-bale/footer-meta'    => 'ikizler_bale_render_footer_meta_block',
			'ikizler-bale/footer-text'    => 'ikizler_bale_render_footer_text_block',
			'ikizler-bale/footer-social'  => 'ikizler_bale_render_footer_social_block',
			'ikizler-bale/topbar-text'    => 'ikizler_bale_render_topbar_text_block',
			'ikizler-bale/header-actions' => 'ikizler_bale_render_header_actions_block',
			'ikizler-bale/brand-lockup'   => 'ikizler_bale_render_brand_lockup_block',
		);

		foreach ( $blocks as $block_name => $callback ) {
			register_block_type(
				$block_name,
				array(
					'render_callback' => $callback,
				)
			);
		}
	}
}
add_action( 'init', 'ikizler_bale_register_dynamic_blocks' );

if ( ! function_exists( 'ikizler_bale_flush_rewrite_on_switch' ) ) {
	/**
	 * Reduce first-run rewrite issues after theme switch.
	 */
	function ikizler_bale_flush_rewrite_on_switch() {
		if ( function_exists( 'ikizler_bale_register_post_types' ) ) {
			ikizler_bale_register_post_types();
		}

		flush_rewrite_rules();
	}
}
add_action( 'after_switch_theme', 'ikizler_bale_flush_rewrite_on_switch' );

if ( ! function_exists( 'ikizler_bale_change_title_placeholders' ) ) {
	/**
	 * Add clearer title placeholders for content managers.
	 *
	 * @param string  $title Default title.
	 * @param WP_Post $post Current post.
	 * @return string
	 */
	function ikizler_bale_change_title_placeholders( $title, $post ) {
		$placeholders = array(
			'egitmen'      => 'Egitmen adini yazin',
			'egitim'       => 'Egitim/program adini yazin',
			'yas_grubu'    => 'Yas grubu basligini yazin',
			'etkinlik'     => 'Etkinlik adini yazin',
			'galeri_ogesi' => 'Galeri ogesi basligini yazin',
			'sss'          => 'SSS sorusunu yazin',
			'referans'     => 'Referans sahibinin adini yazin',
		);

		if ( isset( $placeholders[ $post->post_type ] ) ) {
			return $placeholders[ $post->post_type ];
		}

		return $title;
	}
}
add_filter( 'enter_title_here', 'ikizler_bale_change_title_placeholders', 10, 2 );
