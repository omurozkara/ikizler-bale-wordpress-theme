<?php
/**
 * Custom post types.
 *
 * @package IkizlerBale
 */

if ( ! function_exists( 'ikizler_bale_register_post_types' ) ) {
	/**
	 * Register all theme CPTs.
	 */
	function ikizler_bale_register_post_types() {
		$post_types = array(
			'egitmen'      => array(
				'name'         => 'Egitmenler',
				'singular'     => 'Egitmen',
				'menu_icon'    => 'dashicons-groups',
				'rewrite_slug' => 'egitmenler',
			),
			'egitim'       => array(
				'name'         => 'Egitimler',
				'singular'     => 'Egitim',
				'menu_icon'    => 'dashicons-welcome-learn-more',
				'rewrite_slug' => 'egitimler',
			),
			'yas_grubu'    => array(
				'name'         => 'Yas Gruplari',
				'singular'     => 'Yas Grubu',
				'menu_icon'    => 'dashicons-universal-access',
				'rewrite_slug' => 'yas-gruplari',
			),
			'etkinlik'     => array(
				'name'         => 'Etkinlikler',
				'singular'     => 'Etkinlik',
				'menu_icon'    => 'dashicons-calendar-alt',
				'rewrite_slug' => 'etkinlikler',
			),
			'galeri_ogesi' => array(
				'name'         => 'Galeri',
				'singular'     => 'Galeri Ogesi',
				'menu_icon'    => 'dashicons-format-gallery',
				'rewrite_slug' => 'galeri',
			),
			'sss'          => array(
				'name'         => 'SSS',
				'singular'     => 'SSS Ogesi',
				'menu_icon'    => 'dashicons-editor-help',
				'rewrite_slug' => 'sss',
			),
			'referans'     => array(
				'name'         => 'Referanslar',
				'singular'     => 'Referans',
				'menu_icon'    => 'dashicons-testimonial',
				'rewrite_slug' => 'referanslar',
			),
		);

		foreach ( $post_types as $post_type => $config ) {
			register_post_type(
				$post_type,
				array(
					'labels'              => array(
						'name'               => $config['name'],
						'singular_name'      => $config['singular'],
						'menu_name'          => $config['name'],
						'add_new'            => 'Yeni Ekle',
						'add_new_item'       => 'Yeni ' . $config['singular'] . ' Ekle',
						'edit_item'          => $config['singular'] . ' Duzenle',
						'new_item'           => 'Yeni ' . $config['singular'],
						'view_item'          => $config['singular'] . ' Goruntule',
						'search_items'       => $config['name'] . ' Ara',
						'not_found'          => 'Kayit bulunamadi.',
						'not_found_in_trash' => 'Cop kutusunda kayit yok.',
					),
					'public'              => true,
					'show_in_rest'        => true,
					'menu_icon'           => $config['menu_icon'],
					'has_archive'         => true,
					'rewrite'             => array(
						'slug' => $config['rewrite_slug'],
					),
					'supports'            => array(
						'title',
						'editor',
						'excerpt',
						'thumbnail',
						'page-attributes',
					),
					'menu_position'       => 21,
					'publicly_queryable'  => true,
					'exclude_from_search' => false,
				)
			);
		}
	}
}
add_action( 'init', 'ikizler_bale_register_post_types' );
