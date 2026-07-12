<?php
defined( 'ABSPATH' ) || exit;

$show_cloud = ! empty( $settings['show_cloud'] );

$media_base = '';
if ( ( $section['source'] ?? '' ) === 'uploads' ) {
    $u = wp_upload_dir();
    $media_base = trailingslashit( $u['baseurl'] ) . 'hero/sections/' . sanitize_key( (string) ( $section['type'] ?? 'sela-testimonials' ) ) . '/media/';
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
    return esc_url( 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-testimonials/media/' . ltrim( $fallback, '/' ) );
};

$default_thumb = $get_img( 'image_video', 'testi-video.jpg' ) ?: $get_media( 'testi-video.jpg' );

/**
 * Extract a public thumbnail URL from a YouTube / Vimeo video URL.
 */
$video_provider_thumb = function ( string $video_url ): string {
    $video_url = trim( $video_url );
    if ( $video_url === '' ) {
        return '';
    }

    // YouTube: watch / embed / youtu.be / shorts
    if ( preg_match( '~(?:youtube\.com/(?:embed/|watch\?.*?v=|shorts/)|youtu\.be/)([A-Za-z0-9_-]{6,})~', $video_url, $m ) ) {
        return 'https://img.youtube.com/vi/' . $m[1] . '/hqdefault.jpg';
    }

    // Vimeo: vimeo.com/ID or player.vimeo.com/video/ID
    if ( preg_match( '~(?:vimeo\.com/(?:video/)?|player\.vimeo\.com/video/)(\d+)~', $video_url, $m ) ) {
        return 'https://vumbnail.com/' . $m[1] . '.jpg';
    }

    return '';
};

$resolve_thumb = function ( string $thumb = '', string $legacy_key = '', string $video = '' ) use ( $settings, $default_thumb, $video_provider_thumb ): string {
    if ( $thumb !== '' ) {
        return esc_url( $thumb );
    }

    if ( $legacy_key !== '' ) {
        $legacy = (string) ( $settings[ $legacy_key ] ?? '' );

        if ( $legacy !== '' ) {
            return esc_url( $legacy );
        }
    }

    $from_video = $video_provider_thumb( $video );
    if ( $from_video !== '' ) {
        return esc_url( $from_video );
    }

    return $default_thumb;
};

$uid = 'slte-' . esc_attr( $section['id'] ?? uniqid( 'sec', true ) );

$tabs = [];
foreach ( ( $blocks ?? [] ) as $block ) {
    if ( (string) ( $block['type'] ?? '' ) !== 'testimonial-tab' ) {
        continue;
    }

    $block_settings = (array) ( $block['settings'] ?? [] );
    $name = (string) ( $block_settings['name'] ?? '' );

    if ( $name === '' ) {
        continue;
    }

    $video = trim( (string) ( $block_settings['video'] ?? '' ) );
    $thumb_raw = trim( (string) ( $block_settings['video_thumbnail'] ?? '' ) );

    $tabs[] = [
        'name'   => $name,
        'logo'   => (string) ( $block_settings['logo'] ?? '' ) ?: $get_media( 'tab-etoro.png' ),
        'plogo'  => (string) ( $block_settings['panel_logo'] ?? '' ) ?: $get_media( 'testi-logo-etoro.png' ),
        'video'  => $video,
        'thumb'  => $resolve_thumb( $thumb_raw, '', $video ),
        'text'   => (string) ( $block_settings['text'] ?? '' ),
        'author' => (string) ( $block_settings['author'] ?? '' ),
        'story'  => trim( (string) ( $block_settings['story_link'] ?? '' ) ),
        'story_label' => trim( (string) ( $block_settings['story_label'] ?? '' ) ) ?: 'View Customer Story',
    ];
}

if ( empty( $tabs ) ) {
    for ( $i = 1; $i <= 4; $i++ ) {
        $name = (string) ( $settings["tab_{$i}_name"] ?? '' );

        if ( $name === '' ) {
            continue;
        }

        $video = trim( (string) ( $settings["tab_{$i}_video"] ?? '' ) );

        $tabs[] = [
            'name'  => $name,
            'logo'  => $get_img( "tab_{$i}_logo",       'tab-etoro.png' ) ?: $get_media( 'tab-etoro.png' ),
            'plogo' => $get_img( "tab_{$i}_panel_logo", 'testi-logo-etoro.png' ) ?: $get_media( 'testi-logo-etoro.png' ),
            'video' => $video,
            'thumb' => $resolve_thumb( '', "tab_{$i}_video_thumbnail", $video ),
            'text'  => (string) ( $settings["tab_{$i}_text"]   ?? '' ),
            'author'=> (string) ( $settings["tab_{$i}_author"] ?? '' ),
            'story' => trim( (string) ( $settings["tab_{$i}_story_link"] ?? '' ) ),
            'story_label' => trim( (string) ( $settings["tab_{$i}_story_label"] ?? '' ) ) ?: 'View Customer Story',
        ];
    }
}

if ( empty( $tabs ) ) {
    $tabs = [
        [
            'name' => 'eToro',
            'logo' => $get_media( 'tab-etoro.png' ),
            'plogo' => $get_media( 'testi-logo-etoro.png' ),
            'video' => 'https://www.youtube.com/embed/zfVHUuJB3Dk?autoplay=1&rel=0',
            'thumb' => $get_media( 'testi-video.jpg' ),
            'text' => 'Over 6 million traders in 140 countries use the eToro Social Trading Network to invest.',
            'author' => 'Jasmine Lee, Creative Director',
            'story' => '',
            'story_label' => 'View Customer Story',
        ],
        [
            'name' => 'WIZ',
            'logo' => $get_media( 'tab-wiz.png' ),
            'plogo' => $get_media( 'tab-wiz.png' ),
            'video' => 'https://www.youtube.com/embed/zfVHUuJB3Dk?autoplay=1&rel=0',
            'thumb' => $get_media( 'testi-video.jpg' ),
            'text' => 'Wiz partnered with Sela to accelerate cloud security posture management across multi-cloud environments.',
            'author' => 'Dan Cohen, CISO, Wiz',
            'story' => '',
            'story_label' => 'View Customer Story',
        ],
    ];
}

$first_video = ! empty( $tabs ) ? trim( (string) ( $tabs[0]['video'] ?? '' ) ) : '';
$first_thumb = ! empty( $tabs ) ? (string) ( $tabs[0]['thumb'] ?? $default_thumb ) : $default_thumb;
$first_has_video = $first_video !== '';
?>
<style>
#<?php echo $uid; ?> {
    --slte-bg: <?php echo esc_attr( $settings['bg_color']     ?? '#f9f9f9' ); ?>;
    --slte-text: <?php echo esc_attr( $settings['text_color']   ?? '#717171' ); ?>;
    --slte-author: <?php echo esc_attr( $settings['author_color'] ?? '#1c1c1c' ); ?>;
    --slte-tab-active: <?php echo esc_attr( $settings['tab_active_bg']?? '#d9f3f5' ); ?>;
    --slte-ff: <?php echo (string) ( $settings['ff'] ?? "'Lexend', sans-serif" ); ?>;
    --slte-fz-text: <?php echo (int) ( $settings['fz_text_d'] ?? 18 ); ?>px;
    --slte-pad-y: <?php echo (int) ( $settings['pad_y'] ?? 80 ); ?>px;
}
@media (max-width: 768px) {
    #<?php echo $uid; ?> {
        --slte-fz-text: <?php echo (int) ( $settings['fz_text_m'] ?? 15 ); ?>px;
        --slte-pad-y: 35px;
    }
}
</style>

