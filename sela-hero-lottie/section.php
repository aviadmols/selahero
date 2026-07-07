<?php
/**
 * Sela Hero Lottie — render template.
 *
 * Available variables (injected by Hero_Section_Renderer):
 *   @var array  $settings  Merged field values.
 *   @var array  $blocks    Prepared block instances (unused).
 *   @var array  $section   [ 'id' => string, 'type' => string, 'source' => string ]
 */

defined( 'ABSPATH' ) || exit;

// ── Content
$title    = (string) ( $settings['title']    ?? 'Cloud services and AI solutions for startups & SaaS companies' );
$subtitle = (string) ( $settings['subtitle'] ?? 'As a top-tier partner of AWS, Microsoft Azure, and Google Cloud, Sela optimizes cloud spend, accelerates development, and boosts growth.' );
$cta_text = (string) ( $settings['cta_text'] ?? 'Get Started' );
$cta_link = (string) ( $settings['cta_link'] ?? '#' );

$title_tag    = function_exists( 'hero_pick_tag' )
    ? hero_pick_tag( (string) ( $settings['title_tag'] ?? 'auto' ), 'h1' )
    : 'h1';
$subtitle_tag = function_exists( 'hero_pick_tag' )
    ? hero_pick_tag( (string) ( $settings['subtitle_tag'] ?? 'auto' ), 'p' )
    : 'p';

// ── Typography
$ff_title   = (string) ( $settings['ff_title']   ?? "'Lexend', sans-serif" );
$fz_title_d = (int)    ( $settings['fz_title_d'] ?? 52 );
$fz_title_m = (int)    ( $settings['fz_title_m'] ?? 30 );
$fw_title   = (string) ( $settings['fw_title']   ?? '300' );
$lh_title   = ( (int)   ( $settings['lh_title']  ?? 111 ) ) / 100;
$ls_title   = (float)  ( $settings['ls_title']   ?? 0 );

$ff_sub   = (string) ( $settings['ff_sub']   ?? "'Lexend', sans-serif" );
$fz_sub_d = (int)    ( $settings['fz_sub_d'] ?? 16 );
$fz_sub_m = (int)    ( $settings['fz_sub_m'] ?? 14 );
$fw_sub   = (string) ( $settings['fw_sub']   ?? '300' );
$lh_sub   = ( (int)   ( $settings['lh_sub']  ?? 158 ) ) / 100;

// ── Colors
$bg_section  = (string) ( $settings['bg_section']  ?? '#f9f9f9' );
$color_title = (string) ( $settings['color_title'] ?? '#1c1c1c' );
$color_sub   = (string) ( $settings['color_sub']   ?? '#585858' );
$color_btn   = (string) ( $settings['color_btn']   ?? '#1c1c1c' );

// ── Media base
$media_base = '';
$source     = (string) ( $section['source'] ?? '' );
$type       = (string) ( $section['type']   ?? 'sela-hero-lottie' );
if ( $source === 'uploads' ) {
    $u = wp_upload_dir();
    $media_base = trailingslashit( $u['baseurl'] ) . 'hero/sections/' . sanitize_key( $type ) . '/media/';
}

$get_lottie = function ( string $key, string $fallback ) use ( $settings, $media_base ): string {
    $val = (string) ( $settings[ $key ] ?? '' );
    if ( $val !== '' ) {
        return esc_url( $val );
    }
    if ( $media_base !== '' ) {
        return esc_url( $media_base . ltrim( $fallback, '/' ) );
    }
    return '';
};

$lottie_desktop = $get_lottie( 'lottie_desktop', 'lottie-desktop.json' );
$lottie_mobile  = $get_lottie( 'lottie_mobile', 'lottie-mobile.json' );

$uid = 'slhl-' . esc_attr( $section['id'] ?? uniqid( 'sec', true ) );
?>
<style>
#<?php echo $uid; ?> {
    --slhl-bg:          <?php echo esc_attr( $bg_section ); ?>;
    --slhl-color-title: <?php echo esc_attr( $color_title ); ?>;
    --slhl-color-sub:   <?php echo esc_attr( $color_sub ); ?>;
    --slhl-color-btn:   <?php echo esc_attr( $color_btn ); ?>;

    --slhl-ff-title: <?php echo $ff_title; ?>;
    --slhl-fz-title: <?php echo $fz_title_d; ?>px;
    --slhl-fw-title: <?php echo esc_attr( $fw_title ); ?>;
    --slhl-lh-title: <?php echo $lh_title; ?>;
    --slhl-ls-title: <?php echo $ls_title; ?>px;

    --slhl-ff-sub: <?php echo $ff_sub; ?>;
    --slhl-fz-sub: <?php echo $fz_sub_d; ?>px;
    --slhl-fw-sub: <?php echo esc_attr( $fw_sub ); ?>;
    --slhl-lh-sub: <?php echo $lh_sub; ?>;
}
@media (max-width: 768px) {
    #<?php echo $uid; ?> {
        --slhl-fz-title: <?php echo $fz_title_m; ?>px;
        --slhl-fz-sub:   <?php echo $fz_sub_m; ?>px;
    }
}
</style>

