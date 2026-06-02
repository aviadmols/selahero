<?php
defined( 'ABSPATH' ) || exit;

$find  = (string) ( $settings['find_text'] ?? 'Find out how Sela can help you' );
$title = (string) ( $settings['title']     ?? 'scale, grow & win.' );
$ctaT  = (string) ( $settings['cta_text']  ?? 'Get Started' );
$ctaL  = (string) ( $settings['cta_link']  ?? '#' );

$media_base = '';
if ( ( $section['source'] ?? '' ) === 'uploads' ) {
    $u = wp_upload_dir();
    $media_base = trailingslashit( $u['baseurl'] ) . 'hero/sections/' . sanitize_key( (string) ( $section['type'] ?? 'sela-scale' ) ) . '/media/';
}
$get_img = function ( string $key, string $fallback ) use ( $settings, $media_base ): string {
    $v = (string) ( $settings[ $key ] ?? '' );
    if ( $v !== '' ) return esc_url( $v );
    return $media_base ? esc_url( $media_base . ltrim( $fallback, '/' ) ) : '';
};

$tag_t = function_exists( 'hero_pick_tag' ) ? hero_pick_tag( (string) ( $settings['title_tag'] ?? 'auto' ), 'h2' ) : 'h2';
$uid   = 'slsc-' . esc_attr( $section['id'] ?? uniqid( 'sec', true ) );
?>
<style>
#<?php echo $uid; ?> {
    --slsc-box-bg: <?php echo esc_attr( $settings['box_bg']      ?? '#f9f9f9' ); ?>;
    --slsc-find: <?php echo esc_attr( $settings['find_color']  ?? '#1c1c1c' ); ?>;
    --slsc-title: <?php echo esc_attr( $settings['title_color'] ?? '#1c1c1c' ); ?>;
    --slsc-cta-bg: <?php echo esc_attr( $settings['cta_bg']      ?? '#00dbe9' ); ?>;
    --slsc-cta: <?php echo esc_attr( $settings['cta_color']   ?? '#1c1c1c' ); ?>;
    --slsc-ff: <?php echo (string) ( $settings['ff'] ?? "'Lexend', sans-serif" ); ?>;
    --slsc-fz-find: <?php echo (int) ( $settings['fz_find_d']  ?? 22 ); ?>px;
    --slsc-fz-title: <?php echo (int) ( $settings['fz_title_d'] ?? 52 ); ?>px;
    --slsc-pad-y: <?php echo (int) ( $settings['pad_y'] ?? 56 ); ?>px;
}
@media (max-width: 768px) {
    #<?php echo $uid; ?> {
        --slsc-fz-find: <?php echo (int) ( $settings['fz_find_m']  ?? 16 ); ?>px;
        --slsc-fz-title: <?php echo (int) ( $settings['fz_title_m'] ?? 30 ); ?>px;
        --slsc-pad-y: 40px;
    }
}
</style>

<section class="slsc-section" id="<?php echo $uid; ?>">
    <div class="slsc-wrap">
        <div class="slsc-box">
            <div class="slsc-text">
                <p class="slsc-find"><?php echo esc_html( $find ); ?></p>
                <<?php echo $tag_t; ?> class="slsc-title"><?php echo wp_kses_post( $title ); ?></<?php echo $tag_t; ?>>
                <a href="<?php echo esc_url( $ctaL ); ?>" class="slsc-btn">
                    <?php echo esc_html( $ctaT ); ?>
                    <span class="slsc-btn-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 20 18" fill="none">
                            <path d="M11.6795 14.4546L18.3049 8.62664L11.8943 2.66199" stroke="currentColor"/>
                            <path d="M0 8.62659L18.1001 8.62659" stroke="currentColor"/>
                        </svg>
                    </span>
                </a>
            </div>
            <div class="slsc-faces">
                <?php for ( $i = 1; $i <= 11; $i++ ) :
                    $src = $get_img( "face_{$i}", "scale-face{$i}." . ( ( $i === 10 || $i === 11 ) ? 'png' : 'jpg' ) );
                    if ( ! $src ) continue;
                    $cls = 'slsc-face';
                    if ( $i === 9 ) $cls .= ' slsc-face--border';
                    if ( $i === 11 ) $cls .= ' slsc-face--wide';
                ?>
                    <img src="<?php echo $src; ?>" alt="" class="<?php echo $cls; ?>">
                <?php endfor; ?>
            </div>
        </div>
    </div>
</section>
