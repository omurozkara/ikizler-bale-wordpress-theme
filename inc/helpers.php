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

if ( ! function_exists( 'ikizler_bale_get_phone_href' ) ) {
	/**
	 * Normalize phone number for tel links.
	 *
	 * @param string $phone Raw phone text.
	 * @return string
	 */
	function ikizler_bale_get_phone_href( $phone ) {
		$normalized = preg_replace( '/[^0-9+]/', '', $phone );

		return $normalized ? 'tel:' . $normalized : '';
	}
}

if ( ! function_exists( 'ikizler_bale_get_brand_name' ) ) {
	/**
	 * Return a safe brand name instead of weak WordPress defaults.
	 *
	 * @return string
	 */
	function ikizler_bale_get_brand_name() {
		$name = trim( wp_specialchars_decode( get_bloginfo( 'name' ), ENT_QUOTES ) );

		if ( '' === $name || in_array( strtolower( $name ), array( 'my blog', 'site title', 'wordpress', 'just another wordpress site' ), true ) ) {
			return 'Ozel Ikizler Bale Akademi';
		}

		return $name;
	}
}

if ( ! function_exists( 'ikizler_bale_get_brand_tagline' ) ) {
	/**
	 * Return a refined fallback tagline.
	 *
	 * @return string
	 */
	function ikizler_bale_get_brand_tagline() {
		$tagline = trim( wp_specialchars_decode( get_bloginfo( 'description' ), ENT_QUOTES ) );

		if ( '' === $tagline || 'just another wordpress site' === strtolower( $tagline ) ) {
			return 'Premium bale egitiminde zarafet, disiplin ve guven';
		}

		return $tagline;
	}
}

if ( ! function_exists( 'ikizler_bale_find_page_url' ) ) {
	/**
	 * Find the first published page URL by slug candidates.
	 *
	 * @param array<int, string> $slugs Page slugs.
	 * @return string
	 */
	function ikizler_bale_find_page_url( array $slugs ) {
		foreach ( $slugs as $slug ) {
			$page = get_page_by_path( $slug );

			if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
				return (string) get_permalink( $page );
			}
		}

		return '';
	}
}

if ( ! function_exists( 'ikizler_bale_resolve_url' ) ) {
	/**
	 * Resolve a safe URL using sensible priority.
	 *
	 * @param string $preferred_url Admin-provided URL.
	 * @param array  $args Resolution arguments.
	 * @return string
	 */
	function ikizler_bale_resolve_url( $preferred_url = '', array $args = array() ) {
		if ( $preferred_url ) {
			return esc_url_raw( $preferred_url );
		}

		if ( ! empty( $args['page_slugs'] ) ) {
			$page_url = ikizler_bale_find_page_url( (array) $args['page_slugs'] );

			if ( $page_url ) {
				return $page_url;
			}
		}

		if ( ! empty( $args['post_type_archive'] ) && post_type_exists( $args['post_type_archive'] ) ) {
			$archive_url = get_post_type_archive_link( $args['post_type_archive'] );

			if ( $archive_url ) {
				return (string) $archive_url;
			}
		}

		if ( ! empty( $args['theme_option'] ) ) {
			$theme_url = ikizler_bale_get_option( (string) $args['theme_option'] );

			if ( $theme_url ) {
				return $theme_url;
			}
		}

		if ( ! empty( $args['secondary_theme_option'] ) ) {
			$theme_url = ikizler_bale_get_option( (string) $args['secondary_theme_option'] );

			if ( $theme_url ) {
				return $theme_url;
			}
		}

		if ( ! empty( $args['fallback_path'] ) ) {
			return home_url( (string) $args['fallback_path'] );
		}

		return home_url( '/' );
	}
}

