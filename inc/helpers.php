<?php
/**
 * Theme helper functions.
 *
 * @package IkizlerBale
 */

if ( ! function_exists( 'ikizler_bale_get_theme_settings' ) ) {
	/**
	 * Return sanitized theme settings array.
	 *
	 * @return array<string, string>
	 */
	function ikizler_bale_get_theme_settings() {
		$settings = get_option( 'ikizler_bale_theme_settings', array() );

		return is_array( $settings ) ? $settings : array();
	}
}

if ( ! function_exists( 'ikizler_bale_get_option' ) ) {
	/**
	 * Read a single theme option.
	 *
	 * @param string $key Option key.
	 * @param string $default Default value.
	 * @return string
	 */
	function ikizler_bale_get_option( $key, $default = '' ) {
		$settings = ikizler_bale_get_theme_settings();

		if ( isset( $settings[ $key ] ) && '' !== $settings[ $key ] ) {
			return (string) $settings[ $key ];
		}

		return $default;
	}
}

if ( ! function_exists( 'ikizler_bale_get_front_page_field' ) ) {
	/**
	 * Read an ACF field from the selected front page.
	 *
	 * @param string $field_name Field key.
	 * @param mixed  $default Default value.
	 * @return mixed
	 */
	function ikizler_bale_get_front_page_field( $field_name, $default = '' ) {
		$front_page_id = (int) get_option( 'page_on_front' );

		if ( ! $front_page_id || ! function_exists( 'get_field' ) ) {
			return $default;
		}

		$value = get_field( $field_name, $front_page_id );

		if ( null === $value || '' === $value ) {
			return $default;
		}

		return $value;
	}
}

if ( ! function_exists( 'ikizler_bale_render_contact_info_block' ) ) {
	/**
	 * Render footer contact info block.
	 *
	 * @return string
	 */
	function ikizler_bale_render_contact_info_block() {
		$phone     = ikizler_bale_get_option( 'phone', '+90 (5__) ___ __ __' );
		$email     = ikizler_bale_get_option( 'email', 'info@ozelikizlerbalekursu.com' );
		$address   = ikizler_bale_get_option( 'address', 'Adres bilgisi Faz 3 ayarlarindan guncellenebilir.' );
		$maps_url  = ikizler_bale_get_option( 'maps_url' );
		$whatsapp  = ikizler_bale_get_option( 'whatsapp_url' );
		$instagram = ikizler_bale_get_option( 'instagram_url' );

		ob_start();
		?>
		<div class="wp-block-group">
			<p class="has-blush-color has-text-color has-sm-font-size"><strong>Telefon:</strong> <?php echo esc_html( $phone ); ?></p>
			<p class="has-blush-color has-text-color has-sm-font-size"><strong>E-posta:</strong> <a href="mailto:<?php echo esc_attr( antispambot( $email ) ); ?>"><?php echo esc_html( antispambot( $email ) ); ?></a></p>
			<p class="has-blush-color has-text-color has-sm-font-size"><strong>Adres:</strong> <?php echo esc_html( $address ); ?></p>
			<?php if ( $maps_url ) : ?>
				<p class="has-blush-color has-text-color has-sm-font-size"><a href="<?php echo esc_url( $maps_url ); ?>">Haritada Goruntule</a></p>
			<?php endif; ?>
			<?php if ( $whatsapp || $instagram ) : ?>
				<p class="has-blush-color has-text-color has-sm-font-size">
					<?php if ( $whatsapp ) : ?>
						<a href="<?php echo esc_url( $whatsapp ); ?>">WhatsApp</a>
					<?php endif; ?>
					<?php if ( $whatsapp && $instagram ) : ?>
						<span> | </span>
					<?php endif; ?>
					<?php if ( $instagram ) : ?>
						<a href="<?php echo esc_url( $instagram ); ?>">Instagram</a>
					<?php endif; ?>
				</p>
			<?php endif; ?>
		</div>
		<?php

		return (string) ob_get_clean();
	}
}

if ( ! function_exists( 'ikizler_bale_render_footer_meta_block' ) ) {
	/**
	 * Render footer bottom note.
	 *
	 * @return string
	 */
	function ikizler_bale_render_footer_meta_block() {
		$copyright = ikizler_bale_get_option( 'footer_copyright', '(c) 2026 Ozel Ikizler Bale Akademi' );
		$note      = ikizler_bale_get_option( 'footer_note', 'Block theme altyapisi ile hazirlandi.' );

		return sprintf(
			'<div class="wp-block-group"><p class="has-blush-color has-text-color has-xs-font-size">%1$s</p><p class="has-blush-color has-text-color has-xs-font-size">%2$s</p></div>',
			esc_html( $copyright ),
			esc_html( $note )
		);
	}
}

if ( ! function_exists( 'ikizler_bale_render_footer_text_block' ) ) {
	/**
	 * Render footer description text.
	 *
	 * @return string
	 */
	function ikizler_bale_render_footer_text_block() {
		$text = ikizler_bale_get_option( 'footer_text', 'Zarif, guven veren ve sanat odakli bale egitimini kurumsal bir deneyimle bulusturan premium tema altyapisi.' );

		return sprintf(
			'<p class="has-blush-color has-text-color has-sm-font-size">%s</p>',
			esc_html( $text )
		);
	}
}