<section class="slte-section" id="<?php echo $uid; ?>">
    <div class="slte-wrap">
        <div class="slte-tabs">
            <?php foreach ( $tabs as $i => $t ) : ?>
                <button class="slte-tab<?php echo $i === 0 ? ' slte-tab--active' : ''; ?>" data-tab="<?php echo $i; ?>" type="button">
                    <img src="<?php echo $t['logo']; ?>" alt="<?php echo esc_attr( $t['name'] ); ?>">
                </button>
            <?php endforeach; ?>
        </div>
        <div class="slte-main">
            <div class="slte-panels">
                <?php foreach ( $tabs as $i => $t ) : ?>
                    <div class="slte-panel<?php echo $i === 0 ? ' slte-panel--active' : ''; ?>"
                         data-panel="<?php echo $i; ?>"
                         data-video="<?php echo esc_url( $t['video'] ); ?>"
                         data-video-thumb="<?php echo esc_url( $t['thumb'] ); ?>"
                         data-has-video="<?php echo $t['video'] !== '' ? '1' : '0'; ?>">
                        <?php if ( $t['plogo'] ) : ?>
                            <img src="<?php echo $t['plogo']; ?>" alt="<?php echo esc_attr( $t['name'] ); ?>" class="slte-panel-logo">
                        <?php endif; ?>
                        <p class="slte-panel-text"><?php echo wp_kses_post( $t['text'] ); ?></p>
                        <p class="slte-panel-author"><?php echo esc_html( $t['author'] ); ?></p>
                        <?php if ( ! empty( $t['story'] ) ) : ?>
                            <a class="slte-story-link" href="<?php echo esc_url( $t['story'] ); ?>">
                                <span class="slte-story-link__text"><?php echo esc_html( $t['story_label'] ); ?></span>
                                <svg class="slte-story-link__icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 18" fill="none" aria-hidden="true">
                                    <path d="M11.6795 14.4546L18.3049 8.62664L11.8943 2.66199" stroke="currentColor"/>
                                    <path d="M0 8.62659L18.1001 8.62659" stroke="currentColor"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="slte-video<?php echo $first_has_video ? '' : ' slte-video--no-play'; ?>">
                <img src="<?php echo esc_url( $first_thumb ); ?>" alt="" class="slte-video-thumb">
                <button class="slte-play" aria-label="Play" type="button"<?php echo $first_has_video ? '' : ' hidden'; ?>>
                    <img src="<?php echo $get_img( 'image_play_btn', 'play-btn.svg' ); ?>" alt="">
                </button>
                <iframe class="slte-iframe" frameborder="0" allowfullscreen allow="autoplay; encrypted-media"></iframe>
            </div>
        </div>
    </div>
