<?php
defined( 'ABSPATH' ) || exit;

$title      = (string) ( $settings['title'] ?? 'Fueling Tech Growth' );
$show_badge = ! empty( $settings['show_badge'] );

$media_base = '';
if ( ( $section['source'] ?? '' ) === 'uploads' ) {
    $u = wp_upload_dir();
    $media_base = trailingslashit( $u['baseurl'] ) . 'hero/sections/' . sanitize_key( (string) ( $section['type'] ?? 'sela-stats' ) ) . '/media/';
}
$get_img = function ( string $key, string $fallback ) use ( $settings, $media_base ): string {
    $v = (string) ( $settings[ $key ] ?? '' );
    if ( $v !== '' ) return esc_url( $v );
    return $media_base ? esc_url( $media_base . ltrim( $fallback, '/' ) ) : '';
};

$get_media = function ( string $fallback ) use ( $media_base ): string {
    if ( $media_base !== '' ) {
        return esc_url( $media_base . ltrim( $fallback, '/' ) );
    }

    return esc_url( 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-stats/media/' . ltrim( $fallback, '/' ) );
};

$sep_images = array(
    1 => $get_media( 'slst-sep-1.png' ),
    2 => $get_media( 'slst-sep-2.png' ),
    3 => $get_media( 'slst-sep-3.png' ),
);

$tag_t = function_exists( 'hero_pick_tag' ) ? hero_pick_tag( (string) ( $settings['title_tag'] ?? 'auto' ), 'h2' ) : 'h2';

$uid = 'slst-' . esc_attr( $section['id'] ?? uniqid( 'sec', true ) );
?>
<style>
#<?php echo $uid; ?> {
    --slst-bg: <?php echo esc_attr( $settings['bg_color']   ?? '#1c1c1c' ); ?>;
    --slst-text: <?php echo esc_attr( $settings['text_color'] ?? '#fff' ); ?>;
    --slst-ff: <?php echo (string) ( $settings['ff'] ?? "'Lexend', sans-serif" ); ?>;
    --slst-fz-title: <?php echo (int) ( $settings['fz_title_d'] ?? 38 ); ?>px;
    --slst-fz-num: <?php echo (int) ( $settings['fz_num_d']   ?? 80 ); ?>px;
    --slst-fw-title: <?php echo esc_attr( $settings['fw_title'] ?? '300' ); ?>;
    --slst-pad-y: <?php echo (int) ( $settings['pad_y'] ?? 80 ); ?>px;
}
@media (max-width: 768px) {
    #<?php echo $uid; ?> {
        --slst-fz-title: <?php echo (int) ( $settings['fz_title_m'] ?? 26 ); ?>px;
        --slst-fz-num: <?php echo (int) ( $settings['fz_num_m']   ?? 48 ); ?>px;
        --slst-pad-y: 60px;
    }
}
</style>

<section class="slst-section" id="<?php echo $uid; ?>">
    <div class="slst-wrap">
        <<?php echo $tag_t; ?> class="slst-title"><?php echo wp_kses_post( $title ); ?></<?php echo $tag_t; ?>>
        <div class="slst-row">
            <?php for ( $i = 1; $i <= 4; $i++ ) :
                $tgt = (int) ( $settings["stat_{$i}_target"] ?? 0 );
                $lbl = (string) ( $settings["stat_{$i}_label"] ?? '' );
                $unit = (string) ( $settings["stat_{$i}_unit"] ?? '' );
                $plus = ! empty( $settings["stat_{$i}_plus"] );
                if ( $lbl === '' ) continue;
            ?>
                <div class="slst-item">
                    <div class="slst-num">
                        <?php if ( $plus ) : ?>
                            <span class="slst-sym slst-sym--plus">+</span>
                        <?php endif; ?>
                        <span class="slst-counter" data-target="<?php echo esc_attr( $tgt ); ?>">0</span>
                        <?php if ( $unit !== '' ) : ?>
                            <span class="slst-unit"><?php echo esc_html( $unit ); ?></span>
                        <?php endif; ?>
                    </div>
                    <p class="slst-label"><?php echo esc_html( $lbl ); ?></p>
                </div>
                <?php if ( $i < 4 ) : ?>
                    <span class="slst-sep slst-sep--<?php echo (int) $i; ?>" aria-hidden="true">
                        <img src="<?php echo esc_url( $sep_images[ $i ] ?? '' ); ?>" alt="">
                    </span>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>
    <?php if ( $show_badge ) : ?>
        <div class="slst-badge" aria-hidden="true">
            <img src="<?php echo $get_img( 'image_badge', 'stats-badge.png' ); ?>" alt="">
        </div>
    <?php endif; ?>
</section>

<script>
(function(){
    var section = document.getElementById('<?php echo $uid; ?>');
    if (!section) return;
    var counters = section.querySelectorAll('.slst-counter');
    var fired = false;
	var badge = section.querySelector('.slst-badge');
var badgeMouseX = 0;
var badgeMouseY = 0;
var badgeTargetMouseX = 0;
var badgeTargetMouseY = 0;
var badgeTicking = false;
    function run() {
        if (fired) return;
        var rect = section.getBoundingClientRect();
        if (rect.top > window.innerHeight || rect.bottom < 0) return;
        fired = true;
        counters.forEach(function (el) {
            var target = parseInt(el.getAttribute('data-target') || '0', 10);
            var start = 0;
            var dur = 1400;
            var t0 = performance.now();
            function tick(t) {
                var p = Math.min(1, (t - t0) / dur);
                el.textContent = Math.floor(start + (target - start) * (1 - Math.pow(1 - p, 3)));
                if (p < 1) requestAnimationFrame(tick);
            }
            requestAnimationFrame(tick);
        });
    }
function updateBadgeMotion() {
    if (!badge) {
        badgeTicking = false;
        return;
    }

    var rect = section.getBoundingClientRect();
    var viewportHeight = window.innerHeight || document.documentElement.clientHeight;
    var progress = (viewportHeight - rect.top) / (viewportHeight + rect.height);
    var clampedProgress = Math.max(0, Math.min(1, progress));

    badgeMouseX += (badgeTargetMouseX - badgeMouseX) * 0.08;

    var scrollRotate = (clampedProgress - 0.5) * 36;
    var scrollY = (0.5 - clampedProgress) * 22;
    var mouseRotate = badgeMouseX * 5;

    badge.style.setProperty('--slst-badge-x', '0px');
    badge.style.setProperty('--slst-badge-y', scrollY + 'px');
    badge.style.setProperty('--slst-badge-rotate', (scrollRotate + mouseRotate) + 'deg');

    badgeTicking = false;
}

function requestBadgeMotionUpdate() {
    if (!badgeTicking) {
        window.requestAnimationFrame(updateBadgeMotion);
        badgeTicking = true;
    }
}
	
section.addEventListener('mousemove', function(event) {
    if (!badge) {
        return;
    }

    var rect = section.getBoundingClientRect();

    badgeTargetMouseX = ((event.clientX - rect.left) / rect.width - 0.5) * 2;

    requestBadgeMotionUpdate();
});

section.addEventListener('mouseleave', function() {
    badgeTargetMouseX = 0;
    badgeTargetMouseY = 0;

    requestBadgeMotionUpdate();
});
	
window.addEventListener('scroll', function() {
    run();
    requestBadgeMotionUpdate();
}, { passive: true });

window.addEventListener('resize', requestBadgeMotionUpdate);

run();
requestBadgeMotionUpdate();
}());
</script>