if ( ! function_exists( 'ikizler_bale_get_contact_url' ) ) {
	/**
	 * Resolve the best contact destination.
	 *
	 * @param string $preferred_url Preferred custom URL.
	 * @return string
	 */
	function ikizler_bale_get_contact_url( $preferred_url = '' ) {
		return ikizler_bale_resolve_url(
			$preferred_url,
			array(
				'page_slugs'    => array( 'iletisim', 'contact' ),
				'theme_option'  => 'whatsapp_url',
				'fallback_path' => '/',
			)
		);
	}
}

if ( ! function_exists( 'ikizler_bale_get_trial_lesson_url' ) ) {
	/**
	 * Resolve trial lesson CTA.
	 *
	 * @param string $preferred_url Preferred custom URL.
	 * @return string
	 */
	function ikizler_bale_get_trial_lesson_url( $preferred_url = '' ) {
		$url = ikizler_bale_resolve_url(
			$preferred_url,
			array(
				'page_slugs'             => array( 'deneme-dersi-basvuru', 'deneme-dersi', 'on-kayit-basvuru' ),
				'theme_option'           => 'whatsapp_url',
				'secondary_theme_option' => 'maps_url',
			)
		);

		if ( $url && home_url( '/' ) !== $url ) {
			return $url;
		}

		return ikizler_bale_get_contact_url();
	}
}

if ( ! function_exists( 'ikizler_bale_get_programs_url' ) ) {
	/**
	 * Resolve programs URL.
	 *
	 * @param string $preferred_url Preferred custom URL.
	 * @return string
	 */
	function ikizler_bale_get_programs_url( $preferred_url = '' ) {
		$url = ikizler_bale_resolve_url(
			$preferred_url,
			array(
				'page_slugs'        => array( 'egitimler', 'bale-dersleri' ),
				'post_type_archive' => 'egitim',
			)
		);

		if ( $url && home_url( '/' ) !== $url ) {
			return $url;
		}

		return home_url( '/' );
	}
}

