<?php
defined( 'ABSPATH' ) || exit;

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
 * Normalize video URL. Empty / legacy demo placeholder => no video.
 */
$normalize_video = function ( string $video_url ): string {
    $video_url = trim( $video_url );
    if ( $video_url === '' ) {
        return '';
    }

    // Old schema default that was auto-filled on tabs — treat as "no video".
    $legacy_placeholders = array(
        'https://www.youtube.com/embed/zfVHUuJB3Dk?autoplay=1&rel=0',
        'https://www.youtube.com/embed/zfVHUuJB3Dk?autoplay=1',
        'https://www.youtube.com/embed/zfVHUuJB3Dk',
        'https://youtube.com/embed/zfVHUuJB3Dk?autoplay=1&rel=0',
        'https://www.youtube.com/watch?v=zfVHUuJB3Dk',
    );

    $normalized = preg_replace( '/#.*$/', '', $video_url );
    foreach ( $legacy_placeholders as $placeholder ) {
        if ( strcasecmp( $normalized, $placeholder ) === 0 ) {
            return '';
        }
    }

    return $video_url;
};

/**
 * Whether the video URL points to an MP4 file.
 */
$is_mp4_video = function ( string $video_url ): bool {
    $video_url = trim( $video_url );
    if ( $video_url === '' ) {
        return false;
    }

    $path = (string) ( parse_url( $video_url, PHP_URL_PATH ) ?? '' );

    return (bool) preg_match( '/\.mp4$/i', $path );
};

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

