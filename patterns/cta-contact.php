<?php
/**
 * Title: Iletisim Cagrisi
 * Slug: ikizler-bale/cta-contact
 * Categories: ikizler-bale
 * Inserter: no
 *
 * @package IkizlerBale
 */

$cta_badge           = ikizler_bale_get_front_page_field( 'cta_ust_etiket', 'Ilk Adim' );
$cta_title           = ikizler_bale_get_front_page_field( 'cta_baslik', 'Deneme dersi ve on kayit surecini zarif, net ve kolay bir deneyime donusturelim.' );
$cta_description     = ikizler_bale_get_front_page_field( 'cta_aciklama', 'Iletisim ve basvuru surecini bu alandan yonlendirebilirsiniz.' );
$cta_primary_label   = ikizler_bale_get_front_page_field( 'cta_birincil_buton_metin', 'Iletisime Gecin' );
$cta_primary_url     = ikizler_bale_get_front_page_field( 'cta_birincil_buton_link', home_url( '/iletisim' ) );
$cta_secondary_label = ikizler_bale_get_front_page_field( 'cta_ikincil_buton_metin', 'Haftalik Programi Inceleyin' );
$cta_secondary_url   = ikizler_bale_get_front_page_field( 'cta_ikincil_buton_link', home_url( '/haftalik-program' ) );
?>
<!-- wp:group {"align":"wide","backgroundColor":"ink","textColor":"white","className":"ikizler-soft-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg"},"margin":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|2xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide ikizler-soft-card has-white-color has-ink-background-color has-text-color has-background" style="margin-top:var(--wp--preset--spacing--xl);margin-bottom:var(--wp--preset--spacing--2xl);padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:paragraph {"className":"ikizler-section-label","textColor":"gold","align":"center"} -->
<p class="ikizler-section-label has-text-align-center has-gold-color has-text-color"><?php echo esc_html( $cta_badge ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","fontSize":"xl"} -->
<h2 class="wp-block-heading has-text-align-center has-xl-font-size"><?php echo esc_html( $cta_title ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"blush","fontSize":"md"} -->
<p class="has-text-align-center has-blush-color has-text-color has-md-font-size"><?php echo esc_html( $cta_description ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"white","textColor":"ink"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-ink-color has-white-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( $cta_primary_url ); ?>"><?php echo esc_html( $cta_primary_label ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline","textColor":"white","borderColor":"white"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-white-color has-text-color has-border-color has-white-border-color wp-element-button" href="<?php echo esc_url( $cta_secondary_url ); ?>"><?php echo esc_html( $cta_secondary_label ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
