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
        --slsc-pad-y: 35px;
    }
}
</style>

<section class="slsc-section" id="<?php echo $uid; ?>">
    <div class="slsc-wrap">
        <div class="slsc-box">
            <div class="slsc-text">
                <p class="slsc-find"><?php echo esc_html( $find ); ?></p>
             
             
            </div>
            <?php
            $faces = array();
            for ( $i = 1; $i <= 11; $i++ ) {
                $src = $get_img( "face_{$i}", "scale-face{$i}." . ( ( $i === 10 || $i === 11 ) ? 'png' : 'jpg' ) );
                if ( ! $src ) {
                    continue;
                }
                $cls = 'slsc-face';
                if ( $i === 9 )  $cls .= ' slsc-face--border';
                if ( $i === 11 ) $cls .= ' slsc-face--wide';
                $faces[] = array( 'src' => $src, 'cls' => $cls );
            }
            ?>
            <?php if ( ! empty( $faces ) ) : ?>
                <div class="slsc-faces">
                    <div class="slsc-track" data-slsc-marquee>
                        <?php for ( $copy = 0; $copy < 2; $copy++ ) : ?>
                            <div class="slsc-group"<?php echo 0 === $copy ? '' : ' aria-hidden="true"'; ?>>
                                <?php foreach ( $faces as $face ) : ?>
                                    <img src="<?php echo $face['src']; ?>" alt="" class="<?php echo $face['cls']; ?>">
                                <?php endforeach; ?>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <script>
                (function () {
                    var section = document.getElementById('<?php echo esc_js( $uid ); ?>');
                    if (!section) return;

                    var faces = section.querySelector('.slsc-faces');
                    var track = section.querySelector('[data-slsc-marquee]');
                    if (!faces || !track) return;

                    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
                    if (reduceMotion) return;

                    function setup() {
                        var groups = Array.prototype.slice.call(track.querySelectorAll('.slsc-group'));
                        if (!groups.length) return;

                        var template = groups[0];

                        // Keep only the first group, then clone enough times to fill the viewport seamlessly.
                        while (groups.length > 1) {
                            groups.pop().remove();
                        }

                        var groupWidth = template.getBoundingClientRect().width;
                        var viewWidth = faces.getBoundingClientRect().width;
                        if (groupWidth < 1) return;

                        // Need at least 2 full sets, and enough total width to always cover the viewport.
                        var copies = Math.max(2, Math.ceil((viewWidth * 2) / groupWidth) + 1);

                        for (var i = 1; i < copies; i++) {
                            var clone = template.cloneNode(true);
                            clone.setAttribute('aria-hidden', 'true');
                            track.appendChild(clone);
                        }

                        // Duration scales with content width so speed stays roughly constant.
                        var seconds = Math.max(18, Math.round(groupWidth / 40));
                        track.style.setProperty('--slsc-shift', groupWidth + 'px');
                        track.style.animationDuration = seconds + 's';
                    }

                    if (document.readyState === 'complete') {
                        setup();
                    } else {
                        setup();
                        window.addEventListener('load', setup);
                    }

                    var resizeTimer;
                    window.addEventListener('resize', function () {
                        clearTimeout(resizeTimer);
                        resizeTimer = setTimeout(setup, 150);
                    });
                }());
                </script>
            <?php endif; ?>
        </div>
    </div>
</section>
