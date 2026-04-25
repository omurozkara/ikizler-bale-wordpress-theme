<?php
/**
 * Title: Iletisim Cagrisi
 * Slug: ikizler-bale/cta-contact
 * Categories: ikizler-bale
 * Inserter: no
 *
 * @package IkizlerBale
 */

$cta_badge           = ikizler_bale_get_front_page_field( 'cta_ust_etiket', 'Bilgi ve Basvuru' );
$cta_title           = ikizler_bale_get_front_page_field( 'cta_baslik', 'Deneme dersi, program secimi ve iletisim surecini tek noktadan hizlica yonetelim.' );
$cta_description     = ikizler_bale_get_front_page_field( 'cta_aciklama', 'Bilgi alin, uygun programi inceleyin ya da deneme dersi icin dogrudan aksiyona gecin.' );
$cta_primary_label   = ikizler_bale_get_front_page_field( 'cta_birincil_buton_metin', 'Iletisime Gecin' );
$cta_primary_url     = ikizler_bale_get_contact_url( (string) ikizler_bale_get_front_page_field( 'cta_birincil_buton_link', '' ) );
$cta_secondary_label = ikizler_bale_get_front_page_field( 'cta_ikincil_buton_metin', 'Haftalik Programi Inceleyin' );
$cta_secondary_url   = ikizler_bale_get_schedule_url( (string) ikizler_bale_get_front_page_field( 'cta_ikincil_buton_link', '' ) );
?>
<!-- wp:group {"align":"wide","className":"ikizler-soft-card ikizler-cta-shell","backgroundColor":"night","textColor":"white","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|xl"},"margin":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|2xl"}},"shadow":"var:preset|shadow|dramatic"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide ikizler-soft-card ikizler-cta-shell has-white-color has-night-background-color has-text-color has-background" style="margin-top:var(--wp--preset--spacing--xl);margin-bottom:var(--wp--preset--spacing--2xl);padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--xl)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|lg"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"56%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:56%"><!-- wp:paragraph {"className":"ikizler-section-label","textColor":"champagne"} -->
<p class="ikizler-section-label has-champagne-color has-text-color"><?php echo esc_html( $cta_badge ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"fontSize":"xl"} -->
<h2 class="wp-block-heading has-xl-font-size"><?php echo esc_html( $cta_title ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"lilac","fontSize":"sm"} -->
<p class="has-lilac-color has-text-color has-sm-font-size">Program secimini netlestirmek, uygun ders saatini ogrenmek ve kayit surecini baslatmak icin bu final alan daha net ve daha yonlendirici bir sekilde calisir.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"44%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:44%"><!-- wp:group {"backgroundColor":"white","className":"ikizler-grid-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","right":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md"}}},"textColor":"ink","layout":{"type":"constrained"}} -->
<div class="wp-block-group ikizler-grid-card has-white-background-color has-ink-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)"><!-- wp:paragraph {"fontSize":"md"} -->
<p class="has-md-font-size"><?php echo esc_html( $cta_description ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"plum","textColor":"white"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-plum-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( $cta_primary_url ); ?>"><?php echo esc_html( $cta_primary_label ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline","textColor":"ink","borderColor":"plum"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-ink-color has-text-color has-border-color has-plum-border-color wp-element-button" href="<?php echo esc_url( $cta_secondary_url ); ?>"><?php echo esc_html( $cta_secondary_label ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
