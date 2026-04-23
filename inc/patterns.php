<?php
/**
 * Pattern registration.
 *
 * @package IkizlerBale
 */

if ( ! function_exists( 'ikizler_bale_register_pattern_category' ) ) {
	/**
	 * Register custom pattern category.
	 */
	function ikizler_bale_register_pattern_category() {
		register_block_pattern_category(
			'ikizler-bale',
			array(
				'label' => __( 'Ikizler Bale', 'ikizler-bale' ),
			)
		);
	}
}
add_action( 'init', 'ikizler_bale_register_pattern_category' );
