<?php
defined( 'ABSPATH' ) || exit;

$headline = (string) ( $settings['headline'] ?? 'Trusted by more than 1,000 leading tech companies' );
$bg_color = (string) ( $settings['bg_color'] ?? '#ffffff' );
$h_color  = (string) ( $settings['headline_color'] ?? '#1c1c1c' );

$ff_h     = (string) ( $settings['ff_headline'] ?? "'Lexend', sans-serif" );
$fz_h_d   = (int) ( $settings['fz_headline_d'] ?? 20 );
$fz_h_m   = (int) ( $settings['fz_headline_m'] ?? 17 );
$fw_h     = (string) ( $settings['fw_headline'] ?? '300' );
$lh_h     = ( (int) ( $settings['lh_headline'] ?? 132 ) ) / 100;

$logo_h_d  = (int) ( $settings['logo_height_d']  ?? 27 );
$logo_h_m  = (int) ( $settings['logo_height_m']  ?? 20 );
$badge_h_d = (int) ( $settings['badge_height_d'] ?? 107 );
$badge_h_m = (int) ( $settings['badge_height_m'] ?? 44 );
$pad_d     = (int) ( $settings['pad_y_d'] ?? 60 );
$pad_m     = (int) ( $settings['pad_y_m'] ?? 35 );

$media_base = '';
if ( ( $section['source'] ?? '' ) === 'uploads' ) {
    $u = wp_upload_dir();
    $media_base = trailingslashit( $u['baseurl'] ) . 'hero/sections/' . sanitize_key( (string) ( $section['type'] ?? 'sela-trusted' ) ) . '/media/';
}
$get_img = function ( string $key, string $fallback ) use ( $settings, $media_base ): string {
    $v = (string) ( $settings[ $key ] ?? '' );
    if ( $v !== '' ) return esc_url( $v );
    return $media_base ? esc_url( $media_base . ltrim( $fallback, '/' ) ) : '';
};

$tag_h = function_exists( 'hero_pick_tag' )
    ? hero_pick_tag( (string) ( $settings['headline_tag'] ?? 'auto' ), 'p' )
    : 'p';

$uid = 'sltr-' . esc_attr( $section['id'] ?? uniqid( 'sec', true ) );
?>
<style>
#<?php echo $uid; ?> {
    --sltr-bg: <?php echo esc_attr( $bg_color ); ?>;
    --sltr-h-color: <?php echo esc_attr( $h_color ); ?>;
    --sltr-ff: <?php echo $ff_h; ?>;
    --sltr-fz: <?php echo $fz_h_d; ?>px;
    --sltr-fw: <?php echo esc_attr( $fw_h ); ?>;
    --sltr-lh: <?php echo $lh_h; ?>;
    --sltr-logo-h: <?php echo $logo_h_d; ?>px;
    --sltr-badge-h: <?php echo $badge_h_d; ?>px;
    --sltr-pad: <?php echo $pad_d; ?>px;
}
@media (max-width: 768px) {
    #<?php echo $uid; ?> {
        --sltr-fz: <?php echo $fz_h_m; ?>px;
        --sltr-logo-h: <?php echo $logo_h_m; ?>px;
        --sltr-badge-h: <?php echo $badge_h_m; ?>px;
        --sltr-pad: <?php echo $pad_m; ?>px;
    }
}
</style>

<section class="sltr-section" id="<?php echo $uid; ?>">
    <div class="sltr-wrap">
        <<?php echo $tag_h; ?> class="sltr-headline"><?php echo wp_kses_post( $headline ); ?></<?php echo $tag_h; ?>>
        <div class="sltr-logos">
            <?php for ( $i = 1; $i <= 8; $i++ ) : $src = $get_img( "logo_{$i}", "logo-partner{$i}.png" ); ?>
                <?php if ( $src ) : ?>
                    <img src="<?php echo $src; ?>" alt="">
                <?php endif; ?>
            <?php endfor; ?>
        </div>
        <div class="sltr-badges">
            <img src="<?php echo $get_img( 'badge_aws',    'badge-aws.png' ); ?>"    alt="<?php echo esc_attr( $settings['badge_aws_alt']    ?? 'AWS Partner' ); ?>">
            <img src="<?php echo $get_img( 'badge_google', 'badge-google.png' ); ?>" alt="<?php echo esc_attr( $settings['badge_google_alt'] ?? 'Google Cloud Partner' ); ?>">
            <img src="<?php echo $get_img( 'badge_azure',  'badge-azure.png' ); ?>"  alt="<?php echo esc_attr( $settings['badge_azure_alt']  ?? 'Azure Partner' ); ?>">
        </div>
    </div>
</section>