</section>

<script>
(function () {
    var section = document.getElementById('<?php echo $uid; ?>');
    if (!section) return;
    var tabs   = section.querySelectorAll('.slte-tab');
    var panels = section.querySelectorAll('.slte-panel');
    var video  = section.querySelector('.slte-video');
    var iframe = section.querySelector('.slte-iframe');
    var thumb  = section.querySelector('.slte-video-thumb');
    var play   = section.querySelector('.slte-play');

    function syncPlayState(panel) {
        var hasVideo = panel && panel.getAttribute('data-has-video') === '1';
        var src = panel ? (panel.getAttribute('data-video') || '') : '';

        if (video) {
            video.classList.toggle('slte-video--no-play', !hasVideo || !src);
            video.classList.remove('slte-video--playing');
        }
        if (play) {
            if (hasVideo && src) {
                play.hidden = false;
                play.removeAttribute('hidden');
            } else {
                play.hidden = true;
            }
        }
        if (iframe) iframe.src = '';
    }

    tabs.forEach(function (btn, idx) {
        btn.addEventListener('click', function () {
            tabs.forEach(function (t) { t.classList.remove('slte-tab--active'); });
            btn.classList.add('slte-tab--active');
            panels.forEach(function (p) { p.classList.remove('slte-panel--active'); });
            var p = section.querySelector('.slte-panel[data-panel="' + idx + '"]');
            if (p) {
                p.classList.add('slte-panel--active');
                var thumbSrc = p.getAttribute('data-video-thumb');
                if (thumb && thumbSrc) {
                    thumb.src = thumbSrc;
                }
                syncPlayState(p);
            }
        });
    });

    if (play && video && iframe) {
        play.addEventListener('click', function () {
            var active = section.querySelector('.slte-panel--active');
            var src = active ? (active.getAttribute('data-video') || '') : '';
            var hasVideo = active && active.getAttribute('data-has-video') === '1';
            if (hasVideo && src) {
                iframe.src = src;
                video.classList.add('slte-video--playing');
            }
        });
    }

    syncPlayState(section.querySelector('.slte-panel--active'));
}());
</script>