$resolve_thumb = function ( string $thumb = '', string $legacy_key = '', string $video = '' ) use ( $settings, $default_thumb, $video_provider_thumb, $is_mp4_video ): string {
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

    // MP4 without a custom thumb — leave empty for JS frame capture.
    if ( $is_mp4_video( $video ) ) {
        return '';
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

    $video = $normalize_video( (string) ( $block_settings['video'] ?? '' ) );
    $thumb_raw = trim( (string) ( $block_settings['video_thumbnail'] ?? '' ) );
    $thumb = $resolve_thumb( $thumb_raw, '', $video );

    $tabs[] = [
        'name'   => $name,
        'logo'   => (string) ( $block_settings['logo'] ?? '' ) ?: $get_media( 'tab-etoro.png' ),
        'plogo'  => (string) ( $block_settings['panel_logo'] ?? '' ) ?: $get_media( 'testi-logo-etoro.png' ),
        'video'  => $video,
        'thumb'  => $thumb,
        'mp4_thumb' => ( $thumb === '' && $is_mp4_video( $video ) ),
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

        $video = $normalize_video( (string) ( $settings["tab_{$i}_video"] ?? '' ) );
        $thumb = $resolve_thumb( '', "tab_{$i}_video_thumbnail", $video );

        $tabs[] = [
            'name'  => $name,
            'logo'  => $get_img( "tab_{$i}_logo",       'tab-etoro.png' ) ?: $get_media( 'tab-etoro.png' ),
            'plogo' => $get_img( "tab_{$i}_panel_logo", 'testi-logo-etoro.png' ) ?: $get_media( 'testi-logo-etoro.png' ),
            'video' => $video,
            'thumb' => $thumb,
            'mp4_thumb' => ( $thumb === '' && $is_mp4_video( $video ) ),
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
            'mp4_thumb' => false,
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
            'mp4_thumb' => false,
            'text' => 'Wiz partnered with Sela to accelerate cloud security posture management across multi-cloud environments.',
            'author' => 'Dan Cohen, CISO, Wiz',
            'story' => '',
            'story_label' => 'View Customer Story',
        ],
    ];
}

$first_video = ! empty( $tabs ) ? trim( (string) ( $tabs[0]['video'] ?? '' ) ) : '';
$first_thumb = ! empty( $tabs ) ? (string) ( $tabs[0]['thumb'] ?? '' ) : '';
$first_mp4_thumb = ! empty( $tabs[0]['mp4_thumb'] );
$first_has_video = $first_video !== '';
if ( $first_thumb === '' && ! $first_mp4_thumb ) {
    $first_thumb = $default_thumb;
}
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
                         data-mp4-thumb="<?php echo ! empty( $t['mp4_thumb'] ) ? '1' : '0'; ?>"
                         data-video-mp4="<?php echo $is_mp4_video( (string) ( $t['video'] ?? '' ) ) ? '1' : '0'; ?>"
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
            <div class="slte-video<?php echo $first_has_video ? '' : ' slte-video--no-play'; ?>"
                 data-default-thumb="<?php echo esc_url( $default_thumb ); ?>">
                <img src="<?php echo $first_thumb !== '' ? esc_url( $first_thumb ) : ''; ?>" alt="" class="slte-video-thumb"<?php echo $first_mp4_thumb ? ' data-awaiting-mp4="1"' : ''; ?>>
                <video class="slte-native" muted playsinline loop preload="metadata"></video>
                <iframe class="slte-iframe" frameborder="0" allowfullscreen allow="autoplay; encrypted-media"></iframe>
                <div class="slte-controls" hidden>
                    <div class="slte-controls__bar">
                        <button class="slte-ctrl slte-ctrl--play" type="button" aria-label="Pause">
                            <svg class="slte-ctrl__icon slte-ctrl__icon--pause" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <rect x="6" y="5" width="4" height="14" rx="1" fill="currentColor"/>
                                <rect x="14" y="5" width="4" height="14" rx="1" fill="currentColor"/>
                            </svg>
                            <svg class="slte-ctrl__icon slte-ctrl__icon--play" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true" hidden>
                                <path d="M8 5.5v13l11-6.5-11-6.5Z" fill="currentColor"/>
                            </svg>
                        </button>
                        <span class="slte-controls__time" data-slte-time>0:00 / 0:00</span>
                        <div class="slte-controls__spacer" aria-hidden="true"></div>
                        <button class="slte-ctrl slte-ctrl--sound" type="button" aria-label="Unmute">
                            <svg class="slte-ctrl__icon slte-ctrl__icon--muted" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M4 10v4h3l5 4V6L7 10H4Z" fill="currentColor"/>
                                <path d="M16.5 8.5l5 5M21.5 8.5l-5 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            </svg>
                            <svg class="slte-ctrl__icon slte-ctrl__icon--unmuted" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true" hidden>
                                <path d="M4 10v4h3l5 4V6L7 10H4Z" fill="currentColor"/>
                                <path d="M15.5 8.5a5 5 0 0 1 0 7M18 6a8 8 0 0 1 0 12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" fill="none"/>
                            </svg>
                        </button>
                        <button class="slte-ctrl slte-ctrl--fs" type="button" aria-label="Full screen">
                            <svg class="slte-ctrl__icon slte-ctrl__icon--expand" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M4 9V4h5M20 9V4h-5M4 15v5h5M20 15v5h-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <svg class="slte-ctrl__icon slte-ctrl__icon--compress" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true" hidden>
                                <path d="M9 4v5H4M15 4v5h5M9 20v-5H4M15 20v-5h5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <div class="slte-controls__progress" data-slte-progress>
                        <div class="slte-controls__progress-track">
                            <div class="slte-controls__progress-fill" data-slte-progress-fill></div>
                        </div>
                        <input class="slte-controls__seek" type="range" min="0" max="1000" value="0" step="1" aria-label="Seek" data-slte-seek>
                    </div>
                </div>
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
    var native = section.querySelector('.slte-native');
    var thumb  = section.querySelector('.slte-video-thumb');
    var controls = section.querySelector('.slte-controls');
    var btnPlay = section.querySelector('.slte-ctrl--play');
    var btnSound = section.querySelector('.slte-ctrl--sound');
    var btnFs = section.querySelector('.slte-ctrl--fs');
    var timeEl = section.querySelector('[data-slte-time]');
    var progressFill = section.querySelector('[data-slte-progress-fill]');
    var seekEl = section.querySelector('[data-slte-seek]');
    var defaultThumb = video ? (video.getAttribute('data-default-thumb') || '') : '';
    var mp4Cache = {};
    var captureToken = 0;
    var iframeMuted = true;
    var iframePaused = false;
    var iframeBaseSrc = '';
    var seeking = false;

    function formatTime(sec) {
        if (!isFinite(sec) || sec < 0) sec = 0;
        sec = Math.floor(sec);
        var m = Math.floor(sec / 60);
        var s = sec % 60;
        return m + ':' + (s < 10 ? '0' : '') + s;
    }

    function syncProgressUi() {
        if (!native || !video || !video.classList.contains('slte-video--mp4')) {
            if (timeEl) timeEl.textContent = '0:00 / 0:00';
            if (progressFill) progressFill.style.width = '0%';
            if (seekEl && !seeking) seekEl.value = '0';
            return;
        }

        var dur = native.duration;
        var cur = native.currentTime || 0;
        if (!isFinite(dur) || dur <= 0) {
            if (timeEl) timeEl.textContent = formatTime(cur) + ' / 0:00';
            return;
        }

        if (timeEl) timeEl.textContent = formatTime(cur) + ' / ' + formatTime(dur);
        var pct = (cur / dur) * 100;
        if (progressFill) progressFill.style.width = pct + '%';
        if (seekEl && !seeking) seekEl.value = String(Math.round((cur / dur) * 1000));
    }

    function isFullscreen() {
        var el = document.fullscreenElement || document.webkitFullscreenElement;
        return !!(video && el && (el === video || video.contains(el)));
    }

    function syncFsUi() {
        if (!btnFs) return;
        var on = isFullscreen();
        var expand = btnFs.querySelector('.slte-ctrl__icon--expand');
        var compress = btnFs.querySelector('.slte-ctrl__icon--compress');
        if (expand) expand.hidden = on;
        if (compress) compress.hidden = !on;
        btnFs.setAttribute('aria-label', on ? 'Exit full screen' : 'Full screen');
    }

    function toggleFullscreen() {
        if (!video) return;
        if (isFullscreen()) {
            var exit = document.exitFullscreen || document.webkitExitFullscreen;
            if (exit) exit.call(document);
            return;
        }
        var req = video.requestFullscreen || video.webkitRequestFullscreen;
        if (req) req.call(video);
    }

    function applyFallbackThumb() {
        if (thumb && defaultThumb) {
            thumb.src = defaultThumb;
            thumb.removeAttribute('data-awaiting-mp4');
        }
    }

    function captureMp4Thumb(url, imgEl) {
        if (!url || !imgEl) return;

        if (mp4Cache[url]) {
            imgEl.src = mp4Cache[url];
            imgEl.removeAttribute('data-awaiting-mp4');
            return;
        }

        var token = ++captureToken;
        var v = document.createElement('video');
        v.muted = true;
        v.playsInline = true;
        v.setAttribute('playsinline', '');
        v.preload = 'auto';

        function cleanup() {
            v.removeAttribute('src');
            v.load();
        }

        function fail() {
            if (token !== captureToken) return;
            cleanup();
            applyFallbackThumb();
        }

        function onSeeked() {
            if (token !== captureToken) {
                cleanup();
                return;
            }

            try {
                var c = document.createElement('canvas');
                var w = v.videoWidth || 0;
                var h = v.videoHeight || 0;
                if (!w || !h) {
                    fail();
                    return;
                }
                c.width = w;
                c.height = h;
                c.getContext('2d').drawImage(v, 0, 0, w, h);
                var dataUrl = c.toDataURL('image/jpeg', 0.85);
                mp4Cache[url] = dataUrl;
                if (token === captureToken) {
                    imgEl.src = dataUrl;
                    imgEl.removeAttribute('data-awaiting-mp4');
                }
            } catch (e) {
                fail();
                return;
            }
            cleanup();
        }

        v.addEventListener('error', fail);
        v.addEventListener('seeked', onSeeked);
        v.addEventListener('loadeddata', function () {
            if (token !== captureToken) {
                cleanup();
                return;
            }
            try {
                var t = 0.5;
                if (v.duration && isFinite(v.duration)) {
                    t = Math.min(0.5, Math.max(0.1, v.duration * 0.05));
                }
                if (v.currentTime === t) {
                    onSeeked();
                } else {
                    v.currentTime = t;
                }
            } catch (e) {
                fail();
            }
        });

        imgEl.setAttribute('data-awaiting-mp4', '1');
        v.src = url;
        v.load();
    }

    function applyPanelThumb(panel) {
        if (!panel || !thumb) return;

        var needsMp4 = panel.getAttribute('data-mp4-thumb') === '1';
        var videoSrc = panel.getAttribute('data-video') || '';
        var thumbSrc = panel.getAttribute('data-video-thumb') || '';

        if (needsMp4 && videoSrc) {
            captureMp4Thumb(videoSrc, thumb);
            return;
        }

        captureToken += 1;
        if (thumbSrc) {
            thumb.src = thumbSrc;
        } else if (defaultThumb) {
            thumb.src = defaultThumb;
        }
        thumb.removeAttribute('data-awaiting-mp4');
    }

    function setParam(u, key, value) {
        var re = new RegExp('([?&])' + key + '=[^&]*');
        if (re.test(u)) {
            return u.replace(re, '$1' + key + '=' + value);
        }
        return u + (u.indexOf('?') >= 0 ? '&' : '?') + key + '=' + value;
    }

    function toEmbedUrl(url) {
        var src = String(url || '');
        if (!src) return '';

        var yt = src.match(/(?:youtube\.com\/watch\?.*?v=|youtu\.be\/|youtube\.com\/shorts\/)([A-Za-z0-9_-]{6,})/);
        if (yt) {
            src = 'https://www.youtube.com/embed/' + yt[1];
        }

        var vm = src.match(/(?:vimeo\.com\/(?:video\/)?)(\d+)/);
        if (vm && src.indexOf('player.vimeo.com') === -1) {
            src = 'https://player.vimeo.com/video/' + vm[1];
        }
        return src;
    }

    function withAutoplay(url, muted) {
        var src = toEmbedUrl(url);
        if (!src) return '';

        src = setParam(src, 'autoplay', '1');
        src = setParam(src, 'mute', muted ? '1' : '0');
        src = setParam(src, 'muted', muted ? '1' : '0');
        if (src.indexOf('youtube.com') !== -1 || src.indexOf('youtu.be') !== -1) {
            src = setParam(src, 'playsinline', '1');
            src = setParam(src, 'rel', '0');
        }
        return src;
    }

    function syncControlsUi() {
        if (!controls) return;

        var isPlaying = video && video.classList.contains('slte-video--playing');
        controls.hidden = !isPlaying;
        if (!isPlaying) {
            syncProgressUi();
            return;
        }

        var isMp4 = video.classList.contains('slte-video--mp4');
        var paused = isMp4 && native ? native.paused : iframePaused;
        var muted = isMp4 && native ? !!native.muted : iframeMuted;

        controls.classList.toggle('slte-controls--iframe', !isMp4);

        if (btnPlay) {
            var playIcon = btnPlay.querySelector('.slte-ctrl__icon--play');
            var pauseIcon = btnPlay.querySelector('.slte-ctrl__icon--pause');
            if (playIcon) playIcon.hidden = !paused;
            if (pauseIcon) pauseIcon.hidden = paused;
            btnPlay.setAttribute('aria-label', paused ? 'Play' : 'Pause');
        }

        if (btnSound) {
            var mutedIcon = btnSound.querySelector('.slte-ctrl__icon--muted');
            var unmutedIcon = btnSound.querySelector('.slte-ctrl__icon--unmuted');
            if (mutedIcon) mutedIcon.hidden = !muted;
            if (unmutedIcon) unmutedIcon.hidden = muted;
            btnSound.setAttribute('aria-label', muted ? 'Unmute' : 'Mute');
        }

        syncProgressUi();
        syncFsUi();
    }

    function stopMedia() {
        if (iframe) iframe.src = '';
        if (native) {
            native.pause();
            native.removeAttribute('src');
            native.load();
        }
        iframeMuted = true;
        iframePaused = false;
        iframeBaseSrc = '';
        if (video) {
            video.classList.remove('slte-video--playing', 'slte-video--mp4', 'slte-video--iframe', 'slte-video--show-controls');
        }
        syncControlsUi();
    }

    function startMuted(panel) {
        stopMedia();
        if (!panel || !video) return;

        var hasVideo = panel.getAttribute('data-has-video') === '1';
        var src = panel.getAttribute('data-video') || '';
        if (!hasVideo || !src) return;

        var isMp4 = panel.getAttribute('data-video-mp4') === '1';

        if (isMp4 && native) {
            native.muted = true;
            native.defaultMuted = true;
            native.setAttribute('muted', '');
            native.playsInline = true;
            native.setAttribute('playsinline', '');
            native.loop = true;
            native.src = src;
            video.classList.add('slte-video--playing', 'slte-video--mp4');
            syncControlsUi();
            var playPromise = native.play();
            if (playPromise && typeof playPromise.catch === 'function') {
                playPromise.catch(function () {
                    video.classList.remove('slte-video--playing', 'slte-video--mp4');
                    syncControlsUi();
                });
            }
            return;
        }

        if (iframe) {
            iframeMuted = true;
            iframePaused = false;
            iframeBaseSrc = src;
            iframe.src = withAutoplay(src, true);
            video.classList.add('slte-video--playing', 'slte-video--iframe');
            syncControlsUi();
        }
    }

    function syncPlayState(panel) {
        var hasVideo = panel && panel.getAttribute('data-has-video') === '1';
        var src = panel ? (panel.getAttribute('data-video') || '') : '';

        if (video) {
            video.classList.toggle('slte-video--no-play', !hasVideo || !src);
        }

        if (hasVideo && src) {
            startMuted(panel);
        } else {
            stopMedia();
        }
    }

    function togglePlay() {
        if (!video || !video.classList.contains('slte-video--playing')) return;

        if (video.classList.contains('slte-video--mp4') && native) {
            if (native.paused) {
                native.play();
            } else {
                native.pause();
            }
            syncControlsUi();
            return;
        }

        if (video.classList.contains('slte-video--iframe') && iframe && iframeBaseSrc) {
            if (!iframePaused) {
                iframePaused = true;
                iframe.src = '';
            } else {
                iframePaused = false;
                iframe.src = withAutoplay(iframeBaseSrc, iframeMuted);
            }
            syncControlsUi();
        }
    }

    function toggleSound() {
        if (!video || !video.classList.contains('slte-video--playing')) return;

        if (video.classList.contains('slte-video--mp4') && native) {
            native.muted = !native.muted;
            if (native.muted) {
                native.setAttribute('muted', '');
            } else {
                native.removeAttribute('muted');
            }
            syncControlsUi();
            return;
        }

        if (video.classList.contains('slte-video--iframe') && iframe && iframeBaseSrc) {
            iframeMuted = !iframeMuted;
            if (!iframePaused) {
                iframe.src = withAutoplay(iframeBaseSrc, iframeMuted);
            }
            syncControlsUi();
        }
    }

    if (btnPlay) {
        btnPlay.addEventListener('click', function (e) {
            e.stopPropagation();
            togglePlay();
        });
    }

    if (btnSound) {
        btnSound.addEventListener('click', function (e) {
            e.stopPropagation();
            toggleSound();
        });
    }

    if (btnFs) {
        btnFs.addEventListener('click', function (e) {
            e.stopPropagation();
            toggleFullscreen();
        });
    }

    if (seekEl) {
        seekEl.addEventListener('pointerdown', function (e) {
            e.stopPropagation();
            seeking = true;
        });
        seekEl.addEventListener('input', function (e) {
            e.stopPropagation();
            if (!native || !video || !video.classList.contains('slte-video--mp4')) return;
            var dur = native.duration;
            if (!isFinite(dur) || dur <= 0) return;
            var pct = Number(seekEl.value) / 1000;
            if (progressFill) progressFill.style.width = (pct * 100) + '%';
            if (timeEl) timeEl.textContent = formatTime(pct * dur) + ' / ' + formatTime(dur);
        });
        function commitSeek(e) {
            if (e) e.stopPropagation();
            seeking = false;
            if (!native || !video || !video.classList.contains('slte-video--mp4')) return;
            var dur = native.duration;
            if (!isFinite(dur) || dur <= 0) return;
            native.currentTime = (Number(seekEl.value) / 1000) * dur;
            syncProgressUi();
        }
        seekEl.addEventListener('change', commitSeek);
        seekEl.addEventListener('pointerup', commitSeek);
    }

    if (native) {
        native.addEventListener('play', syncControlsUi);
        native.addEventListener('pause', syncControlsUi);
        native.addEventListener('volumechange', syncControlsUi);
        native.addEventListener('timeupdate', syncProgressUi);
        native.addEventListener('loadedmetadata', syncProgressUi);
        native.addEventListener('durationchange', syncProgressUi);
    }

    document.addEventListener('fullscreenchange', syncFsUi);
    document.addEventListener('webkitfullscreenchange', syncFsUi);

    tabs.forEach(function (btn, idx) {
        btn.addEventListener('click', function () {
            tabs.forEach(function (t) { t.classList.remove('slte-tab--active'); });
            btn.classList.add('slte-tab--active');
            panels.forEach(function (p) { p.classList.remove('slte-panel--active'); });
            var p = section.querySelector('.slte-panel[data-panel="' + idx + '"]');
            if (p) {
                p.classList.add('slte-panel--active');
                applyPanelThumb(p);
                syncPlayState(p);
            }
        });
    });

    var activePanel = section.querySelector('.slte-panel--active');
    applyPanelThumb(activePanel);
    syncPlayState(activePanel);
}());
</script>