<section class="slhl-section" id="<?php echo $uid; ?>">
    <div class="slhl-inline">
        <div class="slhl-lottie" aria-hidden="true">
            <?php if ( $lottie_desktop ) : ?>
                <div
                    class="slhl-lottie-player slhl-lottie-player--desktop"
                    data-lottie-url="<?php echo esc_url( $lottie_desktop ); ?>"
                ></div>
            <?php endif; ?>
            <?php if ( $lottie_mobile ) : ?>
                <div
                    class="slhl-lottie-player slhl-lottie-player--mobile"
                    data-lottie-url="<?php echo esc_url( $lottie_mobile ); ?>"
                ></div>
            <?php endif; ?>
        </div>

        <div class="slhl-content">
            <<?php echo $title_tag; ?> class="slhl-title"><?php echo wp_kses_post( $title ); ?></<?php echo $title_tag; ?>>
            <<?php echo $subtitle_tag; ?> class="slhl-sub"><?php echo wp_kses_post( $subtitle ); ?></<?php echo $subtitle_tag; ?>>
            <a href="<?php echo esc_url( $cta_link ); ?>" class="slhl-btn">
                <?php echo esc_html( $cta_text ); ?>
                <svg class="slhl-arrow" xmlns="http://www.w3.org/2000/svg" width="18.887" height="17.089" viewBox="0 0 20 18" fill="none">
                    <path d="M11.6795 14.4546L18.3049 8.62664L11.8943 2.66199" stroke="currentColor"/>
                    <path d="M0 8.62659L18.1001 8.62659" stroke="currentColor"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<script>
(function () {
    var section = document.getElementById('<?php echo $uid; ?>');
    if (!section) return;

    var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    if (reducedMotion.matches) return;

    var mobileMq = window.matchMedia('(max-width: 768px)');
    var desktopPlayer = section.querySelector('.slhl-lottie-player--desktop');
    var mobilePlayer  = section.querySelector('.slhl-lottie-player--mobile');
    var activeAnim = null;

    function loadLottieLib(cb) {
        if (window.lottie) {
            cb();
            return;
        }
        if (window.__slhlLottieLoading) {
            window.__slhlLottieLoading.push(cb);
            return;
        }
        window.__slhlLottieLoading = [cb];
        var s = document.createElement('script');
        s.src = 'https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.2/lottie.min.js';
        s.async = true;
        s.onload = function () {
            var queue = window.__slhlLottieLoading || [];
            delete window.__slhlLottieLoading;
            queue.forEach(function (fn) { fn(); });
        };
        document.head.appendChild(s);
    }

    function destroyActive() {
        if (activeAnim) {
            activeAnim.destroy();
            activeAnim = null;
        }
    }

    function initPlayer() {
        destroyActive();

        var player = mobileMq.matches ? mobilePlayer : desktopPlayer;
        if (!player) {
            player = desktopPlayer || mobilePlayer;
        }
        if (!player) return;

        var url = player.getAttribute('data-lottie-url');
        if (!url || !window.lottie) return;

        player.innerHTML = '';
        activeAnim = window.lottie.loadAnimation({
            container: player,
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: url,
            rendererSettings: {
                preserveAspectRatio: 'xMidYMid slice'
            }
        });
    }

    function onMotionChange() {
        if (reducedMotion.matches) {
            destroyActive();
            return;
        }
        loadLottieLib(initPlayer);
    }

    loadLottieLib(initPlayer);

    if (mobileMq.addEventListener) {
        mobileMq.addEventListener('change', onMotionChange);
    } else if (mobileMq.addListener) {
        mobileMq.addListener(onMotionChange);
    }

    if (reducedMotion.addEventListener) {
        reducedMotion.addEventListener('change', onMotionChange);
    } else if (reducedMotion.addListener) {
        reducedMotion.addListener(onMotionChange);
    }
}());
</script>
