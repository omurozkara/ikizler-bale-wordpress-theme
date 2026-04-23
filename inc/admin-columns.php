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
			add_filter( "manage_edit-{$post_type}_sortable_columns", 'ikizler_bale_sortable_columns' );
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
		return array(
			'cb'             => $columns['cb'],
			'title'          => 'Baslik',
			'featured_image' => 'Gorsel',
			'detail'         => 'Detay',
			'menu_order'     => 'Sira',
			'date'           => 'Tarih',
		);
	}
}

if ( ! function_exists( 'ikizler_bale_sortable_columns' ) ) {
	/**
	 * Make useful columns sortable.
	 *
	 * @param array<string, string> $columns Sortable columns.
	 * @return array<string, string>
	 */
	function ikizler_bale_sortable_columns( $columns ) {
		$columns['menu_order'] = 'menu_order';

		return $columns;
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
				echo '-';
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
				echo $value ? esc_html( is_string( $value ) ? $value : wp_json_encode( $value ) ) : '-';
			}
		}
	}
}

if ( ! function_exists( 'ikizler_bale_admin_orderby' ) ) {
	/**
	 * Allow sorting by menu order on CPT lists.
	 *
	 * @param WP_Query $query Query object.
	 */
	function ikizler_bale_admin_orderby( $query ) {
		if ( ! is_admin() || ! $query->is_main_query() ) {
			return;
		}

		if ( 'menu_order' === $query->get( 'orderby' ) ) {
			$query->set( 'orderby', 'menu_order title' );
			$query->set( 'order', 'ASC' );
		}
	}
}
add_action( 'pre_get_posts', 'ikizler_bale_admin_orderby' );
