<?php
/**
 * ACF local field groups.
 *
 * @package IkizlerBale
 */

if ( ! function_exists( 'ikizler_bale_register_acf_fields' ) ) {
	/**
	 * Register ACF groups if ACF Free is active.
	 */
	function ikizler_bale_register_acf_fields() {
		if ( ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}

		acf_add_local_field_group(
			array(
				'key'    => 'group_ikizler_homepage_fields',
				'title'  => 'Ana Sayfa Icerik Alanlari',
				'fields' => array(
					array(
						'key'           => 'field_ikizler_home_badge',
						'label'         => 'Hero Ust Etiket',
						'name'          => 'hero_ust_etiket',
						'type'          => 'text',
						'instructions'  => 'Ornek: Ozel Ikizler Bale Akademi',
						'default_value' => 'Ozel Ikizler Bale Akademi',
					),
					array(
						'key'           => 'field_ikizler_home_title',
						'label'         => 'Hero Baslik',
						'name'          => 'hero_baslik',
						'type'          => 'textarea',
						'rows'          => 3,
						'instructions'  => 'Ana sayfada buyuk baslik olarak gorunur.',
						'default_value' => 'Sanatin zarafetini guvenli ve premium bir egitim deneyimiyle bulusturun.',
					),
					array(
						'key'           => 'field_ikizler_home_desc',
						'label'         => 'Hero Aciklama',
						'name'          => 'hero_aciklama',
						'type'          => 'textarea',
						'rows'          => 4,
						'default_value' => 'Cocuklar, gencler ve yetiskinler icin estetik, disiplinli ve ilham veren bale programlari.',
					),
					array(
						'key'           => 'field_ikizler_home_primary_label',
						'label'         => 'Birincil Buton Metni',
						'name'          => 'hero_birincil_buton_metin',
						'type'          => 'text',
						'default_value' => 'Deneme Dersi Basvurusu',
					),
					array(
						'key'           => 'field_ikizler_home_primary_url',
						'label'         => 'Birincil Buton Linki',
						'name'          => 'hero_birincil_buton_link',
						'type'          => 'url',
						'default_value' => home_url( '/deneme-dersi-basvuru' ),
					),
					array(
						'key'           => 'field_ikizler_home_secondary_label',
						'label'         => 'Ikincil Buton Metni',
						'name'          => 'hero_ikincil_buton_metin',
						'type'          => 'text',
						'default_value' => 'Programlari Incele',
					),
					array(
						'key'           => 'field_ikizler_home_secondary_url',
						'label'         => 'Ikincil Buton Linki',
						'name'          => 'hero_ikincil_buton_link',
						'type'          => 'url',
						'default_value' => home_url( '/egitimler' ),
					),
					array(
						'key'           => 'field_ikizler_home_image',
						'label'         => 'Hero Gorseli',
						'name'          => 'hero_gorseli',
						'type'          => 'image',
						'return_format' => 'array',
						'preview_size'  => 'medium',
						'library'       => 'all',
					),
					array(
						'key'           => 'field_ikizler_home_card_title',
						'label'         => 'Hero Kart Basligi',
						'name'          => 'hero_kart_basligi',
						'type'          => 'text',
						'default_value' => 'Akademi Yaklasimi',
					),
					array(
						'key'           => 'field_ikizler_home_card_desc',
						'label'         => 'Hero Kart Aciklamasi',
						'name'          => 'hero_kart_aciklamasi',
						'type'          => 'textarea',
						'rows'          => 3,
						'default_value' => 'Estetik, disiplin ve bireysel gelisim odakli ders tasarimi.',
					),
					array(
						'key'           => 'field_ikizler_home_card_year',
						'label'         => 'Hero Kart Vurgu Metni',
						'name'          => 'hero_kart_vurgu',
						'type'          => 'text',
						'default_value' => "2010'dan beri",
					),
					array(
						'key'           => 'field_ikizler_home_cta_badge',
						'label'         => 'Alt CTA Ust Etiket',
						'name'          => 'cta_ust_etiket',
						'type'          => 'text',
						'default_value' => 'Ilk Adim',
					),
					array(
						'key'           => 'field_ikizler_home_cta_title',
						'label'         => 'Alt CTA Baslik',
						'name'          => 'cta_baslik',
						'type'          => 'textarea',
						'rows'          => 3,
						'default_value' => 'Deneme dersi ve on kayit surecini zarif, net ve kolay bir deneyime donusturelim.',
					),
					array(
						'key'           => 'field_ikizler_home_cta_desc',
						'label'         => 'Alt CTA Aciklama',
						'name'          => 'cta_aciklama',
						'type'          => 'textarea',
						'rows'          => 3,
						'default_value' => 'Iletisim ve basvuru surecini bu alandan yonlendirebilirsiniz.',
					),
					array(
						'key'           => 'field_ikizler_home_cta_primary_label',
						'label'         => 'Alt CTA Birincil Buton',
						'name'          => 'cta_birincil_buton_metin',
						'type'          => 'text',
						'default_value' => 'Iletisime Gecin',
					),
					array(
						'key'           => 'field_ikizler_home_cta_primary_url',
						'label'         => 'Alt CTA Birincil Link',
						'name'          => 'cta_birincil_buton_link',
						'type'          => 'url',
						'default_value' => home_url( '/iletisim' ),
					),
					array(
						'key'           => 'field_ikizler_home_cta_secondary_label',
						'label'         => 'Alt CTA Ikincil Buton',
						'name'          => 'cta_ikincil_buton_metin',
						'type'          => 'text',
						'default_value' => 'Haftalik Programi Inceleyin',
					),
					array(
						'key'           => 'field_ikizler_home_cta_secondary_url',
						'label'         => 'Alt CTA Ikincil Link',
						'name'          => 'cta_ikincil_buton_link',
						'type'          => 'url',
						'default_value' => home_url( '/haftalik-program' ),
					),
				),
				'location' => array(
					array(
						array(
							'param'    => 'page_type',
							'operator' => '==',
							'value'    => 'front_page',
						),
					),
				),
			)
		);

		$field_groups = array(
			'egitmen'      => array(
				'title'  => 'Egitmen Detaylari',
				'fields' => array(
					array( 'Unvan', 'unvan', 'text', 'Ornek: Kurucu Egitmen' ),
					array( 'Kisa Tanitim', 'kisa_tanitim', 'textarea', 'Listeleme ekranlari icin ozet metin' ),
					array( 'Uzmanlik Alanlari', 'uzmanlik_alanlari', 'text', 'Virgulle ayirabilirsiniz' ),
					array( 'Deneyim Yili', 'deneyim_yili', 'number', 'Ornek: 12' ),
					array( 'Siralama', 'siralama', 'number', 'Kucuk sayi once gelir' ),
				),
			),
			'egitim'       => array(
				'title'  => 'Egitim Detaylari',
				'fields' => array(
					array( 'Yas Araligi', 'yas_araligi', 'text', 'Ornek: 7-12 yas' ),
					array( 'Seviye', 'seviye', 'select', 'Program seviyesi', array( 'choices' => array( 'Baslangic' => 'Baslangic', 'Orta' => 'Orta', 'Ileri' => 'Ileri', 'Tum Seviyeler' => 'Tum Seviyeler' ) ) ),
					array( 'Ders Suresi', 'ders_suresi', 'text', 'Ornek: 60 dakika' ),
					array( 'Haftalik Siklik', 'haftalik_siklik', 'text', 'Ornek: Haftada 2 gun' ),
					array( 'One Cikan Program', 'one_cikan_program', 'true_false', 'Ana sayfa icin secilebilir.', array( 'ui' => 1 ) ),
				),
			),
			'yas_grubu'    => array(
				'title'  => 'Yas Grubu Detaylari',
				'fields' => array(
					array( 'Yas Araligi', 'yas_araligi', 'text', 'Ornek: 4-6 yas' ),
					array( 'Kisa Aciklama', 'kisa_aciklama', 'textarea', 'Kart ve ozet alanlari icin' ),
					array( 'Uygun Program Notu', 'uygun_program_notu', 'text', 'Ornek: Temel bale baslangici' ),
					array( 'Siralama', 'siralama', 'number', 'Kucuk sayi once gelir' ),
				),
			),
			'etkinlik'     => array(
				'title'  => 'Etkinlik Detaylari',
				'fields' => array(
					array( 'Etkinlik Tarihi', 'etkinlik_tarihi', 'date_picker', 'Etkinlik gununu secin', array( 'display_format' => 'd/m/Y', 'return_format' => 'Y-m-d' ) ),
					array( 'Saat', 'saat', 'text', 'Ornek: 19:30' ),
					array( 'Konum', 'konum', 'text', 'Etkinlik mekani' ),
					array( 'Detay Linki', 'detay_linki', 'url', 'Bilet veya detay sayfasi linki' ),
					array( 'One Cikan Etkinlik', 'one_cikan_etkinlik', 'true_false', 'Listelemelerde one cikar.', array( 'ui' => 1 ) ),
				),
			),
			'galeri_ogesi' => array(
				'title'  => 'Galeri Detaylari',
				'fields' => array(
					array( 'Galeri Gorseli', 'galeri_gorseli', 'image', 'Bu ogeye ait ana gorsel', array( 'return_format' => 'array', 'preview_size' => 'medium' ) ),
					array( 'Video Linki', 'video_linki', 'url', 'Varsa YouTube veya Vimeo linki' ),
					array( 'Kisa Aciklama', 'kisa_aciklama', 'textarea', 'Gorsel altinda kullanilabilir' ),
					array( 'Cekim Tarihi', 'cekim_tarihi', 'date_picker', 'Varsa cekim tarihi', array( 'display_format' => 'd/m/Y', 'return_format' => 'Y-m-d' ) ),
				),
			),
			'sss'          => array(
				'title'  => 'SSS Detaylari',
				'fields' => array(
					array( 'Kategori', 'kategori', 'text', 'Ornek: Kayit Sureci' ),
					array( 'Siralama', 'siralama', 'number', 'Kucuk sayi once gelir' ),
				),
			),
			'referans'     => array(
				'title'  => 'Referans Detaylari',
				'fields' => array(
					array( 'Kisi Rolu', 'kisi_rolu', 'text', 'Ornek: Veli / Ogrenci' ),
					array( 'Puan', 'puan', 'select', '1-5 arasi puan', array( 'choices' => array( '5' => '5', '4' => '4', '3' => '3', '2' => '2', '1' => '1' ) ) ),
					array( 'One Cikan Referans', 'one_cikan_referans', 'true_false', 'Ana sayfada gosterilebilir.', array( 'ui' => 1 ) ),
				),
			),
		);

		foreach ( $field_groups as $post_type => $group ) {
			$fields = array();

			foreach ( $group['fields'] as $index => $field ) {
				$extra = isset( $field[4] ) ? $field[4] : array();

				$fields[] = array_merge(
					array(
						'key'          => 'field_' . $post_type . '_' . $index,
						'label'        => $field[0],
						'name'         => $field[1],
						'type'         => $field[2],
						'instructions' => $field[3],
					),
					$extra
				);
			}

			acf_add_local_field_group(
				array(
					'key'      => 'group_' . $post_type . '_fields',
					'title'    => $group['title'],
					'fields'   => $fields,
					'location' => array(
						array(
							array(
								'param'    => 'post_type',
								'operator' => '==',
								'value'    => $post_type,
							),
						),
					),
				)
			);
		}
	}
}
add_action( 'acf/init', 'ikizler_bale_register_acf_fields' );

if ( ! function_exists( 'ikizler_bale_acf_missing_notice' ) ) {
	/**
	 * Show admin notice when ACF is missing.
	 */
	function ikizler_bale_acf_missing_notice() {
		if ( current_user_can( 'activate_plugins' ) && ! function_exists( 'acf_add_local_field_group' ) ) {
			echo '<div class="notice notice-warning"><p>Ikizler Bale temasi, alan gruplari icin Advanced Custom Fields Free eklentisini bekliyor.</p></div>';
		}
	}
}
add_action( 'admin_notices', 'ikizler_bale_acf_missing_notice' );
