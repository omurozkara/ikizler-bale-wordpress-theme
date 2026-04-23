<?php
/**
 * Title: Ana Sayfa Hero
 * Slug: ikizler-bale/hero-home
 * Categories: ikizler-bale
 * Inserter: no
 *
 * @package IkizlerBale
 */

$hero_badge          = ikizler_bale_get_front_page_field( 'hero_ust_etiket', 'Ozel Ikizler Bale Akademi' );
$hero_title          = ikizler_bale_get_front_page_field( 'hero_baslik', 'Sanatin zarafetini guvenli ve premium bir egitim deneyimiyle bulusturun.' );
$hero_description    = ikizler_bale_get_front_page_field( 'hero_aciklama', 'Cocuklar, gencler ve yetiskinler icin estetik, disiplinli ve ilham veren bale programlari.' );
$primary_label       = ikizler_bale_get_front_page_field( 'hero_birincil_buton_metin', 'Deneme Dersi Basvurusu' );
$primary_url         = ikizler_bale_get_trial_lesson_url( (string) ikizler_bale_get_front_page_field( 'hero_birincil_buton_link', '' ) );
$secondary_label     = ikizler_bale_get_front_page_field( 'hero_ikincil_buton_metin', 'Programlari Incele' );
$secondary_url       = ikizler_bale_get_programs_url( (string) ikizler_bale_get_front_page_field( 'hero_ikincil_buton_link', '' ) );
$hero_card_title     = ikizler_bale_get_front_page_field( 'hero_kart_basligi', 'Akademi Yaklasimi' );
$hero_card_desc      = ikizler_bale_get_front_page_field( 'hero_kart_aciklamasi', 'Estetik, disiplin ve bireysel gelisim odakli ders tasarimi.' );
$hero_card_highlight = ikizler_bale_get_front_page_field( 'hero_kart_vurgu', "2010'dan beri" );
$hero_child_title    = ikizler_bale_get_front_page_field( 'hero_cocuk_baslik', 'Cocuk' );
$hero_child_text     = ikizler_bale_get_front_page_field( 'hero_cocuk_aciklama', 'Temel durus, ritim ve sahne guveni odakli yapilandirilmis programlar.' );
$hero_youth_title    = ikizler_bale_get_front_page_field( 'hero_genclik_baslik', 'Genclik' );
$hero_youth_text     = ikizler_bale_get_front_page_field( 'hero_genclik_aciklama', 'Teknik gelisim, zarafet ve performans disiplinini bir araya getiren egitimler.' );
$hero_adult_title    = ikizler_bale_get_front_page_field( 'hero_yetiskin_baslik', 'Yetiskin' );
$hero_adult_text     = ikizler_bale_get_front_page_field( 'hero_yetiskin_aciklama', 'Baslangic ve ileri seviye katilimcilar icin sakin, destekleyici ders akislari.' );
$hero_image          = ikizler_bale_get_front_page_image( 'hero_gorseli', 'https://images.unsplash.com/photo-1518831959646-742c3a14ebf7?auto=format&fit=crop&w=1400&q=80', 'Bale ogrencisi prova aninda' );
?>
<!-- wp:group {"align":"full","className":"ikizler-hero-shell","gradient":"hero-aura","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|2xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull ikizler-hero-shell has-hero-aura-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--2xl)"><!-- wp:columns {"align":"wide","verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|lg"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"54%","className":"ikizler-hero-copy"} -->
<div class="wp-block-column is-vertically-aligned-center ikizler-hero-copy" style="flex-basis:54%"><!-- wp:paragraph {"className":"ikizler-section-label","textColor":"plum"} -->
<p class="ikizler-section-label has-plum-color has-text-color"><?php echo esc_html( $hero_badge ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"fontSize":"2xl"} -->
<h1 class="wp-block-heading has-2-xl-font-size"><?php echo esc_html( $hero_title ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"md","textColor":"rosewood"} -->
<p class="has-rosewood-color has-text-color has-md-font-size"><?php echo esc_html( $hero_description ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"plum","textColor":"white"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-plum-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline","textColor":"ink","borderColor":"plum"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-ink-color has-text-color has-border-color has-plum-border-color wp-element-button" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:columns {"className":"ikizler-hero-audience","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|sm"}}}} -->
<div class="wp-block-columns ikizler-hero-audience" style="margin-top:var(--wp--preset--spacing--lg)"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"className":"ikizler-section-label","textColor":"plum"} -->
<p class="ikizler-section-label has-plum-color has-text-color"><?php echo esc_html( $hero_child_title ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $hero_child_text ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"className":"ikizler-section-label","textColor":"plum"} -->
<p class="ikizler-section-label has-plum-color has-text-color"><?php echo esc_html( $hero_youth_title ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $hero_youth_text ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"className":"ikizler-section-label","textColor":"plum"} -->
<p class="ikizler-section-label has-plum-color has-text-color"><?php echo esc_html( $hero_adult_title ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $hero_adult_text ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"46%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:46%"><!-- wp:group {"backgroundColor":"white","className":"ikizler-soft-card ikizler-hero-media-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}},"shadow":"var:preset|shadow|lifted"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group ikizler-soft-card ikizler-hero-media-card has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"34px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url( $hero_image['url'] ); ?>" alt="<?php echo esc_attr( $hero_image['alt'] ); ?>" style="border-radius:34px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"ikizler-hero-meta","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center","flexWrap":"wrap"}} -->
<div class="wp-block-group ikizler-hero-meta" style="padding-top:var(--wp--preset--spacing--sm)"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"ikizler-section-label","textColor":"plum"} -->
<p class="ikizler-section-label has-plum-color has-text-color"><?php echo esc_html( $hero_card_title ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"sm"} -->
<p class="has-sm-font-size"><?php echo esc_html( $hero_card_desc ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"textColor":"plum","fontSize":"lg"} -->
<p class="has-plum-color has-text-color has-lg-font-size"><?php echo esc_html( $hero_card_highlight ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
