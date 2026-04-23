<?php
/**
 * Admin list columns.
 *
 * @package IkizlerBale
 */

if ( ! function_exists( 'ikizler_bale_register_admin_columns' ) ) {
	/**
	 * Hook column filters.
	 */
	function ikizler_bale_register_admin_columns() {
		$post_types = array( 'egitmen', 'egitim', 'yas_grubu', 'etkinlik', 'galeri_ogesi', 'sss', 'referans' );

		foreach ( $post_types as $post_type ) {
			add_filter( "manage_{$post_type}_posts_columns", 'ikizler_bale_filter_columns' );
			add_action( "manage_{$post_type}_posts_custom_column", 'ikizler_bale_render_columns', 10, 2 );
		}
	}
}
add_action( 'admin_init', 'ikizler_bale_register_admin_columns' );

if ( ! function_exists( 'ikizler_bale_filter_columns' ) ) {
	/**
	 * Add simple helpful columns.
	 *
	 * @param array<string, string> $columns Default columns.
	 * @return array<string, string>
	 */
	function ikizler_bale_filter_columns( $columns ) {
		$new_columns = array(
			'cb'             => $columns['cb'],
			'title'          => 'Baslik',
			'featured_image' => 'Gorsel',
			'detail'         => 'Detay',
			'menu_order'     => 'Sira',
			'date'           => 'Tarih',
		);

		return $new_columns;
	}
}

if ( ! function_exists( 'ikizler_bale_render_columns' ) ) {
	/**
	 * Render column values.
	 *
	 * @param string $column Column key.
	 * @param int    $post_id Post id.
	 */
	function ikizler_bale_render_columns( $column, $post_id ) {
		if ( 'featured_image' === $column ) {
			if ( has_post_thumbnail( $post_id ) ) {
				echo get_the_post_thumbnail( $post_id, array( 56, 56 ) );
			} else {
				echo '—';
			}
		}

		if ( 'menu_order' === $column ) {
			echo (int) get_post_field( 'menu_order', $post_id );
		}

		if ( 'detail' === $column ) {
			$post_type = get_post_type( $post_id );

			if ( ! function_exists( 'get_field' ) ) {
				echo 'ACF gerekli';
				return;
			}

			$map = array(
				'egitmen'      => 'unvan',
				'egitim'       => 'seviye',
				'yas_grubu'    => 'yas_araligi',
				'etkinlik'     => 'etkinlik_tarihi',
				'galeri_ogesi' => 'cekim_tarihi',
				'sss'          => 'kategori',
				'referans'     => 'kisi_rolu',
			);

			if ( isset( $map[ $post_type ] ) ) {
				$value = get_field( $map[ $post_type ], $post_id );
				echo $value ? esc_html( is_string( $value ) ? $value : wp_json_encode( $value ) ) : '—';
			}
		}
	}
}
