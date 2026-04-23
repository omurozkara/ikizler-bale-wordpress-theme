<?php
/**
 * Theme settings page.
 *
 * @package IkizlerBale
 */

if ( ! function_exists( 'ikizler_bale_add_theme_settings_page' ) ) {
	/**
	 * Add settings page under appearance.
	 */
	function ikizler_bale_add_theme_settings_page() {
		add_theme_page(
			'Tema Ayarlari',
			'Tema Ayarlari',
			'manage_options',
			'ikizler-bale-theme-settings',
			'ikizler_bale_render_theme_settings_page'
		);
	}
}
add_action( 'admin_menu', 'ikizler_bale_add_theme_settings_page' );

if ( ! function_exists( 'ikizler_bale_register_theme_settings' ) ) {
	/**
	 * Register settings and sections.
	 */
	function ikizler_bale_register_theme_settings() {
		register_setting(
			'ikizler_bale_theme_settings_group',
			'ikizler_bale_theme_settings',
			array(
				'sanitize_callback' => 'ikizler_bale_sanitize_theme_settings',
				'default'           => array(),
			)
		);

		add_settings_section(
			'ikizler_bale_contact_section',
			'Iletisim Bilgileri',
			'__return_false',
			'ikizler-bale-theme-settings'
		);

		add_settings_section(
			'ikizler_bale_social_section',
			'Sosyal Medya',
			'__return_false',
			'ikizler-bale-theme-settings'
		);

		add_settings_section(
			'ikizler_bale_footer_section',
			'Footer Alanlari',
			'__return_false',
			'ikizler-bale-theme-settings'
		);

		add_settings_section(
			'ikizler_bale_brand_section',
			'Ek Kurumsal Metinler',
			'__return_false',
			'ikizler-bale-theme-settings'
		);

		$fields = array(
			'phone'            => array( 'Telefon', 'text', 'ikizler_bale_contact_section', 'Ornek: +90 5xx xxx xx xx' ),
			'email'            => array( 'E-posta', 'email', 'ikizler_bale_contact_section', 'Kurumsal iletisim adresi' ),
			'whatsapp_url'     => array( 'WhatsApp Linki', 'url', 'ikizler_bale_contact_section', 'https://wa.me/...' ),
			'address'          => array( 'Adres', 'textarea', 'ikizler_bale_contact_section', 'Sube veya akademi adresi' ),
			'maps_url'         => array( 'Google Maps Linki', 'url', 'ikizler_bale_contact_section', 'Konum veya harita linki' ),
			'instagram_url'    => array( 'Instagram', 'url', 'ikizler_bale_social_section', 'Instagram profil linki' ),
			'facebook_url'     => array( 'Facebook', 'url', 'ikizler_bale_social_section', 'Facebook sayfa linki' ),
			'youtube_url'      => array( 'YouTube', 'url', 'ikizler_bale_social_section', 'YouTube kanal linki' ),
			'footer_text'      => array( 'Footer Kisa Metni', 'textarea', 'ikizler_bale_footer_section', 'Alt alanda markayi anlatan kisa metin' ),
			'footer_copyright' => array( 'Footer Telif Metni', 'text', 'ikizler_bale_footer_section', 'Ornek: (c) 2026 Ozel Ikizler Bale Akademi' ),
			'footer_note'      => array( 'Footer Alt Notu', 'text', 'ikizler_bale_footer_section', 'Kisa teknik veya kurumsal not' ),
			'topbar_text'      => array( 'Ust Bilgi Metni', 'text', 'ikizler_bale_brand_section', 'Header ust satirinda gorunen kisa kurumsal metin' ),
		);

		foreach ( $fields as $key => $field ) {
			add_settings_field(
				$key,
				$field[0],
				'ikizler_bale_render_settings_field',
				'ikizler-bale-theme-settings',
				$field[2],
				array(
					'key'         => $key,
					'type'        => $field[1],
					'description' => $field[3],
				)
			);
		}
	}
}
add_action( 'admin_init', 'ikizler_bale_register_theme_settings' );

if ( ! function_exists( 'ikizler_bale_sanitize_theme_settings' ) ) {
	/**
	 * Sanitize settings values.
	 *
	 * @param mixed $input Raw input.
	 * @return array<string, string>
	 */
	function ikizler_bale_sanitize_theme_settings( $input ) {
		if ( ! is_array( $input ) ) {
			return array();
		}

		$output = array();

		$text_fields = array(
			'phone',
			'footer_copyright',
			'footer_note',
			'topbar_text',
		);

		$url_fields = array(
			'whatsapp_url',
			'maps_url',
			'instagram_url',
			'facebook_url',
			'youtube_url',
		);

		$textarea_fields = array(
			'address',
			'footer_text',
		);

		foreach ( $text_fields as $field ) {
			$output[ $field ] = isset( $input[ $field ] ) ? sanitize_text_field( wp_unslash( $input[ $field ] ) ) : '';
		}

		foreach ( $url_fields as $field ) {
			$output[ $field ] = isset( $input[ $field ] ) ? esc_url_raw( wp_unslash( $input[ $field ] ) ) : '';
		}

		foreach ( $textarea_fields as $field ) {
			$output[ $field ] = isset( $input[ $field ] ) ? sanitize_textarea_field( wp_unslash( $input[ $field ] ) ) : '';
		}

		$output['email'] = isset( $input['email'] ) ? sanitize_email( wp_unslash( $input['email'] ) ) : '';

		return $output;
	}
}

if ( ! function_exists( 'ikizler_bale_render_settings_field' ) ) {
	/**
	 * Render a field.
	 *
	 * @param array<string, string> $args Field args.
	 */
	function ikizler_bale_render_settings_field( $args ) {
		$key         = $args['key'];
		$type        = $args['type'];
		$description = $args['description'];
		$value       = ikizler_bale_get_option( $key );

		if ( 'textarea' === $type ) {
			printf(
				'<textarea class="large-text" rows="4" name="ikizler_bale_theme_settings[%1$s]">%2$s</textarea><p class="description">%3$s</p>',
				esc_attr( $key ),
				esc_textarea( $value ),
				esc_html( $description )
			);
			return;
		}

		printf(
			'<input class="regular-text" type="%1$s" name="ikizler_bale_theme_settings[%2$s]" value="%3$s" /><p class="description">%4$s</p>',
			esc_attr( $type ),
			esc_attr( $key ),
			esc_attr( $value ),
			esc_html( $description )
		);
	}
}

if ( ! function_exists( 'ikizler_bale_render_theme_settings_page' ) ) {
	/**
	 * Render settings page UI.
	 */
	function ikizler_bale_render_theme_settings_page() {
		?>
		<div class="wrap">
			<h1>Tema Ayarlari</h1>
			<p>Bu alan; iletisim bilgileri, sosyal medya ve footer iceriklerini sade bir sekilde yonetmek icin hazirlandi.</p>
			<?php settings_errors(); ?>
			<form action="options.php" method="post">
				<?php
				settings_fields( 'ikizler_bale_theme_settings_group' );
				do_settings_sections( 'ikizler-bale-theme-settings' );
				submit_button( 'Kaydet' );
				?>
			</form>
		</div>
		<?php
	}
}
