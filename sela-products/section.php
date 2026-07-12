<?php
defined( 'ABSPATH' ) || exit;

$headline = (string) ( $settings['headline'] ?? 'Want your cloud better and faster?' );
$subtitle = (string) ( $settings['subtitle'] ?? '' );

$media_base = '';
if ( ( $section['source'] ?? '' ) === 'uploads' ) {
    $u = wp_upload_dir();
    $media_base = trailingslashit( $u['baseurl'] ) . 'hero/sections/' . sanitize_key( (string) ( $section['type'] ?? 'sela-products' ) ) . '/media/';
}
$get_img = function ( string $key, string $fallback ) use ( $settings, $media_base ): string {
    $v = (string) ( $settings[ $key ] ?? '' );
    if ( $v !== '' ) return esc_url( $v );
    return $media_base ? esc_url( $media_base . ltrim( $fallback, '/' ) ) : '';
};

$tag_h = function_exists( 'hero_pick_tag' ) ? hero_pick_tag( (string) ( $settings['headline_tag'] ?? 'auto' ), 'h2' ) : 'h2';

$uid = 'slpr-' . esc_attr( $section['id'] ?? uniqid( 'sec', true ) );
?>
<style>
#<?php echo $uid; ?> {
    --slpr-bg: <?php echo esc_attr( $settings['bg_color']   ?? '#ffffff' ); ?>;
    --slpr-text: <?php echo esc_attr( $settings['text_color'] ?? '#1c1c1c' ); ?>;
    --slpr-sub: <?php echo esc_attr( $settings['sub_color']  ?? '#676767' ); ?>;
    --slpr-ff: <?php echo (string) ( $settings['ff'] ?? "'Lexend', sans-serif" ); ?>;
    --slpr-fz-h: <?php echo (int) ( $settings['fz_h_d'] ?? 38 ); ?>px;
    --slpr-fz-sub: <?php echo (int) ( $settings['fz_sub_d'] ?? 18 ); ?>px;
    --slpr-fz-name: <?php echo (int) ( $settings['fz_name'] ?? 28 ); ?>px;
    --slpr-pad-y: <?php echo (int) ( $settings['pad_y'] ?? 100 ); ?>px;
}
@media (max-width: 768px) {
    #<?php echo $uid; ?> {
        --slpr-fz-h: <?php echo (int) ( $settings['fz_h_m'] ?? 26 ); ?>px;
        --slpr-fz-sub: <?php echo (int) ( $settings['fz_sub_m'] ?? 15 ); ?>px;
        --slpr-pad-y: 35px;
    }
}
</style>

<section class="slpr-section" id="<?php echo $uid; ?>">
    <div class="slpr-wrap">
        <<?php echo $tag_h; ?> class="slpr-headline"><?php echo wp_kses_post( $headline ); ?></<?php echo $tag_h; ?>>
        <?php if ( $subtitle !== '' ) : ?>
            <p class="slpr-sub"><?php echo wp_kses_post( $subtitle ); ?></p>
        <?php endif; ?>
        <div class="slpr-grid">
            <?php for ( $i = 1; $i <= 3; $i++ ) :
                $name   = (string) ( $settings["card_{$i}_name"]   ?? '' );
                if ( $name === '' ) continue;
                $desc   = (string) ( $settings["card_{$i}_desc"]   ?? '' );
                $cta    = (string) ( $settings["card_{$i}_cta"]    ?? 'Get Started' );
                $link   = (string) ( $settings["card_{$i}_link"]   ?? '#' );
                $accent = (string) ( $settings["card_{$i}_accent"] ?? 'blue' );
                $icon   = $get_img( "card_{$i}_icon", 'product-icon-bag.svg' );
            ?>
                <div class="slpr-card">
                    <div class="slpr-card-content">
                        <?php if ( $icon ) : ?><img src="<?php echo $icon; ?>" alt="" class="slpr-icon"><?php endif; ?>
                        <h3 class="slpr-name slpr-name--<?php echo esc_attr( $accent ); ?>"><?php echo esc_html( $name ); ?></h3>
                        <?php if ( $desc !== '' ) : ?><p class="slpr-desc"><?php echo wp_kses_post( $desc ); ?></p><?php endif; ?>
                    </div>
                    <a href="<?php echo esc_url( $link ); ?>" class="slpr-cta"><?php echo esc_html( $cta ); ?></a>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
