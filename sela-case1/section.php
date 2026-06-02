<?php
defined( 'ABSPATH' ) || exit;

$label = (string) ( $settings['label'] ?? 'our Solution' );
$title = (string) ( $settings['title'] ?? 'Real People.<br/>Real Business Outcomes.' );
$desc  = (string) ( $settings['desc']  ?? '' );
$cta_t = (string) ( $settings['cta_text'] );
$cta_l = (string) ( $settings['cta_link']);
$alt   = (string) ( $settings['image_alt'] ?? '' );
$show_clouds = ! empty( $settings['show_clouds'] );

$media_base = '';
if ( ( $section['source'] ?? '' ) === 'uploads' ) {
    $u = wp_upload_dir();
    $media_base = trailingslashit( $u['baseurl'] ) . 'hero/sections/' . sanitize_key( (string) ( $section['type'] ?? 'sela-case1' ) ) . '/media/';
}
$get_img = function ( string $key, string $fallback ) use ( $settings, $media_base ): string {
    $v = (string) ( $settings[ $key ] ?? '' );
    if ( $v !== '' ) return esc_url( $v );
    return $media_base ? esc_url( $media_base . ltrim( $fallback, '/' ) ) : '';
};

$tag_t = function_exists( 'hero_pick_tag' ) ? hero_pick_tag( (string) ( $settings['title_tag'] ?? 'auto' ), 'h2' ) : 'h2';
$uid   = 'slc1-' . esc_attr( $section['id'] ?? uniqid( 'sec', true ) );
?>
<style>
#<?php echo $uid; ?> {
    --slc1-bg: <?php echo esc_attr( $settings['bg_color']     ?? '#f9f9f9' ); ?>;
    --slc1-label: <?php echo esc_attr( $settings['label_color']  ?? '#0071f6' ); ?>;
    --slc1-title: <?php echo esc_attr( $settings['title_color']  ?? '#1c1c1c' ); ?>;
    --slc1-desc: <?php echo esc_attr( $settings['desc_color']   ?? '#717171' ); ?>;
    --slc1-cta: <?php echo esc_attr( $settings['cta_color']    ?? '#1c1c1c' ); ?>;
    --slc1-ff: <?php echo (string) ( $settings['ff'] ?? "'Lexend', sans-serif" ); ?>;
    --slc1-fz-title: <?php echo (int) ( $settings['fz_title_d'] ?? 38 ); ?>px;
    --slc1-fz-desc: <?php echo (int) ( $settings['fz_desc_d']  ?? 17 ); ?>px;
    --slc1-pad-y: <?php echo (int) ( $settings['pad_y'] ?? 80 ); ?>px;
}
@media (max-width: 768px) {
    #<?php echo $uid; ?> {
        --slc1-fz-title: <?php echo (int) ( $settings['fz_title_m'] ?? 26 ); ?>px;
        --slc1-fz-desc: <?php echo (int) ( $settings['fz_desc_m']  ?? 14 ); ?>px;
        --slc1-pad-y: 50px;
    }
}
</style>

<section class="slc1-section" id="<?php echo $uid; ?>">
    <?php if ( $show_clouds ) : ?>
        <img class="slc1-cloud slc1-cloud--1" src="<?php echo $get_img( 'image_cloud_1', 'cloud-outline-1.svg' ); ?>" alt="" aria-hidden="true">
        <img class="slc1-cloud slc1-cloud--2" src="<?php echo $get_img( 'image_cloud_2', 'cloud-outline-2.svg' ); ?>" alt="" aria-hidden="true">
    <?php endif; ?>
    <div class="slc1-wrap">
        <div class="slc1-row">
            <div class="slc1-text">
                <span class="slc1-label"><?php echo esc_html( $label ); ?></span>
                <<?php echo $tag_t; ?> class="slc1-title"><?php echo wp_kses_post( $title ); ?></<?php echo $tag_t; ?>>
                <?php if ( $desc !== '' ) : ?>
                    <p class="slc1-desc"><?php echo wp_kses_post( $desc ); ?></p>
                <?php endif; ?>
                <a href="<?php echo esc_url( $cta_l ); ?>" class="slc1-more"><?php echo esc_html( $cta_t ); ?></a>
            </div>
            <div class="slc1-img-wrap">
                <img src="<?php echo $get_img( 'image', 'case1-dashboard.png' ); ?>" alt="<?php echo esc_attr( $alt ); ?>">
            </div>
        </div>
    </div>
</section>