if ( ! function_exists( 'ikizler_bale_get_schedule_url' ) ) {
	/**
	 * Resolve weekly schedule URL.
	 *
	 * @param string $preferred_url Preferred custom URL.
	 * @return string
	 */
	function ikizler_bale_get_schedule_url( $preferred_url = '' ) {
		$url = ikizler_bale_resolve_url(
			$preferred_url,
			array(
				'page_slugs' => array( 'haftalik-program', 'program' ),
			)
		);

		if ( $url && home_url( '/' ) !== $url ) {
			return $url;
		}

		return ikizler_bale_get_contact_url();
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

if ( ! function_exists( 'ikizler_bale_get_front_page_image' ) ) {
	/**
	 * Return normalized image data for ACF image fields.
	 *
	 * @param string $field_name Field name.
	 * @param string $fallback_url Fallback image URL.
	 * @param string $fallback_alt Fallback alt text.
	 * @return array<string, string>
	 */
	function ikizler_bale_get_front_page_image( $field_name, $fallback_url, $fallback_alt ) {
		$image = ikizler_bale_get_front_page_field( $field_name, array() );

		return array(
			'url' => is_array( $image ) && ! empty( $image['url'] ) ? (string) $image['url'] : $fallback_url,
			'alt' => is_array( $image ) && ! empty( $image['alt'] ) ? (string) $image['alt'] : $fallback_alt,
		);
	}
}

if ( ! function_exists( 'ikizler_bale_render_brand_lockup_block' ) ) {
	/**
	 * Render a brand-safe logo lockup.
	 *
	 * @return string
	 */
	function ikizler_bale_render_brand_lockup_block() {
		$home_url = home_url( '/' );
		$logo     = has_custom_logo() ? get_custom_logo() : '';
		$name     = ikizler_bale_get_brand_name();
		$tagline  = ikizler_bale_get_brand_tagline();

		ob_start();
		?>
		<div class="wp-block-group ikizler-brand-render">
			<?php if ( $logo ) : ?>
				<div class="ikizler-brand-render__logo"><?php echo wp_kses_post( $logo ); ?></div>
			<?php endif; ?>
			<div class="ikizler-brand-render__text">
				<a class="ikizler-brand-render__title" href="<?php echo esc_url( $home_url ); ?>"><?php echo esc_html( $name ); ?></a>
				<p class="ikizler-brand-render__tagline"><?php echo esc_html( $tagline ); ?></p>
			</div>
		</div>
		<?php

		return (string) ob_get_clean();
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
		$facebook  = ikizler_bale_get_option( 'facebook_url' );
		$youtube   = ikizler_bale_get_option( 'youtube_url' );
		$socials   = array();
		$phone_url = ikizler_bale_get_phone_href( $phone );

		if ( $whatsapp ) {
			$socials[] = sprintf( '<a href="%s">WhatsApp</a>', esc_url( $whatsapp ) );
		}

		if ( $instagram ) {
			$socials[] = sprintf( '<a href="%s">Instagram</a>', esc_url( $instagram ) );
		}

		if ( $facebook ) {
			$socials[] = sprintf( '<a href="%s">Facebook</a>', esc_url( $facebook ) );
		}

		if ( $youtube ) {
			$socials[] = sprintf( '<a href="%s">YouTube</a>', esc_url( $youtube ) );
		}

		ob_start();
		?>
		<div class="wp-block-group ikizler-footer-contact">
			<p class="has-blush-color has-text-color has-sm-font-size"><strong>Telefon:</strong> <?php if ( $phone_url ) : ?><a href="<?php echo esc_url( $phone_url ); ?>"><?php echo esc_html( $phone ); ?></a><?php else : ?><?php echo esc_html( $phone ); ?><?php endif; ?></p>
			<p class="has-blush-color has-text-color has-sm-font-size"><strong>E-posta:</strong> <a href="mailto:<?php echo esc_attr( antispambot( $email ) ); ?>"><?php echo esc_html( antispambot( $email ) ); ?></a></p>
			<p class="has-blush-color has-text-color has-sm-font-size"><strong>Adres:</strong> <?php echo esc_html( $address ); ?></p>
			<?php if ( $maps_url ) : ?>
				<p class="has-blush-color has-text-color has-sm-font-size"><a href="<?php echo esc_url( $maps_url ); ?>">Haritada Goruntule</a></p>
			<?php endif; ?>
			<?php if ( ! empty( $socials ) ) : ?>
				<p class="has-blush-color has-text-color has-sm-font-size"><?php echo wp_kses_post( implode( ' | ', $socials ) ); ?></p>
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
			'<div class="wp-block-group ikizler-footer-meta"><p class="has-blush-color has-text-color has-xs-font-size">%1$s</p><p class="has-blush-color has-text-color has-xs-font-size">%2$s</p></div>',
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

if ( ! function_exists( 'ikizler_bale_render_topbar_text_block' ) ) {
	/**
	 * Render topbar text.
	 *
	 * @return string
	 */
	function ikizler_bale_render_topbar_text_block() {
		$text = ikizler_bale_get_option( 'topbar_text', 'Cocuk, genc ve yetiskin ogrenciler icin premium bale egitimi' );

		return sprintf(
			'<p class="has-mauve-color has-text-color has-xs-font-size">%s</p>',
			esc_html( $text )
		);
	}
}

if ( ! function_exists( 'ikizler_bale_render_header_actions_block' ) ) {
	/**
	 * Render header action buttons with safe links.
	 *
	 * @return string
	 */
	function ikizler_bale_render_header_actions_block() {
		$contact_url = ikizler_bale_get_contact_url();
		$trial_url   = ikizler_bale_get_trial_lesson_url();

		return sprintf(
			'<div class="wp-block-buttons ikizler-header-actions"><div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-ink-color has-text-color has-border-color has-mist-border-color wp-element-button" href="%1$s">Iletisim</a></div><div class="wp-block-button"><a class="wp-block-button__link has-white-color has-plum-background-color has-text-color has-background wp-element-button" href="%2$s">Deneme Dersi</a></div></div>',
			esc_url( $contact_url ),
			esc_url( $trial_url )
		);
	}
}
