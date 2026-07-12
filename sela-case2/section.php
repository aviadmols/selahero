<?php
defined( 'ABSPATH' ) || exit;

$label = (string) ( $settings['label'] ?? 'our Solution' );
$title = (string) ( $settings['title'] ?? 'Solving What<br/>Matters Most.' );
$desc  = (string) ( $settings['desc']  ?? '' );
$cta_t = (string) ( $settings['cta_text'] ?? '' );
$cta_l = (string) ( $settings['cta_link']  );
$alt   = (string) ( $settings['image_alt'] ?? '' );

$media_base = '';
if ( ( $section['source'] ?? '' ) === 'uploads' ) {
    $u = wp_upload_dir();
    $media_base = trailingslashit( $u['baseurl'] ) . 'hero/sections/' . sanitize_key( (string) ( $section['type'] ?? 'sela-case2' ) ) . '/media/';
}
$get_img = function ( string $key, string $fallback ) use ( $settings, $media_base ): string {
    $v = (string) ( $settings[ $key ] ?? '' );
    if ( $v !== '' ) return esc_url( $v );
    return $media_base ? esc_url( $media_base . ltrim( $fallback, '/' ) ) : '';
};

$tag_t = function_exists( 'hero_pick_tag' ) ? hero_pick_tag( (string) ( $settings['title_tag'] ?? 'auto' ), 'h2' ) : 'h2';
$uid   = 'slc2-' . esc_attr( $section['id'] ?? uniqid( 'sec', true ) );
?>
<style>
#<?php echo $uid; ?> {
    --slc2-bg: <?php echo esc_attr( $settings['bg_color']     ?? '#fff' ); ?>;
    --slc2-label: <?php echo esc_attr( $settings['label_color']  ?? '#0071f6' ); ?>;
    --slc2-title: <?php echo esc_attr( $settings['title_color']  ?? '#1c1c1c' ); ?>;
    --slc2-desc: <?php echo esc_attr( $settings['desc_color']   ?? '#717171' ); ?>;
    --slc2-cta: <?php echo esc_attr( $settings['cta_color']    ?? '#1c1c1c' ); ?>;
    --slc2-ff: <?php echo (string) ( $settings['ff'] ?? "'Lexend', sans-serif" ); ?>;
    --slc2-fz-title: <?php echo (int) ( $settings['fz_title_d'] ?? 38 ); ?>px;
    --slc2-fz-desc: <?php echo (int) ( $settings['fz_desc_d']  ?? 17 ); ?>px;
    --slc2-pad-y: <?php echo (int) ( $settings['pad_y'] ?? 80 ); ?>px;
}
@media (max-width: 768px) {
    #<?php echo $uid; ?> {
        --slc2-fz-title: <?php echo (int) ( $settings['fz_title_m'] ?? 26 ); ?>px;
        --slc2-fz-desc: <?php echo (int) ( $settings['fz_desc_m']  ?? 14 ); ?>px;
        --slc2-pad-y: 35px;
    }
}
</style>

<section class="slc2-section" id="<?php echo $uid; ?>">
    <div class="slc2-wrap">
        <div class="slc2-row">
            <div class="slc2-img-wrap">
                <img src="<?php echo $get_img( 'image', 'case2-photo.jpg' ); ?>" alt="<?php echo esc_attr( $alt ); ?>">
            </div>
            <div class="slc2-text">
                <span class="slc2-label"><?php echo esc_html( $label ); ?></span>
                <<?php echo $tag_t; ?> class="slc2-title"><?php echo wp_kses_post( $title ); ?></<?php echo $tag_t; ?>>
                <?php if ( $desc !== '' ) : ?>
                    <p class="slc2-desc"><?php echo wp_kses_post( $desc ); ?></p>
                <?php endif; ?>
			 <?php if ( $cta_t !== '' && $cta_l !== '' ) : ?>
    <a href="<?php echo esc_url( $cta_l ); ?>" class="slc2-more">
        <?php echo esc_html( $cta_t ); ?>
    </a>
<?php endif; ?>
            </div>
        </div>
    </div>
</section>
